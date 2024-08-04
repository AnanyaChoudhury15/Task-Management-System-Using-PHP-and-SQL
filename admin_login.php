<?php
    session_start();
    include('../includes/connection.php');
    // User registration process
    if(isset($_POST['AdminLogin'])){
        $query = "select email,password,name from admins where email='$_POST[email]' AND password='$_POST[password]'";
        $query_run = mysqli_query($connection, $query);
        
        if(mysqli_num_rows($query_run)){
            while($row = mysqli_fetch_assoc($query_run)){
                $_SESSION['email']=$row['email'];
                $_SESSION['name']=$row['name'];
            }
            echo "<script type='text/javascript'>
                window.location.href='admin_dashboard.php';
                </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
                alert('Please enter correct details....');
                window.location.href='admin_login.php';
                </script>
            ";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ETMS|Admin Login</title>
    <!--jquery file-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- bootstrap file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- external css file -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <div class="row">
        <div class="col-md-3 m-auto" id="login_home_page">
            <center><h3>Admin Login</h3></center><br>
            <form action="" method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter email"required>
                </div><br>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter password"required>
                </div><br>
                <div class="form-group">
                    <input type="submit" name="AdminLogin" value="Login" class="btn btn-warning">
                </div><br>
            </form>
            <a href="../index.php" class="btn btn-danger">Go to Home</a>
        </div>
    </div>
</body>
</html>