<?php 

namespace App\Services\WidgetServices;

use App\Services\ESPManager;

class Test extends WidgetService
{
	function get($page_object)
	{
		$SailThru = new ESPManager('subscription');

		// generate array of social networks w/data
		$sailthru 	= $SailThru::Get('matt.thompson@stack.com');

		return array(
			'test'	=> $sailthru
		);
	}

}