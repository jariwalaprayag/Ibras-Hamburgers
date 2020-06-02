<?php
	session_start();
	if(isset($_SESSION['userid']))
	{
		unset($_SESSION['userid']);
		header("location:Inicio.php?hmsg=You have successfully logged out");
	}
	else
	{
		header("location:Inicio.php?hmsg=You are not logged in");
	}
?>