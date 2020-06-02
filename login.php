<?php
   // echo "hello";
	$dbhandler=new PDO('mysql:host=localhost; dbname=ibras', 'root', '');
	
	$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	if(isset($_POST['userid']) && isset($_POST['pwd']))
	{
	   // echo " 123";
		$u=$_POST['userid'];
		$p=$_POST['pwd'];
	}
	$sql="select * from users where user_name='$u' and password='$p'";
	$q=$dbhandler->query($sql);
	$r=$q->fetch();

	if($r['user_name']==$u && $r['password']==$p)
	 {
		session_start();
		$_SESSION["userid"]=$u;
		$_SESSION["role"]=$r['role'];
		header("location:Inicio.php");
	 }
	else
	 {
		echo '<script type="text/javascript">'; 
		echo 'alert("Invalid Login");'; 
		echo 'window.location.href = "Inicio.php#modal";';
		echo '</script>';
	 }
?>