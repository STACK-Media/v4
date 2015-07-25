<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Models\ContentModels\Wordpress\ArticleModel;
use App\Services\Contentmanagers\Wordpress\Taxonomy;

class Article extends Wordpress
{

	private $_model;

	function __construct()
	{
		parent::__construct();

		$this->add_shortcode('caption', array($this,'img_caption_shortcode'));

		$this->_model = new ArticleModel;
	}

	function _format_content($article)
	{

		$content = $article->post_content;

		$content = $this->wpautop($content);
		$content = $this->do_shortcode($content);
		$content = $this->remove_hidden_image($content);
		$content = $this->wpc_add_image_responsive_class($content);
		$content = $this->wp_fix_article_links($content);

		if (property_exists($article, 'meta')):
		
			$content = $this->_custom_field_tags($content, $article->meta);
		
		endif;

		return $content;
	}

	function _reformat_author_fields($article)
	{
		$article->author['username'] = $article->author_user;
		$article->author['name']     = $article->author_name;
		$article->author['url']      = $article->author_url;
		$article->author['email']    = $article->author_email;
		$article->author['id']       = $article->author_id;

		unset($article->author_user);
		unset($article->author_name);
		unset($article->author_url);
		unset($article->author_email);
		unset($article->author_id);

		return $article;
	
	}

	function _add_metacontent($article)
	{

		if ( ! $article || ! is_object($article) || ! property_exists($article, 'id')):

			return FALSE;

		endif;

		$taxservice = new Taxonomy;

		$article->taxonomy = $taxservice->get_by_article_id($article->id);

		$article->meta = $this->get_meta_by_id($article->id);

		$article->post_content = $this->_format_content($article);

		$article = $this->_reformat_author_fields($article);

		return $article;

	}

	function _custom_field_tags($content, $meta)
	{

		$pattern = '/\[cf\](.*?)\[\/cf\]/i';
		
		preg_match_all($pattern, $content, $matches);

		if ( ! $matches || ! is_array($matches)):

			return $content;

		endif;

		$match_array = array_combine($matches[0], $matches[1]);

		foreach ($match_array as $find => $key):

			$replace = '';

			if (array_key_exists($key, $meta)):

				$replace = $meta[$key];

			endif;

			$content = str_replace($find, $replace, $content);

		endforeach;

		return $content;
	}

	function get_meta_by_id($article_id)
	{
		$meta = $this->_model->get_meta($article_id);

		if ( ! $meta):

			return NULL;

		endif;

		$meta_array = array();

		foreach ($meta as $meta_obj):

			$meta_array[$meta_obj->meta_key] = $meta_obj->meta_value;

		endforeach;

		return $meta_array;
	}

	function get_by_id($id, $type = 'publish')
	{

		$id       = preg_replace("/[^0-9]/", '', $id);
		$statuses = $this->_get_statuses($type);
		$article  = $this->_model->get_by_id($id, $statuses);

		return $this->_add_metacontent($article);

	}


	function get_by_slug($slug, $type = 'publish')
	{

		$slug     = preg_replace("/[^a-z0-9-]/",'',strtolower($slug));
		$statuses = $this->_get_statuses($type);
		$article  = $this->_model->get_by_slug($slug, $statuses);

		return $this->_add_metacontent($article);

	}

	function _get_statuses($type)
	{
		$statuses = array('publish');

		if ($type != 'publish'):

			$statuses = array('publish','future','draft');

		endif;

		return $statuses;
	}

	public function trending()
	{
		return $this->_model->trending();
	}

}