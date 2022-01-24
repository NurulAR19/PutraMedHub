<?php

require __DIR__.'/vendor/autoload.php';


use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Google\Cloud\Core\Timestamp;
use Kreait\Firebase\Storage;

// ....

$stamp = new Timestamp(new DateTime());

$factory = (new Factory)
    ->withServiceAccount('putramedhub-firebase-adminsdk-kyr4f-4793677032.json')
    ->withDatabaseUri('https://putramedhub-default-rtdb.asia-southeast1.firebasedatabase.app/');
  

$database = $factory->createDatabase();
$auth = $factory->createAuth();
$storage = $factory->createStorage();

?>
