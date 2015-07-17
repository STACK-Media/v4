<?php 

namespace App\Services\WidgetServices;

use App\Services\Service;

class OutbrainSidebar extends Service
{
	public function get($page)
	{
print "<pre>";
print_r($page);
exit;

		// determine which outbrain URL to use
		$outbrain_url	= 'www.stack.com';

		return array(
			'outbrain_url'	=> $outbrain_url
		);
	}
}