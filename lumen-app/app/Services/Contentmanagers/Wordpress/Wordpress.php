<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Services\Contentmanagers\Content;

class Wordpress extends Content
{

	private $_shortcode_tags;

	function __construct()
	{
		
	}


	/**
	 * Newline preservation help function for wpautop
	 *
	 * @since 3.1.0
	 * @access private
	 *
	 * @param array $matches preg_replace_callback matches array
	 * @return string
	 */
	function _autop_newline_preservation_helper( $matches ) {
		return str_replace("\n", "<WPPreserveNewline />", $matches[0]);
	}


	/**
	 * Replaces double line-breaks with paragraph elements.
	 *
	 * A group of regex replaces used to identify text formatted with newlines and
	 * replace double line-breaks with HTML paragraph tags. The remaining line-breaks
	 * after conversion become <<br />> tags, unless $br is set to '0' or 'false'.
	 *
	 * @since 0.71
	 *
	 * @param string $pee The text which has to be formatted.
	 * @param bool   $br  Optional. If set, this will convert all remaining line-breaks
	 *                    after paragraphing. Default true.
	 * @return string Text which has been converted into correct paragraph tags.
	 */
	function wpautop($pee, $br = true) {
		$pre_tags = array();

		if ( trim($pee) === '' )
			return '';

		// Just to make things a little easier, pad the end.
		$pee = $pee . "\n";

		/*
		 * Pre tags shouldn't be touched by autop.
		 * Replace pre tags with placeholders and bring them back after autop.
		 */
		if ( strpos($pee, '<pre') !== false ) {
			$pee_parts = explode( '</pre>', $pee );
			$last_pee = array_pop($pee_parts);
			$pee = '';
			$i = 0;

			foreach ( $pee_parts as $pee_part ) {
				$start = strpos($pee_part, '<pre');

				// Malformed html?
				if ( $start === false ) {
					$pee .= $pee_part;
					continue;
				}

				$name = "<pre wp-pre-tag-$i></pre>";
				$pre_tags[$name] = substr( $pee_part, $start ) . '</pre>';

				$pee .= substr( $pee_part, 0, $start ) . $name;
				$i++;
			}

			$pee .= $last_pee;
		}
		// Change multiple <br>s into two line breaks, which will turn into paragraphs.
		$pee = preg_replace('|<br />\s*<br />|', "\n\n", $pee);

		$allblocks = '(?:table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|form|map|area|blockquote|address|math|style|p|h[1-6]|hr|fieldset|legend|section|article|aside|hgroup|header|footer|nav|figure|figcaption|details|menu|summary)';

		// Add a single line break above block-level opening tags.
		$pee = preg_replace('!(<' . $allblocks . '[^>]*>)!', "\n$1", $pee);

		// Add a double line break below block-level closing tags.
		$pee = preg_replace('!(</' . $allblocks . '>)!', "$1\n\n", $pee);

		// Standardize newline characters to "\n".
		$pee = str_replace(array("\r\n", "\r"), "\n", $pee); 

		// Collapse line breaks before and after <option> elements so they don't get autop'd.
		if ( strpos( $pee, '<option' ) !== false ) {
			$pee = preg_replace( '|\s*<option|', '<option', $pee );
			$pee = preg_replace( '|</option>\s*|', '</option>', $pee );
		}

		/*
		 * Collapse line breaks inside <object> elements, before <param> and <embed> elements
		 * so they don't get autop'd.
		 */
		if ( strpos( $pee, '</object>' ) !== false ) {
			$pee = preg_replace( '|(<object[^>]*>)\s*|', '$1', $pee );
			$pee = preg_replace( '|\s*</object>|', '</object>', $pee );
			$pee = preg_replace( '%\s*(</?(?:param|embed)[^>]*>)\s*%', '$1', $pee );
		}

		/*
		 * Collapse line breaks inside <audio> and <video> elements,
		 * before and after <source> and <track> elements.
		 */
		if ( strpos( $pee, '<source' ) !== false || strpos( $pee, '<track' ) !== false ) {
			$pee = preg_replace( '%([<\[](?:audio|video)[^>\]]*[>\]])\s*%', '$1', $pee );
			$pee = preg_replace( '%\s*([<\[]/(?:audio|video)[>\]])%', '$1', $pee );
			$pee = preg_replace( '%\s*(<(?:source|track)[^>]*>)\s*%', '$1', $pee );
		}

		// Remove more than two contiguous line breaks.
		$pee = preg_replace("/\n\n+/", "\n\n", $pee);

		// Split up the contents into an array of strings, separated by double line breaks.
		$pees = preg_split('/\n\s*\n/', $pee, -1, PREG_SPLIT_NO_EMPTY);

		// Reset $pee prior to rebuilding.
		$pee = '';

		// Rebuild the content as a string, wrapping every bit with a <p>.
		foreach ( $pees as $tinkle ) {
			$pee .= '<p>' . trim($tinkle, "\n") . "</p>\n";
		}

		// Under certain strange conditions it could create a P of entirely whitespace.
		$pee = preg_replace('|<p>\s*</p>|', '', $pee); 

		// Add a closing <p> inside <div>, <address>, or <form> tag if missing.
		$pee = preg_replace('!<p>([^<]+)</(div|address|form)>!', "<p>$1</p></$2>", $pee);
		
		// If an opening or closing block element tag is wrapped in a <p>, unwrap it.
		$pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee); 
		
