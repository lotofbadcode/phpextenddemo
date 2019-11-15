<?php

include dirname(__FILE__) . '/../vendor/autoload.php';

use lotofbadcode\phpextend\databackup\RecoveryFactory;

$recovery = RecoveryFactory::instance('mysql', '127.0.0.1:3306', 'qjfsonar', 'root', 'root');

$result = $recovery->setSqlfiledir(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'backup'.DIRECTORY_SEPARATOR.'20191115105031')
        ->ajaxrecovery($_POST);

echo json_encode($result);
