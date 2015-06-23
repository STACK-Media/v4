<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta property="og:site_name" content="STACK" name="og:site_name" />

<title>STACK Home | STACK</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Global CSS -->
<link rel="stylesheet" href="/assets/css/global.css">

<?php
// include global pixels
echo view('theme::partials.pixels.global');

// include custom pixels
echo view('theme::partials.pixels.custom');
?>