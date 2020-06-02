<!DOCTYPE html>
<?php
  session_start();
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
  <div class="back2-image">
    <br><br><br><br><br><br><br><br>  
    <center>LAS MEJORES DE LA CIUDAD</center><br>
    <center><h1>Update Burger</h1></center>
    <br><br><br><br>
    <div class="zigzag-inverted"></div>
    <br>
    <div>
      <center>
        <br><br>
        <img src="proyecto3correct/Burguer.png" height="30px" width="30px">
        <h1>Update burger by Name</h1><br><br><br>
        <form action="updateburger.php" method="post">
          <div class="a1">
            <br>Enter the correct name of burger and then fill rest of the data the information of burger will be updated.<br><br><br>
            Image:<input type="file" name="file" accept="image/png, image/jpeg" required><br><br>
            Name:<input type="text" name="name" class="t1" required><br>
            Ingredients:<input type="text" name="ing" placeholder="  seperated by ','" class="t1" required><br>
            Calories:<input type="text" name="cal" placeholder="  Subject" class="t1" required><br>
            price:<input type="text" name="price" placeholder="  Subject" class="t1" required><br><br>
            <input type="submit" name="message" value="Update Burger" class="b2">
            <br><br><br><br><br>
          </div>
        </form>
      </center>
    </div>
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
</body>
</html> 