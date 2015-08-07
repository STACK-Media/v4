<?php

ini_set('auto_detect_line_endings', true);

$emails = array();


// collect all leads
$f = fopen('leads.csv', 'r');

while(($row = fgetcsv($f)) !== FALSE):

	$emails[trim(strtolower($row[0]))] = $row[1];

endwhile;

fclose($f);



// collect all buyers and declines
$f2 = fopen('transactions.csv', 'r');

while(($row = fgetcsv($f2)) !== FALSE):

	$type = ($row[1] == 'succeeded' ? 'purchased' : 'declined');

	$emails[trim(strtolower($row[0]))] = $type;

endwhile;

fclose($f2);



// remove those in sailthru
$f3 = fopen('speed-kills.csv', 'r');

while(($row = fgetcsv($f3)) !== FALSE):

	unset($emails[trim(strtolower($row[0]))]);

endwhile;

foreach ($emails as $email => $type):

	if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)):

		unset($emails[$email]);
		continue;

	endif;

endforeach;

fclose($f3);

echo json_encode($emails);