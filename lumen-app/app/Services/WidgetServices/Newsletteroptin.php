<?php 

namespace App\Services\WidgetServices;

class Newsletteroptin extends WidgetService
{
	function get($page_object)
	{
		// generate array of widget variables
		$newsletter	= array(
			''
		);

		return array(
			'newsletter'	=> $newsletter
		);
	}

}