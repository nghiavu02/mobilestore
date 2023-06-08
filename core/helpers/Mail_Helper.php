<?php

function sendMail($title, $content, $nTo, $mTo, $diachicc = '')
{
    require_once(BASE_PATH . '/core/helpers/class.smtp.php');
    require_once(BASE_PATH . '/core/helpers/class.phpmailer.php');
    $nFrom = 'MobileShop_Namhoang';
    $mFrom = 'hoangnamtb95@gmail.com';  //dia chi email cua ban 
    $mPass = 'Vietnamvodich1';       //mat khau email cua ban
    $mail             = new PHPMailer();
    $body             = $content;
    $mail->IsSMTP();
    $mail->CharSet   = "utf-8";
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->Username   = $mFrom;  // GMAIL username
    $mail->Password   = $mPass;               // GMAIL password
    $mail->SetFrom($mFrom, $nFrom);
    //chuyen chuoi thanh mang
    $ccmail = explode(',', $diachicc);
    $ccmail = array_filter($ccmail);
    if (!empty($ccmail)) {
        foreach ($ccmail as $k => $v) {
            $mail->AddCC($v);
        }
    }
    $mail->Subject    = $title;
    $mail->MsgHTML($body);
    $address = $mTo;
    $mail->AddAddress($address, $nTo);
    $mail->AddReplyTo('hoangnamtb95@gmail.com', 'MobileShop_Namhoang');
    if (!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}
