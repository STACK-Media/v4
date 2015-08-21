<?php 

namespace App\Services\WidgetServices;

use App\Services\Contentmanager;

class Magazineissues extends WidgetService
{
	function get($page)
	{
		// initialize content manager
		$magazine 	= new Contentmanager('magazine');

		// grab all magazine issues
		$issues 	= $magazine->all();

		return array(
			'issues'	=> $issues
		);
	}

}