<?php

	if(isset($_POST['userid']) && isset($_POST['mail']) && isset($_POST['pwd']) && isset($_POST['repwd']))
	{
		$u=$_POST['userid'];
		$p=$_POST['pwd'];
		$r=$_POST['repwd'];
		$e=$_POST['mail'];
		$a=$_POST['address'];
		$pwdtype = "$S*(?=S{8,})(?=S*[a-z])(?=S*[A-Z])(?=S*[d])(?=S*[W])S*$";
		$emaitype = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
	    if(!preg_match_all($emailtype, $e))
	    {
		    echo '<script type="text/javascript">'; 
			echo 'alert("Invaild Email");'; 
			echo 'window.location.href = "Inicio.php#modal1";';
			echo '</script>';
	  	}
	    if(!preg_match_all($pwdtype, $p))
	    {
		    echo '<script type="text/javascript">'; 
			echo 'alert("Enter correct password");'; 
			echo 'window.location.href = "Inicio.php#modal1";';
			echo '</script>';
	  	}
    	if ($p!=$r)
		{
			echo '<script type="text/javascript">'; 
			echo 'alert("Passwords do not match");'; 
			echo 'window.location.href = "Inicio.php#modal1";';
			echo '</script>';
		}
		else
		{
			try
			{
				$dbhandler=new PDO('mysql:host=paj9373.uta.cloud; dbname=paj9373_ibras', 'paj9373_jariwalaprayag', 'PrayagSql');
				$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sql="select user_name from users where user_name='$u'";
				$q=$dbhandler->query($sql);
				$m=$q->fetch();
				if($m['user_name']!=$u)
	 			{
					session_start();
					$sql="INSERT INTO users (user_name, email, password, role, address) VALUES ('$u', '$e','$p', 'normal', '$a')";
					$t=$dbhandler->exec($sql);


					mail($e, "Ibra's hamburgers", "Welcome to ibra's hamburgers.");

					/*$_SESSION["userid"]=$u;
					$_SESSION["role"]=$t['role'];
					header("location:Inicio.php?hmsg=Registration successful");*/
					$sql="select * from users where user_name='$u'";
					$q=$dbhandler->query($sql);
					$r=$q->fetch();
					
					if($r['user_name']==$u)
					 {
						session_start();
						$_SESSION["userid"]=$u;
						$_SESSION["role"]=$r['role'];
						header("location:Inicio.php");
					 }
	 			}
				else
	 			{
			 				echo '<script type="text/javascript">'; 
							echo 'alert("Username already taken");'; 
							echo 'window.location.href = "Inicio.php#modal1";';
							echo '</script>';	
	 			}
			}
			catch(PDOException $excp)
			{
				echo $excp->getMessage();
				die();
			}
		}
	}
	else
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("Fill all fields.");'; 
		echo 'window.location.href = "Inicio.php#modal1";';
		echo '</script>';	
	}
?>