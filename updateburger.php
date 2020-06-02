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
		

		$dbhandler=new PDO('mysql:host=localhost; dbname=ibras', 'root', '');
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql="select * from hamburger where ham_name='$e'";
		$q=$dbhandler->query($sql);
		$r=$q->fetch();
		if($r['ham_name']!=$e)
		{
			echo '<script type="text/javascript">'; 
			echo 'alert("No burger found.");'; 
			echo 'window.location.href = "admin_edit.php";';
			echo '</script>';
		}
		else
		{
			try
			{	
				$sql="UPDATE hamburger SET ham_image='proyecto3correct/$n', ham_name='$e', 
	ingredients='$s', calories='$m', price='$p' WHERE ham_name='$e'";
				$t=$dbhandler->exec($sql);
					/*$_SESSION["userid"]=$u;
					$_SESSION["role"]=$t['role'];
					header("location:Inicio.php?hmsg=Registration successful");*/
					echo '<script type="text/javascript">'; 
							echo 'alert("Burger updated.");'; 
							echo 'window.location.href = "admin_edit.php";';
							echo '</script>';
			}
			catch(PDOException $excp)
			{
				echo $excp->getMessage();
				die();
			}
		}	
	}
?>