<?php

if (isset($_POST['submit'])) {



$phone = $_POST ['phone'];

$goods= $_POST['goods'];

// $total = $_POST['total'];




if ( !empty($goods)){

	#if (preg_match("/^[_\.0-9a-zA-z-]+@([0-9a-zA-z-][0-9a-zA-z-]+\.)+[0-9a-zA-z](2,6)$/i",$email)){


		if (is_numeric($phone)){


			if((strlen($phone) == 10)){

	
	$con= mysqli_connect("localhost", "root", "") or die ("we couldnt connect!");

    mysqli_select_db($con, "mulofresh");
    	
	



		

mysqli_query ($con, "INSERT INTO goods (phone, goods) values ('$phone', '$goods')");

$registered = mysqli_affected_rows($con);


mysqli_close($con);


?>
<script>
		alert("Thank you! Now give us your location");
		window.location.assign("userSignup.html");
	</script>


<?php
}else{?>
	<script>
		alert("Sorry! The phone number <?php echo $phone ?> is too short or too long");
		window.location.assign("landing.php");
	</script>

<?php

}


  

}else{ 

	?>

    <script>
		alert("Sorry! The phone  number you entered <?php echo $id ?> is not a number");
		window.location.assign("landing.php");
	</script>
	

 <?php }
}else{ ?>

	<script>
		alert("Sorry! your cart was empty");
		window.location.assign("landing.php");
	</script>

<?php

}
}else{?>

<script>
		alert("Sorry! An error ocuured");
		window.location.assign("landing.php");
	</script>

<?php
}
?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>