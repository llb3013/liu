<?php
//1.接收前台传过来的值

$username=$_POST['username'];//文本框值
$file_name=$_POST['filename'];  //原始文件名
$file=$_FILES['file'];//使用files获取文件信息
$tmp_name=$file['tmp_name']; //临时文件名 包含路径和文件名
$blob_num=$_POST['blob_num'];//文件切片（大文件分割成小文件后的编号）
$total_blob_num=$_POST['total_blob_num'];//切片总数量
    
//2.将上传的文件移动到指定的位置
$uploadDir='upload';
$slice_file_name=$uploadDir.'/'.$file_name.'_'.$blob_num;
move_uploaded_file($tmp_name,$slice_file_name);

//3.合并所有切片
if($blob_num == $total_blob_num) {
    $blob = '';
    for($i=1;$i<=$total_blob_num;$i++){
        //获取并连接各切片文件数据
        $blob.=file_get_contents($uploadDir.'/'.$file_name.'_'.$i);

    }

    file_put_contents($uploadDir.'/'.$file_name,$blob);

}

//4.构造返回前台的数组
$data = array(
    'username' => $username,
    'filename' => $uploadDir.'/'.$file_name,
);

echo json_encode($data);



