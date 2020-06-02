<?php
  session_start();
  if(isset($_SESSION['userid'])){
    header("localhost:Inicio.php?msg=Please login first");
  }
?>
<?php
if(!isset($_SESSION['userid'])){
	echo '<script type="text/javascript">'; 
	echo 'alert("Please Login first");'; 
	echo 'window.location.href = "Contacto.php";';
	echo '</script>';
}
?>
<?php

	if(isset($_POST['name']) && isset($_POST['e-mail']) && isset($_POST['subject']) && isset($_POST['Msg']))
	{
		$n=$_POST['name'];
		$e=$_POST['e-mail'];
		$s=$_POST['subject'];
		$m=$_POST['Msg'];
			try
			{
				$dbhandler=new PDO('mysql:host=localhost; dbname=ibras', 'root', '');
				$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
				$sql="INSERT INTO reviews (c_name, email, subject, comments) VALUES ('$n', '$e','$s', '$m')";
				$t=$dbhandler->exec($sql);
					/*$_SESSION["userid"]=$u;
					$_SESSION["role"]=$t['role'];
					header("location:Inicio.php?hmsg=Registration successful");*/
					echo '<script type="text/javascript">'; 
							echo 'alert("Thank you for review.");'; 
							echo 'window.location.href = "Contacto.php";';
							echo '</script>';
			}
			catch(PDOException $excp)
			{
				echo $excp->getMessage();
				die();
			}
		}
?>