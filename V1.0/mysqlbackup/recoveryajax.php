<?php

include dirname(__FILE__) . '/../vendor/autoload.php';

use lotofbadcode\phpextend\databackup\mysql\Recovery;

$recovery = new Recovery('127.0.0.1:3306', 'test', 'root', '');
$result = $recovery->setSqlfiledir(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'backup')
        ->ajaxrecovery();

echo json_encode($result);
