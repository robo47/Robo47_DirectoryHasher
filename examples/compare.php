<?php

$time = microtime(true);

require_once dirname(__FILE__) . '/../src/Robo47/DirectoryHasher/Autoloader.php';
Robo47_DirectoryHasher_Autoloader::register();

$oldResultFile = realpath(dirname(__FILE__) . '/data/') . '/old.xml';
$newResultFile = realpath(dirname(__FILE__) . '/data/') . '/new.xml';

$factory = new Robo47_DirectoryHasher_Result_Factory_Xml();

$old = $factory->buildResultFromFile($oldResultFile);

$new = $factory->buildResultFromFile($newResultFile);

echo 'DirectoryHasher' . PHP_EOL;

$comparator = new Robo47_DirectoryHasher_Comparator();

echo PHP_EOL . 'Comparing results' . PHP_EOL;

$result = $comparator->compare($old, $new);

$differences = $result->getDifferences();
$i = 1;

echo PHP_EOL . 'Found ' . count($differences) . ' differences' . PHP_EOL . PHP_EOL;

foreach($differences as $difference) {
    
    /* @var $difference Robo47_DirectoryHasher_Comparator_Difference_Interface */
    echo $i . ')' . PHP_EOL;
    echo $difference->toString() . PHP_EOL . PHP_EOL;
    $i++;
}

$runtime = number_format((microtime(true) - $time), 4);
$memory = number_format(memory_get_peak_usage(true) / (1024 * 1024), 2);

echo PHP_EOL . 'Time: ' . $runtime . ' seconds';
echo ', Memory: ' . $memory . 'Mb' . PHP_EOL;