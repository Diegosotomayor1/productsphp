<?php include('db.php') ?>

<?php include('includes/header.php') ?>
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Añadir Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="mb-3">
                        <input type="text" name="codigo" class="form-control" placeholder="Codigo">
                    </div>
                    <div class="mb-3 form-group">
                        <input type="text" name="producto" class="form-control" placeholder="Producto">
                    </div>
                    <div class="mb-3 form-group">
                        <input type="number" name="compra" class="form-control" placeholder="PC">
                    </div>
                    <div class="mb-3 form-group">
                        <input type="number" name="renta" class="form-control" placeholder="R%">
                    </div>
                    <div class="mb-3 form-group">
                        <input type="number" name="venta" class="form-control" placeholder="PV">
                    </div>
                    <div class="d-grid gap-2 form-group">
                    <input type="submit" name="anadir" value="Añadir" class="btn btn-success" >
                    </div>
                </form>
            </div>
        </div>

    </div>
  </div>
</div>


<div class="container p-4">
    <div class="row">
        <?php if (isset($_SESSION['message'])){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } session_unset()?>
        
        <div class="col-md-12">
        <a class="btn btn-success circle" sx|tyle="position:fixed; bottom:40px; right:40px; z-index:2" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><i class="fas fa-plus-circle"></i></a>

            <table class= "table ">
                <thead>
                <tr>
                    <th class="col">
                    Codigo
                    </th>
                    <th class="col">
                    Producto
                    </th>
                    <th class="col">
                    PC
                    </th>
                    <th class="col">
                    R%
                    </th>
                    <th class="col">
                    PV
                    </th>
                    <th class="col">
                    Action
                    </th>
                </tr>
                </thead>
                <tbody>
                
                <?php 
                $query = "SELECT * FROM productos";
                $result_product = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result_product)){ ?>
                    <tr>
                    <td>
                    <?php echo $row['codigo'] ?>
                    </td>
                    <td>
                    <?php echo $row['producto'] ?>
                    </td>
                    <td>
                    <?php echo $row['compra'] ?>
                    </td>
                    <td>
                    <?php echo $row['renta'] ?>
                    </td>
                    <td>
                    <?php echo $row['venta'] ?>
                    </td>
                    <td>
                    <a class="btn btn-primary edit_product" href="edit.php?id=<?php echo $row['id']  ?>"><i class="fas fa-pen-nib"></i></a>
                    <a  class="btn btn-danger   " href="delete-task.php?id=<?php echo $row['id']  ?>"><i class="far fa-trash-alt"></i></a>
                    </td>                       
                    </tr>
                <?php
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="assets/editar.js"></script>
<?php include('includes/footer.php') ?>