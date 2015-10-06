<?php 
namespace App\Services;

class ExercisePage extends Page
{

	function __construct($args = array())
	{

		$paramlist = array(
			'id' 	=> FALSE
		);
		
		$args = array_merge($paramlist, $args);
		extract($args);

		$exercise = new Contentmanager('exercise');

		
		$expage = $exercise->get($id);
		
		if (is_object($expage)):

			$this->_object            	= $expage;
			$this->_object->page_type 	= 'exercise';
			$this->_object->related 	= $exercise->get_by_article($expage->article_id, $get_thumbs = TRUE);

		endif;

		return parent::__construct();
	}
	
} 
