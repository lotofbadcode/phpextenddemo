<?php
set_time_limit(0);
include dirname(__FILE__) . '/../vendor/autoload.php';

use lotofbadcode\phpextend\databackup\mysql\Recovery;

$recovery = new Recovery('127.0.0.1:3306', 'test', 'root', '');
$recovery->setSqlfiledir(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'backup');


do
{
    $result = $recovery->recovery();
    echo str_repeat(' ', 1000); //这里会把浏览器缓存装满
    ob_flush(); //把php缓存写入apahce缓存
    flush(); //把apahce缓存写入浏览器缓存
    if ($result['totalpercentage'] > 0)
    {
        echo '完成' . $result['totalpercentage'] . '%<br />';
    }
} while ($result['totalpercentage'] < 100);
