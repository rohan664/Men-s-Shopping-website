<?php

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $code = $_POST['code'];
    $size = $_POST['size'];
    $address = $_POST['address'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "powerlookorder01@gmail.com";
    $mail->Password = "Powerlook01";
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mail->isHTML(true);
    $mail->setFrom($email,$name);
    $mail->addAddress("powerlookorder01@gmail.com");
    $mail->Subject = ("$email");
    $mail->Body = '<h1>New Order is Arrived</h1>
                  product code :"'.$code.'"<br> size :"'.$size.'" <br> address : "'.$address.'"';


    if($mail->send()){
		
		
	}
	else 
	{
		$status = "failed";
		$response = "something is wrong : <br>" .$mail->ErrorInfo;
	}
	
	
} 
echo "
                <div style='width:100%;border:1px solid black;background-color:whitesmoke'>
                  <h2 style='text-align:center'>Your Order is Comfirmed.</h2>
                  <h4 style='text-align:center;color:red'>Check Mail For Order Update</h4>
                  <h3 style='text-align:center'>Thank You !!!!</h3>
                  <p> NOTE : email-powerlookorder01@gmail.com and password-Powerlook01 you can check email for verify</p>
                </div>
                ";
?>