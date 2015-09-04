<?php
// open xml file
echo '<?xml version="1.0" encoding="UTF-8"?>';

// open rss tag
echo '<rss version="2.0"';

// iterate xmlns
foreach ($xmlns AS $key => $value):

	// add to rss field as attributes
	echo ' xmlns:'.$key.'="'.$value.'"';

endforeach;

// close rss field
echo '>';
?>

	<channel>

		<title>STACK</title>
		<atom:link href="http://www.stack.com/mrss/{{$slug}}" rel="self" type="application/rss+xml" />
		<link>http://www.stack.com/mrss/{{$slug}}</link>
		<description>For The Athlete By The Athlete </description>
		<lastBuildDate><?php echo date('D, d M Y H:i:s +0000'); ?></lastBuildDate>
		<language>en</language>

		@foreach ($items AS $key => $value)

			<item>

				<?php
				foreach ($value AS $keys => $values):

					// if values is not an array display key = value	
					if ( ! is_array($values)):

						echo '<'.$keys.'>'.$values.'</'.$keys.'>
				';

					else:	// these are multi-dimensional associative arrays

						// if $values['value'] is set, that means these are attributes and not multi-dimensional XML elements
						if (isset($values['value'])):

							// initialize variables
							$showval 	= FALSE;	// boolean to see fi we have a value to display or not

							// start field
							echo '<'.$keys.' ';

							foreach ($values AS $attr => $val):

								// if attr == value, then this is a value and not an attribute
								if ($attr == 'value'):

									$showval 	= TRUE;
									continue;

								endif;

								// add attributes
								echo $attr.'="'.$val.'" ';

							endforeach;

							// close initial tag
							echo '>';

							// if we need ot display a value, do that before closing field
							if ($showval)
								echo $values['value'];

							// close field
							echo '</'.$keys.'>
				';

						else:

							// iterate over the new values
							foreach ($values AS $keyz => $valuez):

								// if values are an array, that means they're attirbutes that need added
								if ( ! is_array($valuez)):
		
									// show field
									echo '<'.$keys.':'.$keyz.'>'.$valuez.'</'.$keys.':'.$keyz.'>
				';

								else:	// we need to iterate attributes

									// initialize variables
									$showval 	= FALSE;	// boolean to see fi we have a value to display or not

									// start field
									echo '<'.$keys.':'.$keyz.' ';

									foreach ($valuez AS $attr => $val):

										// if attr == value, then this is a value and not an attribute
										if ($attr == 'value'):

											$showval 	= TRUE;
											continue;

										endif;

										// add attributes
										echo $attr.'="'.$val.'" ';

									endforeach;

									// close initial tag
									echo '>';

									// if we need ot display a value, do that before closing field
									if ($showval)
										echo $valuez['value'];

									// close field
									echo '</'.$keys.':'.$keyz.'>
				';

								endif;

							endforeach;

						endif;

					endif;

				endforeach;

				?>


			</item>

		@endforeach

	</channel>

</rss>
