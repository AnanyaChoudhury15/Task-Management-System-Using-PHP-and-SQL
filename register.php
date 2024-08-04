<?php
    include('includes/connection.php');
    // User registration process
    if(isset($_POST['UserRegistration'])){
        $query = "INSERT INTO users VALUES (null, '$_POST[name]', '$_POST[email]', '$_POST[password]', '$_POST[mobile]')";
        $query_run = mysqli_query($connection, $query);
        
        if($query_run){
            echo "<script type='text/javascript'>
                alert('User registered successfully...');
                window.location.href='index.php';
                </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
                alert('Error...Please try again.');
                window.location.href='register.php';
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
    <title>Register | ETMS</title>
    <!-- jquery file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- bootstrap file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- external css file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="row">
        <div class="col-md-3 m-auto" id="register_home_page">
            <center><h3>User Registration</h3></center><br>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                </div><br>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                </div><br>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                </div><br>
                <div class="form-group">
                    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile no." required>
                </div><br>
                <div class="form-group">
                    <input type="submit" name="UserRegistration" value="Register" class="btn btn-warning">
                </div><br>
            </form>
            <a href="index.php" class="btn btn-danger">Go to Home</a>
        </div>
    </div>
</body>
</html>
