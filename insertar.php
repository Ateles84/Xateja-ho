<?php 
   

 if(isset($_POST['usuari']) && !empty($_POST['usuari']) &&
    isset($_POST['missatge']) && !empty($_POST['missatge'])) {

       include 'connexioBD.php';
        if (mysqli_connect_errno()) {
          print "Failed to connect to MySQL: ".mysqli_connect_error();
        } 


	$data = date("H:i:s"); 
	$usuari = mysqli_real_escape_string($con,$_POST['usuari']);
	$text = mysqli_real_escape_string($con,$_POST['missatge']);

        $sql = "INSERT INTO missatges (usuari,text,hora)
        VALUES ('$usuari','$text','$data')";

	if (mysqli_query($con, $sql)) {
		$missatge = "Tot correcte";
		ob_start(null, 100);
		header("Location:index.php?missatge=$missatge");
	} else {
   	 $error =  "Error: " . $sql . "<br>" . mysqli_error($con);
		ob_start(null, 100);
		header("Location:index.php?error=$error");
	}
	
    } else {
		$error = "Error, hi han camps buits";
		ob_start(null, 100);
		header("Location:index.php?error=$error");
    }
?>
