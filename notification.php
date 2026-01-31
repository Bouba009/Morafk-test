<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // تأكد من تثبيت مكتبة PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST['email'];
    $user_name = $_POST['name'];

    $email_subject = "مرحبًا بك في منصة Morafik 🎉";
    $email_body = "
    <div dir='rtl' style='text-align: right; font-family: sans-serif;'>
        <h2>مرحبًا بك في منصة Morafik 👋</h2>
        <p>يسعدنا انضمامك إلينا، ونتمنى لك تجربة مميزة ومثمرة.</p>
        <p>تم إنشاء حسابك بنجاح ✅، ويمكنك الآن الاستفادة من جميع خدمات وميزات المنصة بكل سهولة.</p>
        <p>إذا احتجت إلى أي مساعدة أو كان لديك أي استفسار، فريق Morafik جاهز لدعمك في أي وقت.</p>
        <br>
        <p>نتمنى لك رحلة موفّقة معنا 🌟</p>
    </div>
    ";

    try {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host       = 'mail.privateemail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'contact@morafik.online';
        $mail->Password   = 'abobob123';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('contact@morafik.online', 'Morafik');
        $mail->addAddress($user_email, $user_name);

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $email_subject;
        $mail->Body    = $email_body;

        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
