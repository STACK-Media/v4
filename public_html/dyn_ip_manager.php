<?php

$ips = array(
	'104.179.86.19',
	'98.100.78.211',
	'127.0.0.1'
);

if ( ! in_array($_SERVER['REMOTE_ADDR'], $ips)):

	exit('disallowed');

endif;

session_start();

if (isset($_POST['action']) && $_POST['action'] == 'do_work')
{
	$post_data       = $_POST;
	$session_domains = $_SESSION['domains'];

	foreach ($session_domains as $domain => $properties) {

		$new_ip = $post_data[str_replace('.', '_', $domain)];

		if ($properties['current_ip'] != $new_ip)
		{
			echo "updating ip for $domain to " . $new_ip . '<br />';
			$response = curl('http://jspicher:jetski20@members.dyndns.org/nic/update?hostname='.$domain.'&myip='.$new_ip.'&wildcard=NOCHG&mx=NOCHG&backmx=NOCHG');
			echo "DYN RESPONSE: $response<br />";
		}

	}

	sleep(30);

}

$domains = array(
	'aquaflexin.com' => array(
		'web3'       => '192.64.176.115',
		'web2'       => '208.115.236.82',
		'current_ip' => null
	),
	'aquaflexin.org' => array(
		'web3'       => '192.64.176.116',
		'web2'       => '69.162.70.67',
		'current_ip' => null
	),
	'betterhealthinfo.org' => array(
		'web3'       => '192.64.176.100',
		'web2'       => '64.31.42.210',
		'current_ip' => null
	),
	'buyaquaflexin.com' => array(
		'web3'       => '192.64.176.138',
		'web2'       => '216.245.192.236',
		'current_ip' => null
	),
	'buyglucohealth.com' => array(
		'web3'       => '192.64.176.135',
		'web2'       => '69.162.74.14',
		'current_ip' => null
	),
	'cognimaxx.com' => array(
		'web3'       => '192.64.176.102',
		'web2'       => '208.115.236.85',
		'current_ip' => null
	),
	'cognimaxx.org' => array(
		'web3'       => '192.64.176.112',
		'web2'       => '69.162.70.66',
		'current_ip' => null
	),
	'com-health-index.net' => array(
		'web3'       => '192.64.176.121',
		'web2'       => '216.245.206.110',
		'current_ip' => null
	),
	'consumerschoicehealth.com' => array(
		'web3'       => '192.64.176.122',
		'web2'       => '64.31.42.213',
		'current_ip' => null
	),
	'eliminateheatingbills.com' => array(
		'web3'       => '192.64.176.139',
		'web2'       => '216.245.192.237',
		'current_ip' => null
	),
	'haveahealthyheart.org' => array(
		'web3'       => '192.64.176.127',
		'web2'       => '208.115.236.86',
		'current_ip' => null
	),
	'healthbreakthroughs.org' => array(
		'web3'       => '192.64.176.117',
		'web2'       => '69.162.71.219',
		'current_ip' => null
	),
	'healthyheater.com' => array(
		'web3'       => '192.64.176.100',
		'web2'       => '64.31.42.210',
		'current_ip' => null
	),
	'healthyheatingsolution.com' => array(
		'web3'       => '192.64.176.140',
		'web2'       => '216.245.192.238',
		'current_ip' => null
	),
	'heartattackkiller.com' => array(
		'web3'       => '192.64.176.105',
		'web2'       => '208.115.236.84',
		'current_ip' => null
	),
	'keybiotics.co' => array(
		'web3'       => '192.64.176.103',
		'web2'       => '216.245.206.109',
		'current_ip' => null
	),
	'leadinghealthsupplements.com' => array(
		'web3'       => '192.64.176.109',
		'web2'       => '69.162.71.220',
		'current_ip' => null
	),
	'lifetabs.com' => array(
		'web3'       => '192.64.176.134',
		'web2'       => '69.162.74.13',
		'current_ip' => null
	),
	'mygoodhealthtips.net' => array(
		'web3'       => '192.64.176.111',
		'web2'       => '216.245.206.106',
		'current_ip' => null
	),
	'mymagichairdryer.com' => array(
		'web3'       => '192.64.176.100',
		'web2'       => '64.31.42.210',
		'current_ip' => null
	),
	'naturalhomehealthguide.com' => array(
		'web3'       => '192.64.176.118',
		'web2'       => '69.162.71.221',
		'current_ip' => null
	),
	'naturesgarciniadirect.com' => array(
		'web3'       => '192.64.176.133',
		'web2'       => '69.162.74.12',
		'current_ip' => null
	),
	'naturespureforskolin.com' => array(
		'web3'       => '192.64.176.113',
		'web2'       => '69.162.70.70',
		'current_ip' => null
	),
	'naturespuregarciniacambogia.com' => array(
		'web3'       => '192.64.176.132',
		'web2'       => '69.162.74.11',
		'current_ip' => null
	),
	'pectapure.com' => array(
		'web3'       => '192.64.176.114',
		'web2'       => '69.162.71.218',
		'current_ip' => null
	),
	'phyto-renew350.com' => array(
		'web3'       => '192.64.176.123',
		'web2'       => '69.162.70.68',
		'current_ip' => null
	),
	'premiumhealthsupplies.com' => array(
		'web3'       => '192.64.176.124',
		'web2'       => '69.162.74.10',
		'current_ip' => null
	),
	'premiumpureforskolin.com' => array(
		'web3'       => '192.64.176.110',
		'web2'       => '69.162.70.69',
		'current_ip' => null
	),
	'pura-bella.com' => array(
		'web3'       => '192.64.176.137',
		'web2'       => '216.245.192.234',
		'current_ip' => null
	),
	'purabellaskincream.com' => array(
		'web3'       => '192.64.176.136',
		'web2'       => '216.245.192.235',
		'current_ip' => null
	),
	'pureomegakrill.com' => array(
		'web3'       => '192.64.176.119',
		'web2'       => '208.115.236.83',
		'current_ip' => null
	),
	'rippedlabsnutrition.com' => array(
		'web3'       => '192.64.176.120',
		'web2'       => '64.31.42.210',
		'current_ip' => null
	),
	'slimtrim2000.com' => array(
		'web3'       => '192.64.176.141',
		'web2'       => '69.162.71.222',
		'current_ip' => null
	),
);

