<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers;
use App\Services\Cacheturbator as Cacher;
use App\Facades\Assets;
use App\Services\Promotions;
use Laravel\Lumen\Routing\Controller as BaseController;

class PromosController extends APIController {

	public function show($group, $promo)
	{
		$success      = TRUE;

		$promoservice = new Cacher(new Promotions());
		$promocfg     = $promoservice->get($group, $promo);
		
		$views        = (is_array($promocfg['views']) ? $promocfg['views'] : array($views));

		shuffle($views);

		$view = reset($views);
		$view = view($view, array('group' => $group, 'promo' => $promo))->render();

		$result['view'] = array(trim($view));

		$asset_types    = array('javascript', 'stylesheet');

		foreach ($asset_types as $asset_type):

			$files = Assets::get_queued_raw($asset_type);

			if ( ! $files || ! is_array($files)):

				continue;

			endif;

			foreach ($files as $key => $file):

				$result[$asset_type][] = $file['src'];

			endforeach;			

		endforeach;

		return $this->response($success, $result);
	}

}