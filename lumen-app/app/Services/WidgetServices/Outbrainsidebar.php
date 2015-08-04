<?php 

namespace App\Services\WidgetServices;

class Outbrainsidebar extends WidgetService
{
	public function get($page)
	{
		// determine which outbrain URL to use
		$outbrain_url	= 'http://www.stack.com/video/1277358638001/developing-lowerbody-power-in-the-adipure-trainer/';

		return array(
			'outbrain_url'	=> $outbrain_url
		);
	}
}