		// In some cases <li> may get wrapped in <p>, fix them.
		$pee = preg_replace("|<p>(<li.+?)</p>|", "$1", $pee); 
		
		// If a <blockquote> is wrapped with a <p>, move it inside the <blockquote>.
		$pee = preg_replace('|<p><blockquote([^>]*)>|i', "<blockquote$1><p>", $pee);
		$pee = str_replace('</blockquote></p>', '</p></blockquote>', $pee);
		
		// If an opening or closing block element tag is preceded by an opening <p> tag, remove it.
		$pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)!', "$1", $pee);
		
		// If an opening or closing block element tag is followed by a closing <p> tag, remove it.
		$pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee);

		// Optionally insert line breaks.
		if ( $br ) {
			// Replace newlines that shouldn't be touched with a placeholder.
			$pee = preg_replace_callback('/<(script|style).*?<\/\\1>/s', array($this, '_autop_newline_preservation_helper'), $pee);

			// Replace any new line characters that aren't preceded by a <br /> with a <br />.
			$pee = preg_replace('|(?<!<br />)\s*\n|', "<br />\n", $pee); 

			// Replace newline placeholders with newlines.
			$pee = str_replace('<WPPreserveNewline />', "\n", $pee);
		}

		// If a <br /> tag is after an opening or closing block tag, remove it.
		$pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*<br />!', "$1", $pee);
		
		// If a <br /> tag is before a subset of opening or closing block tags, remove it.
		$pee = preg_replace('!<br />(\s*</?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol)[^>]*>)!', '$1', $pee);
		$pee = preg_replace( "|\n</p>$|", '</p>', $pee );

		// Replace placeholder <pre> tags with their original content.
		if ( !empty($pre_tags) )
			$pee = str_replace(array_keys($pre_tags), array_values($pre_tags), $pee);

		return $pee;
	}



	/**
	 * Search content for shortcodes and filter shortcodes through their hooks.
	 *
	 * If there are no shortcode tags defined, then the content will be returned
	 * without any filtering. This might cause issues when plugins are disabled but
	 * the shortcode will still show up in the post or content.
	 *
	 * @since 2.5.0
	 *
	 * @param string $content Content to search for shortcodes.
	 * @return string Content with shortcodes filtered out.
	 */
	function do_shortcode($content) {

		if ( false === strpos( $content, '[' ) ) {
			return $content;
		}

		if (empty($this->_shortcode_tags) || !is_array($this->_shortcode_tags))
			return $content;

		$pattern = $this->get_shortcode_regex();
		return preg_replace_callback( "/$pattern/s", array($this, 'do_shortcode_tag'), $content );
	}


	/**
	 * Retrieve the shortcode regular expression for searching.
	 *
	 * The regular expression combines the shortcode tags in the regular expression
	 * in a regex class.
	 *
	 * The regular expression contains 6 different sub matches to help with parsing.
	 *
	 * 1 - An extra [ to allow for escaping shortcodes with double [[]]
	 * 2 - The shortcode name
	 * 3 - The shortcode argument list
	 * 4 - The self closing /
	 * 5 - The content of a shortcode when it wraps some content.
	 * 6 - An extra ] to allow for escaping shortcodes with double [[]]
	 *
	 * @since 2.5.0
	 *
	 * @uses $this->_shortcode_tags
	 *
	 * @return string The shortcode search regular expression
	 */
	function get_shortcode_regex() {
		$tagnames = array_keys($this->_shortcode_tags);
		$tagregexp = join( '|', array_map('preg_quote', $tagnames) );

		// WARNING! Do not change this regex without changing do_shortcode_tag() and strip_shortcode_tag()
		// Also, see shortcode_unautop() and shortcode.js.
		return
			  '\\['                              // Opening bracket
			. '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
			. "($tagregexp)"                     // 2: Shortcode name
			. '(?![\\w-])'                       // Not followed by word character or hyphen
			. '('                                // 3: Unroll the loop: Inside the opening shortcode tag
			.     '[^\\]\\/]*'                   // Not a closing bracket or forward slash
			.     '(?:'
			.         '\\/(?!\\])'               // A forward slash not followed by a closing bracket
			.         '[^\\]\\/]*'               // Not a closing bracket or forward slash
			.     ')*?'
			. ')'
			. '(?:'
			.     '(\\/)'                        // 4: Self closing tag ...
			.     '\\]'                          // ... and closing bracket
			. '|'
			.     '\\]'                          // Closing bracket
			.     '(?:'
			.         '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
			.             '[^\\[]*+'             // Not an opening bracket
			.             '(?:'
			.                 '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag
			.                 '[^\\[]*+'         // Not an opening bracket
			.             ')*+'
			.         ')'
			.         '\\[\\/\\2\\]'             // Closing shortcode tag
			.     ')?'
			. ')'
			. '(\\]?)';                          // 6: Optional second closing brocket for escaping shortcodes: [[tag]]
	}


	/**
	 * Regular Expression callable for do_shortcode() for calling shortcode hook.
	 * @see get_shortcode_regex for details of the match array contents.
	 *
	 * @since 2.5.0
	 * @access private
	 * @uses $this->_shortcode_tags
	 *
	 * @param array $m Regular expression match array
	 * @return mixed False on failure.
	 */
	function do_shortcode_tag( $m ) {

		// allow [[foo]] syntax for escaping a tag
		if ( $m[1] == '[' && $m[6] == ']' ) {
			return substr($m[0], 1, -1);
		}

		$tag = $m[2];
		$attr = $this->shortcode_parse_atts( $m[3] );

		if ( isset( $m[5] ) ) {
			// enclosing tag - extra parameter
			return $m[1] . call_user_func( $this->_shortcode_tags[$tag], $attr, $m[5], $tag ) . $m[6];
		} else {
			// self-closing tag
			return $m[1] . call_user_func( $this->_shortcode_tags[$tag], $attr, null,  $tag ) . $m[6];
		}
	}

	/**
	 * Retrieve all attributes from the shortcodes tag.
	 *
	 * The attributes list has the attribute name as the key and the value of the
	 * attribute as the value in the key/value pair. This allows for easier
	 * retrieval of the attributes, since all attributes have to be known.
	 *
	 * @since 2.5.0
	 *
	 * @param string $text
	 * @return array List of attributes and their value.
	 */
	function shortcode_parse_atts($text) {
		$atts = array();
		$pattern = '/(\w+)\s*=\s*"([^"]*)"(?:\s|$)|(\w+)\s*=\s*\'([^\']*)\'(?:\s|$)|(\w+)\s*=\s*([^\s\'"]+)(?:\s|$)|"([^"]*)"(?:\s|$)|(\S+)(?:\s|$)/';
		$text = preg_replace("/[\x{00a0}\x{200b}]+/u", " ", $text);
		if ( preg_match_all($pattern, $text, $match, PREG_SET_ORDER) ) {
			foreach ($match as $m) {
				if (!empty($m[1]))
					$atts[strtolower($m[1])] = stripcslashes($m[2]);
				elseif (!empty($m[3]))
					$atts[strtolower($m[3])] = stripcslashes($m[4]);
				elseif (!empty($m[5]))
					$atts[strtolower($m[5])] = stripcslashes($m[6]);
				elseif (isset($m[7]) && strlen($m[7]))
					$atts[] = stripcslashes($m[7]);
				elseif (isset($m[8]))
					$atts[] = stripcslashes($m[8]);
			}
		} else {
			$atts = ltrim($text);
		}
		return $atts;
	}


	function remove_hidden_image($content)
	{
		//analyze first image and remove from content, if it is zero by zero
		$img_pattern = '/<img[^>]+>/i';
		
		preg_match($img_pattern, $content,$first_image);
		
		$heightFound = 0;
		$widthFound  = 0;

		//check for a zero height or a zero width
		if( ! isset($first_image[0])):

			return $content;

		endif;

		$heightFound = strpos($first_image[0], 'height="0"');
		$widthFound  = strpos($first_image[0], 'width="0"');
		
		if($heightFound > 1 || $widthFound > 1):

			//remove that image.
			$content = preg_replace($img_pattern, '', $content, 1);

		endif;

		return $content;
	}


	/**
	 * Add hook for shortcode tag.
	 *
	 * There can only be one hook for each shortcode. Which means that if another
	 * plugin has a similar shortcode, it will override yours or yours will override
	 * theirs depending on which order the plugins are included and/or ran.
	 *
	 * Simplest example of a shortcode tag using the API:
	 *
	 *     // [footag foo="bar"]
	 *     function footag_func( $atts ) {
	 *         return "foo = {
	 *             $atts[foo]
	 *         }";
	 *     }
	 *     add_shortcode( 'footag', 'footag_func' );
	 *
	 * Example with nice attribute defaults:
	 *
	 *     // [bartag foo="bar"]
	 *     function bartag_func( $atts ) {
	 *         $args = shortcode_atts( array(
	 *             'foo' => 'no foo',
	 *             'baz' => 'default baz',
	 *         ), $atts );
	 *
	 *         return "foo = {$args['foo']}";
	 *     }
	 *     add_shortcode( 'bartag', 'bartag_func' );
	 *
	 * Example with enclosed content:
	 *
	 *     // [baztag]content[/baztag]
	 *     function baztag_func( $atts, $content = '' ) {
	 *         return "content = $content";
	 *     }
	 *     add_shortcode( 'baztag', 'baztag_func' );
	 *
	 * @since 2.5.0
	 *
	 * @uses $this->_shortcode_tags
	 *
	 * @param string $tag Shortcode tag to be searched in post content.
	 * @param callable $func Hook to run when shortcode is found.
	 */
	function add_shortcode($tag, $func) {

		if ( is_callable($func) )
			$this->_shortcode_tags[$tag] = $func;
	}

	/**
	 * Combine user attributes with known attributes and fill in defaults when needed.
	 *
	 * The pairs should be considered to be all of the attributes which are
	 * supported by the caller and given as a list. The returned attributes will
	 * only contain the attributes in the $pairs list.
	 *
	 * If the $atts list has unsupported attributes, then they will be ignored and
	 * removed from the final returned list.
	 *
	 * @since 2.5.0
	 *
	 * @param array $pairs Entire list of supported attributes and their defaults.
	 * @param array $atts User defined attributes in shortcode tag.
	 * @param string $shortcode Optional. The name of the shortcode, provided for context to enable filtering
	 * @return array Combined and filtered attribute list.
	 */
	function shortcode_atts( $pairs, $atts, $shortcode = '' ) {
		$atts = (array)$atts;
		$out = array();
		foreach($pairs as $name => $default) {
			if ( array_key_exists($name, $atts) )
				$out[$name] = $atts[$name];
			else
				$out[$name] = $default;
		}

		/*
		 * Filter a shortcode's default attributes.
		 *
		 * If the third parameter of the shortcode_atts() function is present then this filter is available.
		 * The third parameter, $shortcode, is the name of the shortcode.
		 *
		 * @since 3.6.0
		 *
		 * @param array $out The output array of shortcode attributes.
		 * @param array $pairs The supported attributes and their defaults.
		 * @param array $atts The user defined shortcode attributes.
		 *
		if ( $shortcode )
			$out = apply_filters( "shortcode_atts_{$shortcode}", $out, $pairs, $atts );
		*/

		return $out;
	}

	/**
	 * Escaping for HTML attributes.
	 *
	 * @since 2.8.0
	 *
	 * @param string $text
	 * @return string
	 */
	function esc_attr( $text ) {
		
		$safe_text = $text;

		//$safe_text = wp_check_invalid_utf8( $text );
		$safe_text = $this->_wp_specialchars( $safe_text, ENT_QUOTES );
		
		/*
		 * Filter a string cleaned and escaped for output in an HTML attribute.
		 *
		 * Text passed to esc_attr() is stripped of invalid or special characters
		 * before output.
		 *
		 * @since 2.0.6
		 *
		 * @param string $safe_text The text after it has been escaped.
	 	 * @param string $text      The text prior to being escaped.
		 *
		return apply_filters( 'attribute_escape', $safe_text, $text );
		*/

		return $safe_text;
	}

	/**
	 * Converts a number of special characters into their HTML entities.
	 *
	 * Specifically deals with: &, <, >, ", and '.
	 *
	 * $quote_style can be set to ENT_COMPAT to encode " to
	 * &quot;, or ENT_QUOTES to do both. Default is ENT_NOQUOTES where no quotes are encoded.
	 *
	 * @since 1.2.2
	 * @access private
	 *
	 * @param string $string The text which is to be encoded.
	 * @param int $quote_style Optional. Converts double quotes if set to ENT_COMPAT, both single and double if set to ENT_QUOTES or none if set to ENT_NOQUOTES. Also compatible with old values; converting single quotes if set to 'single', double if set to 'double' or both if otherwise set. Default is ENT_NOQUOTES.
	 * @param string $charset Optional. The character encoding of the string. Default is false.
	 * @param boolean $double_encode Optional. Whether to encode existing html entities. Default is false.
	 * @return string The encoded text with HTML entities.
	 */
	function _wp_specialchars( $string, $quote_style = ENT_NOQUOTES, $charset = false, $double_encode = false ) {
		$string = (string) $string;

		if ( 0 === strlen( $string ) )
			return '';

		// Don't bother if there are no specialchars - saves some processing
		if ( ! preg_match( '/[&<>"\']/', $string ) )
			return $string;

		// Account for the previous behaviour of the function when the $quote_style is not an accepted value
		if ( empty( $quote_style ) )
			$quote_style = ENT_NOQUOTES;
		elseif ( ! in_array( $quote_style, array( 0, 2, 3, 'single', 'double' ), true ) )
			$quote_style = ENT_QUOTES;

		$charset = 'utf8';

		if ( in_array( $charset, array( 'utf8', 'utf-8', 'UTF8' ) ) )
			$charset = 'UTF-8';

		$_quote_style = $quote_style;

		if ( $quote_style === 'double' ) {
			$quote_style = ENT_COMPAT;
			$_quote_style = ENT_COMPAT;
		} elseif ( $quote_style === 'single' ) {
			$quote_style = ENT_NOQUOTES;
		}

		// Handle double encoding ourselves
		if ( $double_encode ) {
			$string = @htmlspecialchars( $string, $quote_style, $charset );
		} else {
			// Decode &amp; into &
			$string = $this->wp_specialchars_decode( $string, $_quote_style );

			// Guarantee every &entity; is valid or re-encode the &
			$string = $this->wp_kses_normalize_entities( $string );

			// Now re-encode everything except &entity;
			$string = preg_split( '/(&#?x?[0-9a-z]+;)/i', $string, -1, PREG_SPLIT_DELIM_CAPTURE );

			for ( $i = 0, $c = count( $string ); $i < $c; $i += 2 ) {
				$string[$i] = @htmlspecialchars( $string[$i], $quote_style, $charset );
			}
			$string = implode( '', $string );
		}

		// Backwards compatibility
		if ( 'single' === $_quote_style )
			$string = str_replace( "'", '&#039;', $string );

		return $string;
	}

	/**
	 * Converts and fixes HTML entities.
	 *
	 * This function normalizes HTML entities. It will convert `AT&T` to the correct
	 * `AT&amp;T`, `&#00058;` to `&#58;`, `&#XYZZY;` to `&amp;#XYZZY;` and so on.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string Content to normalize entities
	 * @return string Content with normalized entities
	 */
	function wp_kses_normalize_entities($string) {
		// Disarm all entities by converting & to &amp;

		$string = str_replace('&', '&amp;', $string);

		// Change back the allowed entities in our entity whitelist

		$string = preg_replace_callback('/&amp;([A-Za-z]{2,8}[0-9]{0,2});/', 'wp_kses_named_entities', $string);
		$string = preg_replace_callback('/&amp;#(0*[0-9]{1,7});/', 'wp_kses_normalize_entities2', $string);
		$string = preg_replace_callback('/&amp;#[Xx](0*[0-9A-Fa-f]{1,6});/', 'wp_kses_normalize_entities3', $string);

		return $string;
	}

	/**
	 * Converts a number of HTML entities into their special characters.
	 *
	 * Specifically deals with: &, <, >, ", and '.
	 *
	 * $quote_style can be set to ENT_COMPAT to decode " entities,
	 * or ENT_QUOTES to do both " and '. Default is ENT_NOQUOTES where no quotes are decoded.
	 *
	 * @since 2.8.0
	 *
	 * @param string $string The text which is to be decoded.
	 * @param mixed $quote_style Optional. Converts double quotes if set to ENT_COMPAT, both single and double if set to ENT_QUOTES or none if set to ENT_NOQUOTES. Also compatible with old _wp_specialchars() values; converting single quotes if set to 'single', double if set to 'double' or both if otherwise set. Default is ENT_NOQUOTES.
	 * @return string The decoded text without HTML entities.
	 */
	function wp_specialchars_decode( $string, $quote_style = ENT_NOQUOTES ) {
		$string = (string) $string;

		if ( 0 === strlen( $string ) ) {
			return '';
		}

		// Don't bother if there are no entities - saves a lot of processing
		if ( strpos( $string, '&' ) === false ) {
			return $string;
		}

		// Match the previous behaviour of _wp_specialchars() when the $quote_style is not an accepted value
		if ( empty( $quote_style ) ) {
			$quote_style = ENT_NOQUOTES;
		} elseif ( !in_array( $quote_style, array( 0, 2, 3, 'single', 'double' ), true ) ) {
			$quote_style = ENT_QUOTES;
		}

		// More complete than get_html_translation_table( HTML_SPECIALCHARS )
		$single = array( '&#039;'  => '\'', '&#x27;' => '\'' );
		$single_preg = array( '/&#0*39;/'  => '&#039;', '/&#x0*27;/i' => '&#x27;' );
		$double = array( '&quot;' => '"', '&#034;'  => '"', '&#x22;' => '"' );
		$double_preg = array( '/&#0*34;/'  => '&#034;', '/&#x0*22;/i' => '&#x22;' );
		$others = array( '&lt;'   => '<', '&#060;'  => '<', '&gt;'   => '>', '&#062;'  => '>', '&amp;'  => '&', '&#038;'  => '&', '&#x26;' => '&' );
		$others_preg = array( '/&#0*60;/'  => '&#060;', '/&#0*62;/'  => '&#062;', '/&#0*38;/'  => '&#038;', '/&#x0*26;/i' => '&#x26;' );

		if ( $quote_style === ENT_QUOTES ) {
			$translation = array_merge( $single, $double, $others );
			$translation_preg = array_merge( $single_preg, $double_preg, $others_preg );
		} elseif ( $quote_style === ENT_COMPAT || $quote_style === 'double' ) {
			$translation = array_merge( $double, $others );
			$translation_preg = array_merge( $double_preg, $others_preg );
		} elseif ( $quote_style === 'single' ) {
			$translation = array_merge( $single, $others );
			$translation_preg = array_merge( $single_preg, $others_preg );
		} elseif ( $quote_style === ENT_NOQUOTES ) {
			$translation = $others;
			$translation_preg = $others_preg;
		}

		// Remove zero padding on numeric entities
		$string = preg_replace( array_keys( $translation_preg ), array_values( $translation_preg ), $string );

		// Replace characters according to translation table
		return strtr( $string, $translation );
	}


	/**
	 * Remove date-formatted article links
	 * Replace with slug-based ones
	 * @param  string $html 
	 * @return string       
	 */
	function wp_fix_article_links($html)
	{

		return preg_replace_callback(
				'/[http:]*?[\/]*?www.stack.com\/[0-9]{4,4}\/[0-9]{2,2}\/[0-9]{2,2}\/(.*?)[\'|"|\?|&|\/]/', 
				function($matches){
					
					$return = '';

					if (isset($matches[1])):

						$return = routelink('article', array('slug' => $matches[1]));

					endif;

					return $return;
				},
				$html
			);

	}


	/** 
	* Snippet Name: Add ‘img-responsive’ class to images 
	* Snippet URL: http://www.wpcustoms.net/snippets/add-img-responsive-class-images/ 
	*/  
	function wpc_add_image_responsive_class($html)
	{  
		$classes = 'img-responsive'; // separated by spaces, e.g. 'img image-link'  

		// add img-responsive class
		$html = preg_replace('/(<img.*?)(\/\>)/', '$1 class="' . $classes . '" $2', $html); 
		
		// combine any image classes
		$html = preg_replace('/<img(.*?)class="(.*?)"(.*?)class="(.*?)"/', '<img$1class="$2 $4"$3', $html);

		// remove dimensions from images,, does not need it!  
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );  

		return $html;  
	}  

	function img_caption_shortcode($attr, $content = null) {
		
		// New-style shortcode with the caption inside the shortcode with the link and image tags.
		if ( ! isset( $attr['caption'] ) ) {
			if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
				$content = $matches[1];
				$attr['caption'] = trim( $matches[2] );
			}
		}

		// Allow plugins/themes to override the default caption template.
		// $output = apply_filters('img_caption_shortcode', '', $attr, $content);
		

		$output = $attr;

		/*
		if ( $output != '' )
			return $output; */

		extract($this->shortcode_atts(array(
			'id'      => '',
			'align'   => 'alignnone',
			'width'   => '',
			'caption' => ''
		), $attr));

		if ( 1 > (int) $width || empty($caption) )
			return $content;

		if ( $id ) $id = 'id="' . $this->esc_attr($id) . '" ';

		return '<div ' . $id . 'class="wp-caption ' . $this->esc_attr($align) . '">'
		. $this->do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
	}

}