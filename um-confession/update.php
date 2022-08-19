<?php

include 'backend/connect.php';
$id=$_GET['updateid'];
$sql="Select * from `loginregister` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$email=$row['email'];
$password=$row['password'];

if(isset($_POST['submit'])) {
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $passwordmd5=md5($_POST['password']);

    $sql="update `loginregister` set id='$id',firstname='$firstname',
    lastname='$lastname',email='$email',password='$passwordmd5'
    where id=$id";
    $result=mysqli_query($con,$sql);
    if($result) {
        //echo "Updated successfully";
        header('location:dashboard.php');
    } else {
        die(mysqli_error($con));
    }
}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <title>Crud oepration</title>

    </head>
    <body>
        <div class="container my-5">
            <form method="post">
                <div class="mb-3">
                    <label>First Name</label>
                    <input type="text" class="form-control" placeholder="Enter your first name" name="firstname" autocomplete="off" value=<?php echo $firstname; ?>>
                </div>
                <div class="mb-3">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Enter your last name" name="lastname" autocomplete="off" value=<?php echo $lastname; ?>>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" value=<?php echo $email; ?>>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="text" class="form-control" placeholder="Enter your password" name="password" autocomplete="off" value="">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </form>            
        </div>
    </body> 
</html>