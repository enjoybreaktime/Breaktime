<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 폼 데이터 가져오기
    $subject = isset($_POST["subject"]) ? filter_var($_POST["subject"], FILTER_SANITIZE_STRING) : "제목 없음";
    $email = isset($_POST["email"]) ? filter_var($_POST["email"], FILTER_SANITIZE_EMAIL) : "";
    $message = isset($_POST["message"]) ? filter_var($_POST["message"], FILTER_SANITIZE_STRING) : "";
    $to = "2enjoybreaktime@naver.com"; // 받는 이메일 주소
    
    // 메시지 본문 구성
    $email_content = "이메일: $email\n\n";
    $email_content .= "메시지:\n$message\n";
    
    // 추가 헤더
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    $subject = "문의하기 폼: $subject";

    // 이메일 보내기 시도
    $mail_sent = mail($to, $subject, $email_content, $headers);
    
    // 결과 확인 및 디버깅
    if ($mail_sent) {
        echo "<h2>이메일이 성공적으로 보내졌습니다.</h2>";
        echo "<p>3초 후 홈페이지로 이동합니다...</p>";
        echo "<script>setTimeout(function() { window.location.href = 'index.html'; }, 3000);</script>";
    } else {
        echo "<h2>이메일 전송에 실패했습니다.</h2>";
        echo "<p>다음 정보를 확인해 주세요:</p>";
        echo "<ul>";
        echo "<li>받는 사람: $to</li>";
        echo "<li>제목: $subject</li>";
        echo "<li>보낸 사람: $email</li>";
        echo "</ul>";
        echo "<p>서버 관리자에게 문의하시거나 직접 이메일을 보내주세요.</p>";
        echo "<p><a href='contact.html'>돌아가기</a></p>";
    }
} else {
    // POST 요청이 아닌 경우
    echo "<h2>잘못된 접근입니다.</h2>";
    echo "<p>폼을 통해 제출해 주세요.</p>";
    echo "<p><a href='contact.html'>돌아가기</a></p>";
}
?>