<?php 
include("db.php");
$index = "index.php";

if (isset ($_POST['anadir'])){
    $codigo = $_POST['codigo'];
    $producto = $_POST['producto'];
    $compra = $_POST['compra'];
    $renta = $_POST['renta'];
    $venta = $_POST['venta'];
    $query = "INSERT INTO productos(codigo, producto, compra, renta, venta) VALUES ('$codigo', '$producto', '$compra', '$renta','$venta')";
    $result = mysqli_query($conn, $query);
    if (!$result){
        die("query failed");
    }
    $_SESSION['message'] = 'Se guardo el producto';
    $_SESSION['message_type'] = 'success';  
}
else{
    $_SESSION['message'] = ' Nooo   Se guardo el producto';
    $_SESSION['message_type'] = 'success';  
}
    header('Location: index.php');
    exit;

?>