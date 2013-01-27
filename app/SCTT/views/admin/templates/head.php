<?php
echo doctype('html5');
?>

<html lang="en">
<head>
<?php
echo meta('Content-type', 'text/html; charset=utf-8', 'equiv'); 
echo meta('description', 'TBA');
echo meta('robots', 'all');
echo meta('author', 'Infinia, FeliciousX');
?>
<title><?php echo $title?></title>

<?php

$link = array(
          'href' => 'css/admin.bootstrap.min.css',
          'rel' => 'stylesheet',
          'type' => 'text/css',
          'media' => 'screen'
);
echo link_tag($link) . "\n";

?>
</head>
<body>
