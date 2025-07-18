<?php

$servername = 'localhost'; // DB서버 IP or Domain
$dbuser = 'root';
$dbpassword = '';
$dbname = 'customer_info';


try {
    $db = new PDO("mysql:host={$servername};dbname={$dbname}", $dbuser, $dbpassword); // db instance 생성
    // 환경 설정
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // preparestatment를 지원하지 않는 경우, 데이터베이스의 기능을 사용하도록 해줌 mysql은 기본적으로 preparestatement를 지원
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true); // 쿼리 버퍼링을 활성화 -> 같은 유형의 쿼리의 경우 속도 향상 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // PDO 객체가 에러를 처리하는 방식 설정

    //echo "DB 연결 성공!!";
} catch (PDOException $e) {
    echo $e->getMessage();
};
