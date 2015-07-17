<?php 

namespace App\Services\WidgetServices;

use App\Services\Service;

class Outbrain extends Service
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