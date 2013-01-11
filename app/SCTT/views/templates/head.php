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
          'href' => 'css/grid/1140.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'screen'
);
echo link_tag($link);
echo
"\n<!--[if lte IE 7]>
<link rel=\"stylesheet\" href=\"css/grid/ie.css\" type=\"text/css\" media=\"screen\" />
<![endif]-->\n";

$link = array(
          'href' => 'css/grid/typeimg.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'screen'
);
echo "\n<!-- Type and image presets -->\n";
echo link_tag($link);

$link = array(
          'href' => 'css/grid/smallerscreen.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'only screen and (max-width: 1023px)'
);
echo "\n<!-- Make minor type adjustments for 1024 monitors -->\n";
echo link_tag($link);

$link = array(
          'href' => 'css/grid/mobile.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'handheld, only screen and (max-width: 767px)'
);
echo "\n<!-- Resets grid for mobile -->\n";
echo link_tag($link);

$link = array(
          'href' => 'css/grid/layout.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'screen'
);
echo "\n<!-- Put your layout here -->\n";
echo link_tag($link);

$link = array(
          'href' => 'css/default.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'screen'
);
echo link_tag($link) . "\n";

$link = array(
          'href' => 'css/nav.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'screen'
);
echo link_tag($link) . "\n";
?>
</head>
<body>
