<?php
  session_start();
  if(isset($_SESSION['userid'])){
    header("localhost:Inicio.php?msg=Please login first");
  }
?>
<?php
if(isset($_SESSION['userid'])){
	$name = $_SESSION['userid'];
}
if(isset($_POST['name'])){
	$ham_name=$_POST['name'];
}
if(isset($_POST['Qty'])){
	$Qty=$_POST['Qty'];
}

$dbhandler=new PDO('mysql:host=localhost; dbname=ibras', 'root', '');
$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="select * from hamburger where ham_name='$ham_name'";
$q=$dbhandler->query($sql);
$r=$q->fetch();
$price=$r['price'];
$sql="select * from users where user_name='$name'";
$q=$dbhandler->query($sql);
$r=$q->fetch();
$address=$r['address'];
$sql="INSERT INTO orders (user_name, delivery_address, item_name, amount, Qty) VALUES ('$name', '$address','$ham_name', '$price', '$Qty')";
$t=$dbhandler->exec($sql);
echo '<script type="text/javascript">'; 
echo 'alert("Order placed successfully");'; 
echo 'window.location.href = "Menu.php";';
echo '</script>';
?>
