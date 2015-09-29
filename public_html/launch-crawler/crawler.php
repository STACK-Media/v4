<?php

exit();

$data  = array_map('str_getcsv', file('urls.csv'));
$array = array();

foreach ($data as $row):

	$live           = 'http://www.stack.com'.$row[0];
	$stage          = 'http://stack:Rx45hnj23kl54!@stage.stack.com'.$row[0];
	$live_status    = '';
	$stage_status   = '';
	$live_redirect  = '';
	$stage_redirect = '';
	
	$live_headers   = get_headers($live, 1);
	$live_status    = $live_headers[0];
	
	$stage_headers  = get_headers($stage, 1);
	$stage_status   = $stage_headers[0];

	$array[] = array(
		'live'           => $live, 
		'status'         => $live_status, 
		'redirect'       => $live_redirect,
		'stage'          => str_replace('stack:Rx45hnj23kl54!@','',$stage), 
		'stage_status'   => $stage_status,
		'stage_redirect' => $stage_redirect
	);

	sleep(2);

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
