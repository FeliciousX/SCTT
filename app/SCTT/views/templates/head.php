<?php
$this->load->helper('html');
echo doctype('html5');
?>

<html lang="en">
<head>
<?php echo meta('Content-type', 'text/html; charset=utf-8', 'equiv'); ?>
<title><?php echo $title?></title>

<?php

$link = array(
          'href' => 'css/1140.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'screen'
);
echo link_tag($link);
echo
"<!--[if lte IE 7]>
<link rel=\"stylesheet\" href=\"css/ie.css\" type=\"text/css\" media=\"screen\" />
<![endif]-->";

$link = array(
          'href' => 'css/typeimg.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'screen'
);
echo "<!-- Type and image presets -->";
echo link_tag($link);

$link = array(
          'href' => 'css/smallerscreen.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'only screen and (max-width: 1023px)'
);
echo "<!-- Make minor type adjustments for 1024 monitors -->";
echo link_tag($link);

$link = array(
          'href' => 'css/mobile.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'handheld, only screen and (max-width: 767px)'
);
echo "<!-- Resets grid for mobile -->";
echo link_tag($link);

$link = array(
          'href' => 'css/layout.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'screen'
);
echo "<!-- Put your layout here -->";
echo link_tag($link);
$link = array(
          'href' => 'css/default.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'screen'
);
echo link_tag($link);
?>
</head>
<body>
<div class="container">
