<?php
	session_start();
	if(!isset($_SESSION['userid']))
	{
		header("location:Inicio.php?msg=Please Login First");
	}
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="ciudad.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<title>Admin</title>
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
            <li><a href="Menu.php">MENU</a></li>
            <li><a href="http://paj9373.uta.cloud/">BLOG</a></li>
            <li><a href="Contacto.php">CONTACTO</a></li>
            <?php
                if(isset($_SESSION['userid'])){
                  $name = $_SESSION['userid'];
                  if(isset($_SESSION['role'])){
              $role=$_SESSION['role'];
              if($role=="admin"){
                echo"<li><a href='Admin.php'><font color='red'>ADMIN</font></a></li>";
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
	<div class="back1-image">
		<br><br><br><br><br><br><br><br>	
		<center>LAS MEJORES DE LA CIUDAD</center><br>
		<center><h1>Admin</h1></center>
		<br><br><br><br>
		<div class="zigzag-inverted"></div>
		<br><br>
		<center>
<h1>Popularidad Hamburgusa</h1><br>
		<div style="width: 100%;">
              <figure>
            	<form action="#modal2" method="post">
                <input type="hidden" name="burger_name" value="Mixta">
              		<img src="proyecto3correct/burguer1.png" height="150px" width="150px">
              		<figcaption>
              			<span>Mixta</span><br>
              			<span>$11.90</span>
              		</figcaption>
              		<input type="submit" value="más información" class="b3" name="info">
              </form>
              </figure>
              
              <figure>
              <form action="#modal2" method="post">
                <input type="hidden" name="burger_name" value="Polla">
                  <img src="proyecto3correct/burguer2.png" height="150px" width="150px">
                  <figcaption>
                    <span>Polla</span><br>
                    <span>$11.90</span>
                  </figcaption>
                  <input type="submit" value="más información" class="b3" name="info">
              </form>
              </figure>

              <figure>
              <form action="#modal2" method="post">
                <input type="hidden" name="burger_name" value="Carne">
                  <img src="proyecto3correct/burguer3.png" height="150px" width="150px">
                  <figcaption>
                    <span>Carne</span><br>
                    <span>$11.90</span>
                  </figcaption>
                  <input type="submit" value="más información" class="b3" name="info">
              </form>
              </figure>

            </div>
            <br><br>

	<input type="submit" name="menu" onclick="window.location.href='admin_add.php'" value="Add Burger" class="b1">
	
	&emsp;&emsp;
	<input type="submit" name="menu" onclick="window.location.href='admin_edit.php'" value="Update Burger" class="b2">
	
	&emsp;&emsp;
	<input type="submit" name="menu" onclick="window.location.href='admin_remove.php'" value="Delete Burger" class="b1">
</center>
<br><br><br>
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
</div>

<div class="modal2" id="modal2">
    <div class="modal2__content">
      <a href="#" class="modal2__close" style="visibility: visible; color: black;">X</a>
      <h3 class="modal2__heading"><img src="proyecto3correct/Burguer.png" height="30px" width="30px">&emsp;Más información</h3>
      <hr>
      <br>
      <?php
            $name=$_POST['burger_name'];
            $dbhandler=new PDO('mysql:host=localhost; dbname=ibras', 'root', '');
            $dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="select * from hamburger where ham_name='$name'";
            $q=$dbhandler->query($sql);
            $r=$q->fetch();
            $ham_name=$r['ham_name'];
            $ing=$r['ingredients'];
            $cal=$r['calories'];
            echo "<div align='left'>
              <b>Burger Type:</b> ".$ham_name."
              <br><br>
              <b>Calories:</b> ".$cal."
              <br><br>
              <b>Ingredients:</b> ".$ing."
          </div>";
      ?>
    </div>
 </div>
</body>
</html>