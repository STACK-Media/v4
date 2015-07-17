<?php 

namespace App\Services\WidgetServices;

class Outbrain extends WidgetService
{
	public function get($page)
	{
		// determine which outbrain URL to use
		$outbrain_url	= 'www.stack.com';

		return array(
			'outbrain_url'	=> $outbrain_url
		);
	}
}