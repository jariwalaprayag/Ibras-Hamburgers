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

	if(isset($_POST['file']) && isset($_POST['name']) && isset($_POST['ing']) && isset($_POST['cal']) && isset($_POST['price']))
	{
		$n=$_POST['file'];
		$e=$_POST['name'];
		$s=$_POST['ing'];
		$m=$_POST['cal'];
		$p=$_POST['price'];
			try
			{
				$dbhandler=new PDO('mysql:host=localhost; dbname=ibras', 'root', '');
				$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
				$sql="INSERT INTO hamburger (ham_image, ham_name, ingredients, calories, price) VALUES ('proyecto3correct/$n', '$e','$s', '$m', '$p')";
				$t=$dbhandler->exec($sql);
					/*$_SESSION["userid"]=$u;
					$_SESSION["role"]=$t['role'];
					header("location:Inicio.php?hmsg=Registration successful");*/
					echo '<script type="text/javascript">'; 
							echo 'alert("Burger Added.");'; 
							echo 'window.location.href = "admin_add.php";';
							echo '</script>';
			}
			catch(PDOException $excp)
			{
				echo $excp->getMessage();
				die();
			}
		}
?>