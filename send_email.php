<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $to = "2enjoybreaktime@gmail.com"; // 받는 이메일 주소를 여기에 입력하세요.
    $subject = "문의하기 폼: $name";
    $headers = "From: $email";
    mail($to, $subject, $message, $headers);
}
?>