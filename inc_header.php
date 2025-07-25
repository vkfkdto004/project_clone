<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=(isset($g_title) && $g_title != '') ? $g_title : 'Kim` DevOps'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<?php
if(isset($js_array)) {
    foreach($js_array AS $var) {
    echo ' <script src="'.$var.'?v='.date('YmdHis').'"></script>'.PHP_EOL;
    }
}
?>
   
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-r border-bottom">
            <a href="/ci_project/index.php" class="d-flex align-items-cneter mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="images/logo.svg" style="width:2rem;" class="me-2">
                <span class="fs-4">Kim's Devops</span>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="index.php" class="nav-link<?= ($menu_code == '') ? ' active': ''; ?>">Home</a></li>
                <li class="nav-item"><a href="project.php" class="nav-link<?= ($menu_code == 'project') ? ' active': ''; ?>">프로젝트 소개</a></li>
                <li class="nav-item"><a href="board.php" class="nav-link<?= ($menu_code == 'board') ? ' active': ''; ?>">게시판</a></li>
                <li class="nav-item"><a href="stipulation.php" class="nav-link<?= ($menu_code == 'member') ? ' active': ''; ?>">회원가입</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link<?= ($menu_code == 'login') ? ' active': ''; ?>">로그인</a></li>
            </ul>
        </header>