<?php
die;
require '../vendor/autoload.php';

use Http\Adapter\Guzzle6\Client;
use Mailgun\Mailgun;

$client = new Client();
$mailgun = new Mailgun('', $client);

$domain = "kitbs.com";

# Make the call to the client.
$result = $mailgun->sendMessage($domain, array(
    'from'    => 'Sphere <sphere@sphere.kitbs.com>',
    'to'      => 'Kit Senior <kit.senior@gmail.com>',
    'subject' => 'Hello',
    'text'    => 'Testing some more Mailgun awesomness!'
));