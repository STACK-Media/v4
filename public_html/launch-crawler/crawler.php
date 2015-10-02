<?php

if ( ! isset($_GET['key']) || $_GET['key'] != 'a8Hhgdzpo'):

	exit();

endif;

set_time_limit(900);

require_once('ParallelCurl-master/parallelcurl.php');

$data         = array_map('str_getcsv', file('urls-lite.csv'));


//$data = array_slice($data, 0, 10, TRUE);


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

	if ($httpcode == 404 && $args['type'] == 'live'):

		return;

	endif;

	if ($httpcode == 200 && $redir != $url):

		$httpcode = 301;

	endif;

	$array[$args['counter']][$args['type'].'_url']      = str_replace($userpass.'@', '', $url);
	$array[$args['counter']][$args['type'].'_status']   = $httpcode;
	$array[$args['counter']][$args['type'].'_redirect'] = str_replace($userpass.'@', '', $redir);

}

$rewrite_urls = array();

foreach ($data as $row):

	if ($counter > 500):

		break;

	endif;

	$array[$counter] = array(
		'live_url'         => '',
		'live_status'      => '',
		'live_redirect'    => '',
		'rewrite_url'      => '',
		'rewrite_status'   => '',
		'rewrite_redirect' => '',
	);

	$live = 'http://www.stack.com'.$row[0];

	if (strpos($live, '.') === FALSE):

		$live = $live . '/';

	endif;

	$rewrite = 'http://'.$userpass.'@v4.stack.com'.$row[0];

	$rewrite_urls[$counter] = $rewrite;

	$parallel_curl->startRequest($live, 'on_request_done', 
		array(
			'type'    => 'live', 
			'counter' => $counter
		)
	);

	$counter++;

endforeach;

$parallel_curl->finishAllRequests();

$parallel_curl = new ParallelCurl($max_requests, $curl_options);

foreach ($array as $numkey => $args):

	if ( ! $args['live_url']):

		unset($array[$numkey]);
		continue;

	endif;

	$parallel_curl->startRequest($rewrite_urls[$numkey], 'on_request_done', 
		array(
			'type'    => 'rewrite', 
			'counter' => $numkey
		)
	);

endforeach;

$parallel_curl->finishAllRequests();

$array = array_merge(array(array_keys(array_values($array)[0])), $array);

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
