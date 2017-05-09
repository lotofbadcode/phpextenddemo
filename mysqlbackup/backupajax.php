<?php

include dirname(__FILE__) . '/../vendor/autoload.php';

use lotofbadcode\phpextend\databackup\mysql\Backup;

//自行判断文件夹
$backupdir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'backup';

if (!is_dir($backupdir))
{
    mkdir($backupdir, 0777, true);
}
$backup = new Backup('127.0.0.1:3306', 'test', 'root', '');
$result = $backup->setbackdir($backupdir)
        ->setvolsize(0.2)
        ->ajaxbackup();

echo json_encode($result);
