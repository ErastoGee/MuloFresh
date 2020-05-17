<?php

if (isset($_POST['submit'])) {



$name = $_POST ['name'];

$phone= $_POST['phone'];

$email = $_POST['email'];

$city = $_POST['city'];

$estate= $_POST['estate'];

$street = $_POST['street'];


if ($name && $phone && $email && $city && $estate && $street){

	#if (preg_match("/^[_\.0-9a-zA-z-]+@([0-9a-zA-z-][0-9a-zA-z-]+\.)+[0-9a-zA-z](2,6)$/i",$email)){


		if (is_numeric($phone)){


			if((strlen($phone) == 10)){

				$con= mysqli_connect("localhost", "root", "") or die ("we couldnt connect!");

				mysqli_select_db($con, "mulofresh");
				
				
				
				$rphone = mysqli_query (
					$con, "SELECT phone FROM goods WHERE phone = '$phone'");
				$checkphone = mysqli_num_rows ($rphone);

				if ($checkphone ==0){?>

				
					<script>
						alert("Sorry! The phone number <?php echo $phone ?> does not match the one you gave at the cart");
						window.location.assign("userSignup.html");
			</script>
				
				<?php
				}else{

					$goody = mysqli_query(
					$con,"SELECT * FROM goods WHERE phone = $phone");
					
					while ($row = mysqli_fetch_array($goody)){

						$mygoods= $row['goods'];
						$mytotal = $row['total'];

						echo $mytotal;
						
						
						$mygoods_ar = explode(',', $mygoods);

					

					$thegoods = count($mygoods_ar);

						$i =1;
					foreach($mygoods_ar as $value) {
						echo $i."&nbsp";
						print $value;
						echo "<br/>";
						$i = $i+1;

						// I;MkQBz6YCnG
					}

	

					

				
				require 'class.phpmailer.php';
				require 'class.smtp.php';
				require 'Exception.php';

				require "vendor/autoload.php";
				


				//PHPMailer Object
				$mail = new PHPMailer;

				$mail->IsSMTP();
			$mail->Host = "smtp.gmail.com";
			$mail->SMTPDebug = 2;
			$mail->port = 587;

			// optional
			// used only when SMTP requires authentication  
			$mail->SMTPAuth = true;
			$mail->Username = 'mulofresh@moosend.com';
			$mail->Password = 'a@xNFSt3tSkWrYC';

				//From email address and name
				$mail->From = "mulofresh@moosend.com";
				$mail->FromName = "Kioko";

				//To address and name
				$mail->addAddress("henrychoxx@gmail.com.com", "Wilson");
				// $mail->addAddress("gatheruwilson@gmail.com", "Wilson");

				// $mail->addAddress("recepient1@example.com"); //Recipient name is optional

				//Address to which recipient will reply
				$mail->addReplyTo("kiokomuinde022@gmail.com", "Reply");

				//CC and BCC
				$mail->addCC("cc@example.com");
				$mail->addBCC("bcc@example.com");

				//Send HTML or Plain Text email
				$mail->isHTML(true);

				$mail->Subject = "Subject Text";
				$mail->Body = "<i>Mail body in HTML</i>";
				$mail->AltBody = "This is the plain text version of the email content";

				if(!$mail->send()) 
				{
					echo "Mailer Error: " . $mail->ErrorInfo;
				} 
				else 
				{
					echo "Message has been sent successfully";

				}

				// $to = "henrychoxx@gmail.com";
				// $subject = "My subject";
				// $txt = "Hello world!";
				// $headers = "From: kiokomuinde022@gmail.com" . ">\r\n";
				// // "CC: somebodyelse@example.com";

				// $kt = mail($subject,$txt,$headers);

				// echo "kt";





					
					}
					

					
					

					
				

					





	
	
    	
	



		

mysqli_query ($con, "INSERT INTO users (
	name, phone, email, city, estate, street) values ('$name', '$phone', '$email', '$city', '$estate', '$street')");

$registered = mysqli_affected_rows($con);


mysqli_close($con);
// echo "You have been registered successfully";

// include "home.php";

// header("Refresh:3; url=userSignup.html");
					}


}else{?>
	<script>
		alert("Sorry! The phone number <?php echo $phone ?> is too short or too long");
		window.location.assign("userSignup.html");
	</script>
    <!-- echo "Sorry! The Id number ".$phone." is either too short or too long"; -->
    <!-- header("Refresh:10; url=userSignup.php");  -->

<?php

}


  

}else{ 

	?>

    <script>
		alert("Sorry! The phone  number you entered <?php echo $id ?> is not a number");
		// window.location.assign("userSignup.php");
	</script>
	

 <?php }
}else{ ?>

	<script>
		alert("Sorry! Please fill in all the feilds");
		// window.location.assign("userSignup.php");
	</script>

<?php

}
}?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>