<?php

exit();

set_time_limit(600);

require_once('sailthru.php');

function _lead($email, $list)
{

	$response = array();

	$response['subscribed'] 	= SthruFuncs::getInstance()->add_to_b2c_list($email, $list);

	// fire custom sailthru event
	$response['event']['optin'] = SthruFuncs::getInstance()->event($email,'optin');
	$response['event']['Speed_Kills_Lead'] = SthruFuncs::getInstance()->event($email,'Speed_Kills_Lead');

	return $response;
}

function _sale($email, $list)
{
	$response = array();

	// skipping revenue, dont have the data in the emails array
	// $response['rev'] = SthruFuncs::getInstance()->record_product_purchase($customer_email, $sthru_message_id, $product);

	$response['subscribed'] = SthruFuncs::getInstance()->add_to_b2c_list($email, $list);
	$response['event']['Speed_Kills_Purchased'] = SthruFuncs::getInstance()->event($email,'Speed_Kills_Purchased');

	return $response;

}

$sthru      = SthruFuncs::getInstance();

//$email_json = require_once('email_json.php');
//$emails     = json_decode($email_json, TRUE);

/*
$emails = array(
	'gperich@live.com'  => 'lead',
	'seanxsm@gmail.com' => 'lead'
);
*/

foreach ($emails as $email => $type):

	$response = array();

	if (in_array($type, array('nutrition', 'lead'))):

		$response = _lead($email, $type);

	endif;

	if ($type == 'purchased'):

		$response = _sale($email, $type);
		
	endif;

	if ($type == 'declined'):

		// nothing yet because no declined in missing emails

	endif;

	var_dump(array($email, $type, $response));
	echo "\n\n\n<br/><br/><br/>\n\n\n";

endforeach;


// record_product_purchase($email, $message_id, $product)
// record_purchase($email, $message_id, $items)
// add_to_list($lists, $email, $vars)
// add_to_b2c_list($email, $status = 'lead')

echo count($emails);