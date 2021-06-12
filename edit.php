<?php 
include("db.php");

if (isset ($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM productos WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $codigo = $row['codigo'];
        $producto = $row['producto'];
        $compra = $row['compra'];
        $renta = $row['renta'];
        $venta = $row['venta'];
    }
}
if(isset ($_POST['actualizar'])){
        $id = $_GET['id'];
        $codigo = $_POST['codigo'];
        $producto = $_POST['producto'];
        $compra = $_POST['compra'];
        $renta = $_POST['renta'];
        $venta = $_POST['venta'];
        $query = "UPDATE productos SET codigo = '$codigo', producto = '$producto', compra = '$compra', renta = '$renta', venta = '$venta' WHERE id = $id";
        $result = mysqli_query($conn, $query);
        header("Location: index.php");
        $_SESSION['message'] = 'Se actualizo el producto';
        $_SESSION['message_type'] = 'success';  
    }


?>
<?php require("includes/header.php") ?>
<div class="container">
<div class="container p-5">
<div class="row">
<div class="col-md-4 mx-auto">
<div class="card card-body">
<div class="title mx-auto">
<h5>Editar Producto</h5>
</div>
                <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="mb-3">
                        <input type="text" name="codigo" class="form-control" placeholder="Codigo" value="<?php echo $codigo ?>">
                    </div>
                    <div class="mb-3 form-group">
                        <input type="text" name="producto" class="form-control" placeholder="Producto" value="<?php echo $producto ?>">
                    </div>
                    <div class="mb-3 form-group">
                        <input type="number" name="compra" class="form-control" placeholder="PC" value="<?php echo $compra ?>">
                    </div>
                    <div class="mb-3 form-group">
                        <input type="number" name="renta" class="form-control" placeholder="R%" value="<?php echo $renta ?>">
                    </div>
                    <div class="mb-3 form-group">
                        <input type="number" name="venta" class="form-control" placeholder="PV" value="<?php echo $venta ?>">
                    </div>
                    <div class="d-grid gap-2 form-group">
                    <input type="submit" name="actualizar" value="Actualizar" class="btn btn-success" >
                    </div>
                </form>
                </div>
</div>
</div>
</div>
</div>
<?php require("includes/footer.php") ?>
