<!-- this is a delete page (need to be modified) -->

<?php
include 'connect.php';

if(isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];

    $sql="delete from `crud` where id=$id";
    $result=mysqli_query($con,$sql);
    if($result) {
        //echo "Deleted successful";
        header('location:dashboard.php');
    } else {
        die(mysqli_error($con));
    }
}

?>