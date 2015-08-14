<?php 

namespace App\Services\WidgetServices;


use App\Services\Contentmanager;

class Sportexperts extends WidgetService
{
	function get($page)
	{
		// initialize content manager
		//$content 	= new Contentmanager('user');

		// intiialize method
		$method 	= '_'.$page->sport;

		// grab sport data from config
		$experts 	= $this->$method();

		return array(
			'experts'	=> $experts
		);
	}

	private function _football()
	{
		return array(
			array(
				'slug'	=> 'mark',
				'name'	=> 'Mark Roozen',
				'image'	=> 'http://blog.stack.com/wp-content/uploads/userphoto/44.jpg',
				'desc'	=> 'Mark Roozen, M.Ed.,CSCS,*D, NSCA-CPT, FNSCA, is the Director of Performance at Day of Champions Sport Camps. He...'
			),
			array(
				'slug'	=> 'kurt-hester',
				'name'	=> 'Kurt Hester',
				'image'	=> 'http://blog.stack.com/wp-content/uploads/userphoto/175.png',
				'desc'	=> 'Kurt Hester is the head strength and conditioning coach at Louisiana Tech. Prior to that, he served as D1’s director...'
			),
			array(
				'slug'	=> 'duane-carlisle',
				'name'	=> 'Duane Carlisle',
				'image'	=> 'http://blog.stack.com/wp-content/uploads/userphoto/308.png',
				'desc'	=> 'Duane Carlisle, MSc, CSCS, SCCC, USAW, is the director of sports performance at Purdue University. He previously...'	
			)
		);
	}
}