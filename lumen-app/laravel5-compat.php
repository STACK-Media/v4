<?php

if( ! function_exists('config_path')):

	/**
	* Return the path to config files
	* @param null $path
	* @return string
	*/
	function config_path($path = NULL)
	{

		$path = rtrim($path, ".php");

		return app()->basePath('config').'/'.$path.'.php';
	}

endif;

if( ! function_exists('public_path')):

	/**
	* Return the path to public dir
	* @param null $path
	* @return string
	*/
	function public_path($path=null)
	{
		return rtrim(app()->basePath('../public_html/'.$path), '/');
	}

endif;
