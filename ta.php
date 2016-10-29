<?php
$autoloader = require "./vendor/autoload.php";

$results = $autoloader->findFile("\\HPF\\Xee\\SDK");

print "Found file for class at: $results";
//exit(1);

#Other methods I ended up playing with were:

$autoloader->loadClass("\\HPF\\Xee\\SDK");

print_r($autoloader);
exit(2);
