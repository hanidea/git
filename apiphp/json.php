<?php
require_once('./response.php');
$arr = array(
    'id'=>1,
    'name'=>'James'
);
Response::json(200,'数据返回成功',$arr);