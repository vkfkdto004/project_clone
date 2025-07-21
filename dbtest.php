<?php

// db연결
include 'inc/dbconfig.php';


include 'inc/member.php';
$id = 'gildong';
$mem = new Member($db);
$email = 'hong@gilq.dong';

// 아이디 중복 테스트
// if ($mem->id_exist($id)) {
//     echo "아이디가 중복됩니다.";
// } else {
//     echo "사용 가능한 아이디 입니다.";
//}

// 이메일 중복 테스트
if ($mem->email_exist($email)) {
    echo "이메일이 중복됩니다.";
} else {
    echo "사용 가능한 이메일 입니다.";
}