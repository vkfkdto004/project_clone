<?php
include '../inc/dbconfig.php';
include '../inc/member.php'; // Member Class 정의된 파일

$mem        = new Member($db);
$id         = (isset($_POST['id'         ]) && $_POST['id'         ] != '' ) ? $_POST['id'         ] : ''; // post값이 없을떄 받으면 에러가 발생하기 때문에 디테일하게 처리
$name       = (isset($_POST['name'       ]) && $_POST['name'       ] != '' ) ? $_POST['name'       ] : '';
$email      = (isset($_POST['email'      ]) && $_POST['email'      ] != '' ) ? $_POST['email'      ] : '';
$password   = (isset($_POST['password'   ]) && $_POST['password'   ] != '' ) ? $_POST['password'   ] : '';
$zipcode    = (isset($_POST['zipcode'    ]) && $_POST['zipcode'    ] != '' ) ? $_POST['zipcode'    ] : '';
$addr       = (isset($_POST['addr'       ]) && $_POST['addr'       ] != '' ) ? $_POST['addr'       ] : '';
$addr_detail= (isset($_POST['addr_detail']) && $_POST['addr_detail'] != '' ) ? $_POST['addr_detail'] : '';
$mode       = (isset($_POST['mode'       ]) && $_POST['mode'       ] != '' ) ? $_POST['mode'       ] : '';

// 아이디 중복체크
if($mode == 'id_chk') {
    // 아이디가 입력이 되었는지 먼저 체크
    if($id == '') {
        die(json_encode(['result' => 'empty_id']));
    }
    if($mem->id_exist($id)) {
        //echo 를 사용해서 넘기기도 하지만 보통은 JSON으로 받아서 판단하는 구조로 사용
        //$arr = ['result' => 'fail']; 
        //$json = json_encode($arr); // 배열 -> JSON 타입으로 인코딩
        //die($json); // == echo $json; exit;
        // 위 코드 간소화 후
        die(json_encode(['result' => 'fail']));
    } else {
        die(json_encode(['result' => 'success']));
    }
// 이메일 중복체크
} else if($mode == 'email_chk') {
    // 이메일이 입력되었는지 먼저 체크
    if($email == '') {
        die(json_encode(['result' => 'empty_email']));
    }
    if($mem->email_exist($email)) {
        die(json_encode(['result' => 'fail']));
    } else {
        die(json_encode(['result' => 'success']));
    }
} else if ($mode == 'input') {
    // 프로필 이미지 처리
    $a = explode('.', $_FILES['photo']['name']);
    $ext = end($a);
    $photo = $id .'.'. $ext;
    
    copy($_FILES['photo']['tmp_name'], "data/profile/". $photo);


    $arr = [
        'id' => $id,
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'zipcode' => $zipcode,
        'addr' => $addr,
        'addr_detail' => $addr_detail,
        'photo' => $photo
    ];
    $mem->input($arr);


}

