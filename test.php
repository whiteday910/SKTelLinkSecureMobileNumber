<?php
require_once "./secmobnumber.php"
?>


<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>SK텔링크 안심번호 API PHP 샘플</title>
</head>
<body>
<h1>SK텔링크 안심번호 API PHP 샘플</h1>

<h3>010-9999-8888 번호에 안심번호 할당</h3>
<h4>SECMOB01_getSecNumberWithOriginNumber("01099998888") 함수 호출 ------>  <?php  $numberSample = SECMOB01_getSecNumberWithOriginNumber("01099998888");   echo  $numberSample; ?></h4>

<br><br>

<h3>안심번호에 할당되었던 실제 착신번호 조회</h3>
<h4>SECMOB04_getRealNumberWithSecNumber(할당된 안심번호) 함수 호출 ------> <?php  echo SECMOB04_getRealNumberWithSecNumber($numberSample); ?></h4>


</body>
</html>