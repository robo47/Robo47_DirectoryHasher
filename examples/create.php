<?php

$time = microtime(true);

require_once dirname(__FILE__) . '/../src/Robo47/DirectoryHasher/Autoloader.php';
Robo47_DirectoryHasher_Autoloader::register();

$pathtohash = realpath(dirname(__FILE__) . '/../') . '/src/';
$outputfile = realpath(dirname(__FILE__) . '/../') . '/result.xml';

$writer = new Robo47_DirectoryHasher_Writer_File_Xml();
$source = new Robo47_DirectoryHasher_Source_Directory($pathtohash);
$hasher = new Robo47_DirectoryHasher_Hasher_Multi(
                array(
                    new Robo47_DirectoryHasher_Hasher_MD5(),
                    new Robo47_DirectoryHasher_Hasher_SHA1(),
                    new Robo47_DirectoryHasher_Hasher_FileData()
                )
);

echo 'DirectoryHasher' . PHP_EOL;

$hasher = new Robo47_DirectoryHasher($source, $hasher);

echo PHP_EOL . 'Creating hashs for Directory: ' . $pathtohash . PHP_EOL;

$hasher->run();

echo PHP_EOL . 'Writing result to: ' . $outputfile . PHP_EOL;

$writer->write($hasher->getResult(), $outputfile);

$runtime = number_format((microtime(true) - $time), 4);
$memory = number_format(memory_get_peak_usage(true) / (1024 * 1024), 2);

echo PHP_EOL . 'Time: ' . $runtime . ' seconds';
echo ', Memory: ' . $memory . 'Mb' . PHP_EOL;