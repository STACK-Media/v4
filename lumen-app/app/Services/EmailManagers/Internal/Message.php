<?php 

namespace App\Services\EmailManagers\Internal;

class Message extends Internal
{
	var $_params 	= array(
		'from'			=> array(
			'email'		=> 'support@stack.com',
			'first'		=> 'STACK',
			'last'		=> 'Support'
		),
		'reply'			=> 'support@stack.com',
		'subject'		=> 'Welcome to STACK',
		'body'			=> 'Welcome to STACK body',
		'attachments'	=> array()
	);

	public function send($to,$params=array())
	{
		// override defaults
		$this->_params['from'] 		= (isset($params['from']))? $params['from']: $this->_params['from'];
		$this->_params['reply']		= (isset($params['reply']))? $params['reply']: $this->_params['reply'];
		$this->_params['subject']	= (isset($params['subject']))? $params['subject']: $this->_params['subject'];
		$this->_params['body']		= (isset($params['body']))? $params['body']: $this->_params['body'];

		return mail($to,$this->_params['subject'], $this->_params['body']);
	}

}