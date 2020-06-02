<!DOCTYPE html>
<?php
  session_start();
  $m = $_SESSION['userid'];
  //echo $m;
  if(isset($_SESSION['userid'])){
    header("localhost:Inicio.php?msg=Please login first");
  }
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="ciudad.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<title>Inicio</title>
  <script type="text/javascript">
    function checkForm()                
{
  var name = document.getElementById('userid');              
    var email = document.getElementById('mail');    
    var password = document.getElementById('pwd');  
    var address = document.getElementById('address');  
    var repassword = document.getElementById('repwd');  
const form = document.getElementById('RegForm')  
form.addEventListener('submit', (e) => {
  let msg = []
 
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
  if (!name.value.match(re))                
  {
    alert("Error: Username must contain only letters, numbers and underscores!");
    name.focus();
    return false;
  }
  var emailtype = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(!(String((email.value.match(emailtype)).toLowerCase()))) {
    window.alert("Please enter a valid e-mail address.");
    email.focus();
    return false;
  }    
  var pwdtype =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    if(!pwd1.value.match(pwdtype)){
    window.alert("Please enter correct password");
    pw1.focus();
    return false;
  }
    if(!(pwd1.value == pwd2.value)) {
    alert("The passwords do not match!");
    pwd2.focus();
    return false;
  }
  if (msg.length > 0)
  {
    e.preventDefault()
  }
})
  return true;
}
  </script>

</head>
<body bgcolor="black" text="white">
	<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo"><img src="proyecto3correct/5.png" height="60px" width="120px">&emsp;&emsp;</label>
      <ul>
              <li><a href="Inicio.php"><font color="red">INICIO</font></a></li>
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

	<div class="back4-image">
		<br><br><br><br><br><br><br><br>	
		<center>LAS MEJORES DE LA CIUDAD</center><br>
		<center><h1>Hamburguesa</h1></center><br>
		<center><input type="submit" name="menu" onclick="window.location.href='Menu.php'" value="VER MENU HOY" class="b1"></center>
		<br><br><br>
		<div class="zigzag-inverted"></div>
		<br>
		<center>
		<div style="width: 95%;" class="w1">
            
                <table align="center">
                    <tr>
                        <img src="proyecto3correct/Burguer.png" height="30px" width="30px"><br>
                        <h1>Nuestra historia</h1>
                    </tr>
                    <tr>
                        <td><img src="proyecto3correct/story1.png" height="150px"></td>
                        <td>Los orígenes se remontan al 10 de junio de 1960, cuando Ibrahim Mata compraron la Hamburgueseria “Soy Yo” 
                            con una inversión inicial de 950 dólares. El local estaba situado en Lecheria, y la idea de Ibrahim era 
                            vender Hamburguesas a domicilio a las personas de las residencias cercanas. Aquella experiencia no 
                            marchaba como tenían previsto.</td>
                        <td>A pesar de todo, Ibrahim se mantuvo al frente del restaurante y tomó decisiones importantes para su futuro, 
                            como reducir la carta de productos y establecer un reparto a domicilio gratuito. Después de adquirir dos restaurantes 
                            más en Barcelona, en 1965 renombró sus tres locales como Ibra's Burger Grill.</td>
                        <td><img src="proyecto3correct/story2.png" height="150px"></td>
                    </tr>
                </table> 
                </div> 
                <br><br><br><br>
                <h1>Popularidad Hamburgusa</h1>
            
            <br><br>
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
            <br>
            <br>
            <br><br>
            </center>
            <center><h1>Explora nuestras hamburguesas más</h1></center><br><br>
            <center><input type="submit" value="VER MENU HOY" onclick="window.location.href='Menu.php'" name="menu" class="b1"></center>
            <br><br>
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

	<div class="modal" id="modal">
    <div class="modal__content">
      <a href="#" class="modal__close" style="visibility: visible; color: black;">X</a>
      <h3 class="modal__heading"><img src="proyecto3correct/Burguer.png" height="30px" width="30px">         Iniciar Sesion</h3>
      <hr>
      <div align="left">
      	<form action="login.php" method="post">
      &nbsp;&nbsp;Usuario:<br>
      <center><input type="text" name="userid" class="t3" required></center>
      &nbsp;&nbsp;Contrasena:<br>
      <center><input type="Password" name="pwd" class="t3" required></center>
      <div style="text-align: right; padding-right: 10px;">
      <br><hr><br>
      <input type="submit" name="login" value="Entrar" class="b1" align="Right">
      </div>
      </form>
 </div>
    </div>
 </div>

 <div class="modal1" id="modal1">
    <div class="modal1__content">
      <a href="#" class="modal1__close" style="visibility: visible; color: black;">X</a>
      <h2 class="modal1__heading"><img src="proyecto3correct/Burguer.png" height="20px" width="20px">         Registro de Usuario</h2><br>
      <hr>
      <div align="left">
      <form action="register.php" method="post">
      &nbsp;&nbsp;Nombre y apellido:<br>
      <center><input type="text" name="userid" class="t3" required></center>
      &nbsp;&nbsp;Correo:<br>
      <center><input type="email" name="mail" class="t3" required></center>
      &nbsp;&nbsp;Contrasena:<br>
      <center><input type="password" name="pwd" class="t3" required></center>
      &nbsp;&nbsp;Repetir Contrasena:<br>
      <center><input type="password" name="repwd" class="t3" required></center>
      &nbsp;&nbsp;Direccion:<br>
      <center><input type="text" name="address" class="t3" required></center>
      <br><hr><br>
      <div style="text-align: right; padding-right: 10px;">
      <input type="submit" name="register" value="Cargar" class="b1" align="Right">
      </div>
      </form>
 </div>
</div>
</div>
</body>
</html>