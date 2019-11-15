<?php

include dirname(__FILE__) . '/../vendor/autoload.php';

use lotofbadcode\phpextend\databackup\BackupFactory;

//自行判断文件夹
$backupdir = '';
if (isset($_POST['backdir']) && $_POST['backdir'] != '') {
    $backupdir = $_POST['backdir'];
} else {
    $backupdir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'backup' . DIRECTORY_SEPARATOR . date('Ymdhis');
}

if (!is_dir($backupdir)) {
    mkdir($backupdir, 0777, true);
}
//$backup = new Backup('127.0.0.1:3306', 'test', 'root', '');
$backup = BackupFactory::instance('mysql', '127.0.0.1:3306', 'qjfsonar', 'root', 'root');
$result = $backup->setbackdir($backupdir)
    ->setvolsize(0.2)
    ->ajaxbackup($_POST);

echo json_encode($result);
