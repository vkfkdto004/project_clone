<?php

$email = 'aaa@naver.com';
$rs = filter_var($email, FILTER_VALIDATE_EMAIL); // 입력값이 이메일 형식이 아니면 false 리턴, 이메일 형식이면 이메일 리턴

echo var_dump($rs);