<?php

// phpinfo();

// $redis= new Redis();
// $redis->pconnect('127.0.0.17',6379);
// if($redis){
//     echo "123";
// }

$file=file_get_contents("user.xls");
$data1=explode("\n",$file);

foreach($data1 as $key => $value){
    $a[]=explode("\t",$value);
    unset($a[0]);
}

// var_dump($a);die;

$link=mysqli_connect('127.0.0.1','root','root','1704');

foreach($a as $k => $v){
    @$sql= "insert into `user` values(null,'$v[1]','$v[2]','$v[3]')";
    @$arr=mysqli_query($link,$sql);
}







// $link=mysqli_connect('127.0.0.1','root','root','1704');
// $sql= "select * from `user`";
// $arr=mysqli_query($link,$sql);

// while($res=mysqli_fetch_assoc($arr)){
//     $data[]=$res;
// }

// $str='';
// $str="ID\t用户名\t密码\tVIP用户\n";
// foreach($data as $k => $v){
//     $str.=implode("\t",$v)."\n";
// }

// header('Content-type: application/vnd.ms-excel');

// // It will be called downloaded.pdf
// header('Content-Disposition: attachment; filename="user.xls"');

// echo $str;