foreach ($domains as $domain => $properties) {
	$domains[$domain]['current_ip'] = gethostbyname($domain);
}

$_SESSION['domains'] = $domains;

$servers = array(
	'web2' => array(
		'host'    => 'web2.consumerschoicehealth.com', 
		'is_live' => false
	),
	'web3' => array(
		'host'    => 'web3.consumerschoicehealth.com', 
		'is_live' => false
	)
);

foreach ($servers as $server => $properties) {
	$servers[$server]['is_live'] = pingServer($servers[$server]['host'],80);
}

?>

<html>
<head>

<style>
	th {border-bottom: 1px solid #000;}
	td {border-bottom: 1px solid #eee;}

	.red {
		display: inline-block;
		border-radius: 50%;
		width: 10px;
		height: 10px; 
		background-color: #FF0000;
	}
	.green {
		display: inline-block;
		border-radius: 50%;
		width: 10px;
		height: 10px; 
		background-color: #00FF00;
	}
	.wide{
		width:200px;
	}

</style>

</head>
<html>
<body>

<form method="post" action="">

<table>
<tr>
	<th>domain</th>
	<th>set ip</th>
	<th class="wide">web3 (live) <span class="<?php if ($servers['web3']['is_live']) { echo 'green'; } else { echo 'red'; } ?>"></span></th>
	<th>set ip</th>
	<th class="wide">web2 (backup 2) <span class="<?php if ($servers['web2']['is_live']) { echo 'green'; } else { echo 'red'; } ?>"></th>
</tr>

<?php
foreach ($domains as $domain => $properties) {
	?>
	<tr>
		<td><?php echo $domain; ?></td>
		<td><input type="radio" name="<?php echo $domain; ?>" value="<?php echo $properties['web3']; ?>" <?php if ($properties['current_ip'] == $properties['web3']) {echo 'checked="checked"';} ?> ></td>
		<td><?php echo $properties['web3']; ?></td>
		<td><input type="radio" name="<?php echo $domain; ?>" value="<?php echo $properties['web2']; ?>" <?php if ($properties['current_ip'] == $properties['web2']) {echo 'checked="checked"';} ?> ></td>
		<td><?php echo $properties['web2']; ?></td>
	</tr>
	<?php
}
?>

</table>
<br />
<input type="hidden" name="action" value="do_work">
<input type="submit" value="Save Changes">

<form>

</body>
</html>

<?php

// FUNCTION LIBRARY

function pingServer($host, $port = 80)
{
	$result = false;
	$waitTimeoutInSeconds = 1;
	if(@$fp = fsockopen(gethostbyname($host),$port,$errCode,$errStr,$waitTimeoutInSeconds)){   
		$result = true;
		fclose($fp);
	}
	return $result;
}

function curl($url)
{
	$curl = curl_init();
	curl_setopt_array($curl, array(
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_URL => $url,
	    CURLOPT_FOLLOWLOCATION => 1,
	    CURLOPT_USERAGENT => 'Consumers Choice Health - Server Updates - 1.0',
	));
	$resp = curl_exec($curl);
	curl_close($curl);
	return $resp;
}