<?php
set_time_limit(0);
include dirname(__FILE__) . '/../vendor/autoload.php';

use lotofbadcode\phpextend\databackup\mysql\Backup;

//自行判断文件夹
$backupdir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'backup';

if (!is_dir($backupdir))
{
    mkdir($backupdir, 0777, true);
}
$backup = new Backup('127.0.0.1:3306', 'test', 'root', '');
$backup->setbackdir($backupdir)
        ->setvolsize(0.2);
do
{
    $result = $backup->backup();
    echo str_repeat(' ', 1000); //这里会把浏览器缓存装满
    ob_flush(); //把php缓存写入apahce缓存
    flush(); //把apahce缓存写入浏览器缓存
    if ($result['totalpercentage'] > 0)
    {
        echo '完成' . $result['totalpercentage'] . '%<br />';
    }
} while ($result['totalpercentage'] < 100);
