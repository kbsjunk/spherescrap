<?php

require '../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$f = 'api.tsv';

$fh = fopen($f, 'r');

$stack = [];

header('Content-Type: text/plain');

while ($line = fgetcsv($fh, 0, "\t")) {
    if (implode('', $line) != '') {
        if ($line[0]) {
            $section = $line[0];
        }
        elseif ($line[2]) {
            $url = '/'.str_replace('/', './', $line[2]);
            array_set($stack, $url.'.'.strtolower($line[1]).'.displayName', $line[3]);
        }
    }
}

echo Yaml::dump($stack, 20, 2);
