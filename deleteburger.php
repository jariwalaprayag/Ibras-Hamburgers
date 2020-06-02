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
	echo 'window.location.href = "Admin.php";';
	echo '</script>';
}
?>
<?php

	if(isset($_POST['burger']))
	{
		$name =$_POST['burger'];
		
		
			try
			{
				$conn=new PDO('mysql:host=localhost; dbname=ibras', 'root', '');
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
				$sql="DELETE FROM `hamburger` WHERE ham_name = '$name'";
				$conn->exec($sql);
					/*$_SESSION["userid"]=$u;
					$_SESSION["role"]=$t['role'];
					header("location:Inicio.php?hmsg=Registration successful");*/
					echo '<script type="text/javascript">'; 
							echo 'alert("Burger deleted.");'; 
							echo 'window.location.href = "admin_remove.php";';
							echo '</script>';
			}
			catch(PDOException $excp)
			{
				echo $excp->getMessage();
				die();
			}
		}
?>