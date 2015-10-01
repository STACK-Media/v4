<?php

if ( ! isset($_GET['key']) || $_GET['key'] != 'a8Hhgdzpo'):

	exit();

endif;

require_once('ParallelCurl-master/parallelcurl.php');

$data         = array_map('str_getcsv', file('urls-lite.csv'));
$array        = array();
$counter      = 0;

$userpass     = 'stack:Rx45hnj23kl54!';

$max_requests = 50;

$curl_options = array(
    CURLOPT_SSL_VERIFYPEER => FALSE,
    CURLOPT_SSL_VERIFYHOST => FALSE,
    CURLOPT_HEADER         => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_FOLLOWLOCATION => TRUE,
    CURLOPT_NOBODY         => TRUE
);
 
$parallel_curl = new ParallelCurl($max_requests, $curl_options);

function on_request_done($content, $url, $ch, $args){

	global $array, $userpass;

	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
	$redir    = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

	if ($httpcode == 200 && $redir != $url):

		$httpcode = 301;

	endif;

	$array[$args['counter']][$args['type'].'_status']   = $httpcode;
	$array[$args['counter']][$args['type'].'_redirect'] = str_replace($userpass.'@', '', $redir);

}


foreach ($data as $row):

	if ($counter > 1000):

		break;

	endif;

	$live    = 'http://www.stack.com'.$row[0].'/';
	$rewrite = 'http://'.$userpass.'@v4.stack.com'.$row[0];

	$parallel_curl->startRequest($live, 'on_request_done', 
		array(
			'type'    => 'live', 
			'counter' => $counter
		)
	);

	$parallel_curl->startRequest($rewrite, 'on_request_done',  
		array(
			'type'    => 'stage', 
			'counter' => $counter
		)
	);

	$counter++;

endforeach;


$parallel_curl->finishAllRequests();

$array = array_merge(array(array_keys($array[0])), $array);

$f     = fopen('php://memory', 'w'); 

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
