<?php

set_time_limit(0);
$filename=$_GET['appid'];
if(!file_exists($filename)){
    die("该文件不存在");
}

$fileinfo=pathinfo($filename);
$size=filesize($filename);
$size2=$size-1;

header('Content-Range:bytes 0-'.$size2.'/'.$size);
header('Content-Type:application/octet-stream');
header('Content-Type:mult');





// set_time_limit(0);
// $filename=$_GET['appid'];  //接受get请求,值为服务器上的文件
// if(!file_exists($filename)){   //如果文件不存在，则终止脚本
//     die('该文件不存在');        
// }
// $fileinfo=pathinfo($filename);      //分析请求的值
// $size=filesize($filename);  //计算文件的大小
// $size2=$size-1;

// header('Content-Range:bytes 0-' . $size2 . '/' . $size);  //返回内容范围，断点续传
// header('Content-Type:application/octet-stream');   //文件类型强制为二进制

// header('Content-Type:multipart/byteranges');            //多段传输
// header('Content-Length: ' . $size);         //文件的总大小

// header('Content-Disposition: attachment; filename=' . $fileinfo['basename']);

// flush();

// readfile($filename);
// exit(0);










