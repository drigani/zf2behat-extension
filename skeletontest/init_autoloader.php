<?php

$loader = require __DIR__.'/../../vendor/autoload.php';
$loader->add("Behat\\ModuleExample",__DIR__.'/../src');
$loader->add("FeatureContext","Features/");
?>
