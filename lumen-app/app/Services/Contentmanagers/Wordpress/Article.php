<?php 

namespace App\Services\Contentmanagers\Wordpress;

use App\Models\ContentModels\Wordpress\ArticleModel;

class Article extends Wordpress
{

	private $_model;

	function __construct()
	{
		parent::__construct();

		$this->_model = new ArticleModel;
	}

	function _format_article($article)
	{

		$article->post_content = $this->wpautop($article->post_content);
		$article->post_content = $this->do_shortcode($article->post_content);
		$article->post_content = $this->remove_hidden_image($article->post_content);

		return $article;
	}

	function get_by_id($id, $type = 'publish')
	{

		$id       = preg_replace("/[^0-9]/", '', $id);
		
		$statuses = $this->_get_statuses($type);

		return $this->_format_article($this->_model->get_by_id($id, $statuses));

	}


	function get_by_slug($slug, $type = 'publish')
	{

		$slug     = preg_replace("/[^a-z0-9-]/",'',strtolower($slug));

		$statuses = $this->_get_statuses($type);

		return $this->_format_article($this->_model->get_by_slug($slug, $statuses));

	}

	function _get_statuses($type)
	{
		$statuses = array('publish');

		if ($type != 'publish'):

			$statuses = array('publish','future','draft');

		endif;

		return $statuses;
	}

}