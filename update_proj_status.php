<?php
    include('includes/connection.php');
    if(isset($_POST['updatep'])){
        $query = "update projects set status = '$_POST[status]' where pid = $_GET[id]";
        $query_run=mysqli_query($connection,$query);
        if($query_run){
            echo "<script type='text/javascript'>
                alert('Status updated successfully...');
                window.location.href='user_dashboard.php';
                </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
                alert('Error...Please try again.');
                window.location.href='user_dashboard.php';
                </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETMS|Update Project</title>
    <!--jquery file-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- bootstrap file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- external css file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>
    <!-- Header code starts here -->
    <div class="row" id="header">
        <div class="col-md-12">
            <h3><i class="fa fa-solid fa-list" style="padding-left: 15px;"></i>Task Management System</h3>
        </div>
    </div>
    <div class="row" style="align-items: flex-start;top:9vh;position:fixed;">
        <div class="col-md-4 m-auto" style="color:white"><br>
            <h3 style="color: white;">Update the project status</h3><br>
            <?php
                $query= "select * from projects where pid= $_GET[id]";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                <form action="" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="status" required>
                            <option>-Select-</option>
                            <option>In-Progress</option>
                            <option>Complete</option>
                        </select>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-warning" name="updatep" value="Update" required>
                </form>
                <?php
                }
            ?>
        </div>
    </div>
</body>
</html>