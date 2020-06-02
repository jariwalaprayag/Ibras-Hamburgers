<!DOCTYPE html>
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
	echo 'window.location.href = "Menu.php";';
	echo '</script>';
}
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="ciudad.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <title>Menu</title>
</head>
<body bgcolor="black" text="white">
  <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo"><img src="proyecto3correct/5.png" height="60px" width="120px">&emsp;&emsp;</label>
      <ul>
              <li><a href="Inicio.php">INICIO</a></li>
              <li><a href="Sobre_Nosotros.php">SOBRE_NOSOTROS</a></li>
              <li><a href="Menu.php"><font color="red">MENU</font></a></li>
              <li><a href="http://paj9373.uta.cloud/">BLOG</a></li>
              <li><a href="Contacto.php">CONTACTO</a></li>
              <?php
                if(isset($_SESSION['userid'])){
                  $name = $_SESSION['userid'];
                  if(isset($_SESSION['role'])){
              $role=$_SESSION['role'];
              if($role=="admin"){
                echo"<li><a href='Admin.php'>ADMIN</a></li>";
                echo "<li><a href='logout.php'>LOGOUT</a></li>";
              }
              else{
              	echo"<li><a href='order.php'>Orders &nbsp</a></li>";
                echo"<li><a href='logout.php'>LOGOUT &nbsp</a></li>";
                echo"<li><a href='Inicio.php'> &nbsp; Hello!! &nbsp;".$name."</a></li>";
              }
            }
                }
                else{
                  echo"<li><a href='#modal1' class='modal1-open'>REGISTRO</a></li>";
                  echo"<li><a href='#modal' class='modal-open'>INICIAR_SESSION</a></li>";
                }
              ?>
      </ul>
      <div class="zigzag-header"></div>
    </nav>
	    <div class="back2-image">
	    <br><br><br><br><br><br><br><br>  
	    <center>LAS MEJORES DE LA CIUDAD</center><br>
	    <center><h1>tus ordenes</h1></center><br>
	    <br><br><br>
	    <div class="zigzag-inverted"></div>
	    <br><br><br>
	    <?php
	    	if(isset($_SESSION['userid'])){
	    		$name=$_SESSION['userid'];
	    		$dbhandler=new PDO('mysql:host=localhost; dbname=ibras', 'root', '');
		        $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        $sql="select * from orders where user_name='$name'";
		        $q=$dbhandler->query($sql);
		        $flag=0;
	                  while($r=$q->fetch())
	                  {
	                  		$flag=$flag+1;
		        			$item_name=$r['item_name'];
					        $address=$r['delivery_address'];
					        $amount=$r['amount'];
					        $Qty=$r['Qty'];
					        
					        $sql1="select * from hamburger where ham_name='$item_name'";
					        $q1=$dbhandler->query($sql1);
					        $r1=$q1->fetch();
					        $image=$r1['ham_image'];


					        echo "<center>
					        <div class='p2'>
					        	<div>
					        	<img src=".$image." height='200px' width='200px'>
					        	</div>
					        	<div>
					        		<b><font size='15px'>".$item_name."</font></b>
				              		<br><br>
				              		<b>Price:			</b>".$amount."
				              		<br><br>
				              		<b>Quantity:			</b>".$Qty."
				              		<br><br>
					        	</div>
					        </div>
					        <hr>
					        <br><br>
					        </center>";
					    }
					$sql="select * from orders where user_name='$name'";
		        	$q=$dbhandler->query($sql);
					$r=$q->fetch();
					$address=$r['delivery_address'];
					echo "<br><center><b>Delivery Address:</b>    ".$address."
						<form action='final.php' method='post'>
						<br><br>
							<input type='submit' value='realizar pedido' name='order' class='b1'><br><br><br><br>
						</form></center>
					";

	    	}
	    ?>


	    <div class="backfooter-image">	
				<div class="zigzag"></div>
				<footer>
					<br><br>
		           <center><img src="proyecto3correct/5.png" height="180" width="250"></center> 
		            <center>
			            <h3>Habla a:</h3>
			            Av. Intercomunal, sector la Mora, calle 8
			            <h3>Telefono:</h3>
			            +58 251 261 00 01
			            <h3>Correo:</h3>
			            yourmail@gmail.com
			            <br/><br>
			            <div style="align-items: center; width: 20%;">
			            <a href="#" class="fa fa-pinterest"></a>
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-dribbble"></a>
						<a href="#" class="fa fa-linkedin"></a>
						<a href="#" class="fa fa-vimeo"></a>
			            <br/>
			        	</div>
			        	<br>
			            copyright &copy;2020 Todos los derechos reservados | Este sitio esta hecho con por DiazApp 
		        	</center>
				</footer>
			</div>
		</div>
</body>
</html>