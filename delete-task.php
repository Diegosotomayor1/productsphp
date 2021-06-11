<?php 
    include("db.php");
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM productos WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("Query failed");
        }
        $_SESSION['message'] = "Se elimino el producto";
        header("Location: index.php");
        

    }
?>