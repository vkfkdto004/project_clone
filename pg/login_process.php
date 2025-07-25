<?php

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$pw = (isset($_POST['pw']) && $_POST['pw'] != '') ? $_POST['pw'] : '';

if($id == '') {
    $arr = ['result' => 'empty_id'];
    die(json_encode($arr)); // { "result" : "empty_id" }
}

if($pw == '') {
    $arr = ['result' => 'empty_pw'];
    die(json_encode($arr)); // { "result" : "empty_ow" }
}

include '../inc/dbconfig.php';
include '../inc/member.php';

$mem = new Member($db);

if($mem->login($id, $pw)) {
    $arr = ['result' => 'login_success'];
    // 로그인 상태로 전환하는 세션 생성
    session_start();
    $_SESSION['ses_id'] = $id;
    
} else {
    $arr = ['result' => 'login_fail'];
}
die(json_encode($arr));