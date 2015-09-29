<?php

//exit();

$data  = array_map('str_getcsv', file('urls-lite.csv'));
$array = array();

$counter = 0;

$userpass = 'stack:Rx45hnj23kl54!';

foreach ($data as $row):

	$counter++;

	if ($counter > 20):

		break;

	endif;

	$live             = 'http://www.stack.com'.$row[0];
	$rewrite          = 'http://'.$userpass.'@v4.stack.com'.$row[0];
	$live_status      = '';
	$rewrite_status   = '';
	$live_redirect    = '';
	$rewrite_redirect = '';

	$live_headers     = get_headers($live, 1);
	$live_status      = $live_headers[0];

	usleep(250000);
	
	$rewrite_headers  = get_headers($rewrite, 1);
	$rewrite_status   = $rewrite_headers[0];

	$array[] = array(
		'live'             => $live, 
		'status'           => $live_status, 
		'redirect'         => $live_redirect,
		'rewrite'          => str_replace($userpass.'@','',$rewrite), 
		'rewrite_status'   => $rewrite_status,
		'rewrite_redirect' => $rewrite_redirect
	);

	usleep(250000);

endforeach;


$array = array_merge(array(array_keys($array[0])), $array);

$f = fopen('php://memory', 'w'); 

foreach ($array as $line):

	fputcsv($f, $line);

endforeach;

// reset the file pointer to the start of the file
fseek($f, 0);
// tell the browser it's going to be a csv file
header('Content-Type: application/csv');
// tell the browser we want to save it instead of displaying it
header('Content-Disposition: attachment; filename="crawled-pages-'.mt_rand().'.csv";');
// make php send the generated csv lines to the browser
fpassthru($f);
