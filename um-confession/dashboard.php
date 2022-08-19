<?php
include 'backend/connect.php';

require 'backend/function.php';

$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
}
else{
  header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/css/form.css">
</head>
<body>
	<section class="sign-container">
    <nav class="nav-header-sign_up">
            <ul>
            <h3 class="animate-charcter"> UMConfession</h3>
                <li>
                    <a href="dashboard.php" class="active">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="register.php">
                        New Admin
                    </a>
                </li>
                <li>
                    <a href="post.php">
                        Back to User
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
	    <div class="form-container">
	        <div class="form-content">
                <h1 style="font-size: 40px;">Welcome <?php echo $user["lastname"]; ?>!</h1>
                <br><br>
	            <h2 class="header_form-content">
	                Dashboard
	            </h2>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Sl no</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        
                        $sql="Select * from `loginregister`";
                        $result=mysqli_query($con,$sql);
                        if($result) {
                            while($row=mysqli_fetch_assoc($result)) {
                                $id=$row['id'];
                                $firstname=$row['firstname'];
                                $lastname=$row['lastname'];
                                $email=$row['email'];
                                echo '<tr>
                                <th scope="row">'.$id.'</th>
                                <td>'.$firstname.'</td>
                                <td>'.$lastname.'</td>
                                <td>'.$email.'</td>
                                <td>
                                    <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Approve</a></button>
                                    <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Reject</a></button>
                                </td>
                                </tr>';
                            }
                        }
                        
                        ?>
                        
                        

                    </tbody>
                </table>
	        </div>
	    </div>
	</section>
	<script src="frontend/js/showPassword.js"></script>
</body>
</html>