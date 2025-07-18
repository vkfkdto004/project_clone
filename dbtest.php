<?php

// db연결
include 'inc/dbconfig.php';

// 아이디 중복 테스트
include 'inc/member.php';
$id = 'gildong';
$mem = new Member($db);

if ( $mem->id_exist($id)) {
    echo "아이디가 중복됩니다.";
} else {
    echo "사용가능한 아이디 입니다.";
}