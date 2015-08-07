<?php

function __autoload($class)
{
    $parts = explode('\\', $class);
    require 'Libraries/' . implode('/',$parts) . '.php';
}


class SthruFuncs {

	private static 
		$instance, 
		$SailThru,
		$Template,
		$Event;

	private function __construct()
	{
		self::$SailThru = new ESP\SailThru\Subscriptions\Email;
		self::$Template = new ESP\SailThru\Template\Send;
		self::$Event 	= new ESP\SailThru\Events;
	}

	public static function getInstance()
	{
		if ( is_null(self::$instance)):

			self::$instance = new self();

		endif;

		return self::$instance;
	}

	function record_product_purchase($email, $message_id, $product)
	{
		$items = array(
			array(
				'id'    => $product['id'], 
				'price' => $product['amount'], 
				'qty'   => '1', 
				'url'   => $product['url'], 
				'title' => $product['name'],
				'tags'  => $product['tags']
			)
		); 

		return self::record_purchase($email, $message_id, $items);
	}

	function record_purchase($email, $message_id, $items)
	{
		$response = self::$SailThru->purchase(
			$email, 
			$message_id,
			$items
		);

		return $response;
	}

	function add_to_list($lists, $email, $vars)
	{

		if ( ! is_array($lists)):

			$lists = array($lists);

		endif;

		// always add to Newsletter and RobotNewsletter
		$lists[]	= 'Newsletter';
		$lists[]	= 'RobotNewsletter';

		foreach ($lists as $list):

			$email_lists[$list] = 1;

		endforeach;

		$subscribe 		= self::$SailThru->Create($email,$email_lists,$vars);
		## Subscribe to SailThru ##

		return $subscribe;

	}

	function add_to_b2c_list($email, $status = 'lead')
	{

		$vars 			= array(
			'source'			=> 'speed-kills',
			'speed_kills' 		=> $status,
			'newsletter_list'	=> 'yes',
			'monday_robot'		=> 'yes',
			'saturday_robot'	=> 'yes',
			'sales_list'		=> 'yes'
		);

		return self::add_to_list('Master', $email, $vars);

	}

	function send($email,$template)
	{
		return self::$Template->Email($email,$template);
	}

	function event($email,$event,$value='')
	{
		return self::$Event->Send($email,$event,$value);
	}
}









