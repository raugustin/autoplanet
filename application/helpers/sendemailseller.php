<?php
// Send email to seller
// Usage: send_email_to_seller(database_car_query_results,Buyer_name,Buyer_email)
function send_email_to_seller($array,$Buyername,$Buyeremail,$Buyermessage) {
$to      = $array['Email'];
$subject = 'Enquiry for '.$array['Make'].' '.$array['Model'].' '.$array['BodyType'];
$message = 'Hi '.$array['Name'].",\r\n\r\n".
$Buyername." is interested in buying your car:\r\n\r\n".
$array['Make'].' '.$array['Model'].' '.$array['BodyType']."\r\n".
"Year:".$array['Year'].' | Colour: '.$array['Color'].' | Fuel:'.$array['Fuel']."\r\n\r\n".
"Please contact ".$Buyername." at: ".$Buyeremail."\r\n\r\n".
"Message of ".$Buyername.":\r\n".
$Buyermessage."\r\n\r\nYours Sincerely, \r\n\r\nwww.autoplanet.nl";
$headers = 'From: autoplanet@kangoos.demon.nl' . "\r\n" .
    'Reply-To: no-reply@kangoos.demon.' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$mail_from='autoplanet@kangoos.demon.nl';  
// Send email to seller 
mail($to, $subject, $message, $headers, '-f'.$mail_from);
}
?>
