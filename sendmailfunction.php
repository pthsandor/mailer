<?php
function smtp_mailer($subject,$bodymsg,$id){
    $to = "ide@akaromkuldeni.hu";
    $mail = new PHPMailer(true);
    try {
    $mail->isSMTP();                                           
    $mail->Host       = 'mail.weboldal.hu';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'info@mweboldal.hu';                     
    $mail->Password   = 'erosjelszo';                              
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         
    $mail->Port       = 465;                                     
    //Recipients
    $mail->setFrom("info@weboldal.hu");
    $mail->addAddress("poth.sandor92@gmail.com");
    $mail->addAddress("info@weboldal.hu");
    $mail->addAddress($to);
    $mail->addReplyTo("valami@valaszemail.com");

    $mail->isHTML(true);    // Set email format to HTML
    $mail->CharSet = 'utf-8';
    $mail->Subject = $subject. " - " . $to;
    $mail->Body= $bodymsg;
   
   
        
    $mail->send();
    
    set_message("Sikeres üzenetküldés - M{$id}");
    redirect("index.php");
    }catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
