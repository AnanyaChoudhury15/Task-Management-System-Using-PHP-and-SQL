<?php
    session_start();
    include('../includes/connection.php');
    if(isset($_SESSION['email'])){
    if(isset($_POST['create_task'])){
        $query = "insert into tasks values(null, $_POST[id], '$_POST[description]', '$_POST[start_date]', '$_POST[end_date]','Not Started')";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            echo "<script type='text/javascript'>
                alert('Task created successfully...');
                window.location.href='admin_dashboard.php';
                </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
                alert('Error....Please try again.');
                window.location.href='admin_dashboard.php';
                </script>
            ";
        }

    }
    if(isset($_POST['create_project'])){
        $query = "insert into projects values(null, $_POST[id], '$_POST[description]', '$_POST[start_date]', '$_POST[end_date]','Not Started')";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            echo "<script type='text/javascript'>
                alert('Project created successfully...');
                window.location.href='admin_dashboard.php';
                </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
                alert('Error....Please try again.');
                window.location.href='admin_dashboard.php';
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
    <title>TMS| Admin Dashboard</title>
    <!--jquery file-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- bootstrap file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- external css file -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- jquery code -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#create_task").click(function(){
                $("#right_sidebar").load("create_task.php");
            });
        });

        $(document).ready(function(){
            $("#create_project").click(function(){
                $("#right_sidebar").load("create_project.php");
            });
        });

        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#right_sidebar").load("manage_task.php");
            });
        });

        $(document).ready(function(){
            $("#manage_project").click(function(){
                $("#right_sidebar").load("manage_project.php");
            });
        });

        $(document).ready(function(){
            $("#view_leave").click(function(){
                $("#right_sidebar").load("view_leave.php");
            });
        });
    </script>


</head>
<body>
    <!-- Header code starts here -->
     <div class="row" id="header">
        <div class="col-md-12">
            <div class="col-md-4" style="display: inline-block;">
                <h3>Task Management System</h3>
            </div>
            <div class="col-md-6" style="display: inline-block;text-align: right">
                <b>Email: </b> <?php echo $_SESSION['email']; ?>
                <span style="margin-left: 25px;"><b> Name: </b><?php echo $_SESSION['name']; ?></span>
            </div>
        </div>
     </div>
     <!--Main code starts -->
     <div class="row">
        <div class="col-md-2" id="left_sidebar">
            <table class="table">
                <tr>
                    <td style="text-align: center;">
                        <a href="admin_dashboard.php" class="sidebar-button">Dashboard</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a class="sidebar-button" id="create_task">Create Task</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a class="sidebar-button" id="manage_task">Manage Tasks</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a class="sidebar-button" id="create_project">Create Projects</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a class="sidebar-button" id="manage_project">Manage Projects</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a class="sidebar-button" id="view_leave">Leave Applications</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="../logout.php" class="sidebar-button" id="link">Logout</a>
                    </td>
                </tr>
            </table>

        </div>
        <div class="col-md-10" id="right_sidebar">
            <h3 style="font-weight: bold; text-decoration:underline;">Instructions for Admin</h3>
            <ul style="font-size: 1em; list-style-type: none;">
                <br>
                <li>1. Create and Assign Tasks: Add new tasks to the system and assign them to appropriate users. Ensure tasks are clearly defined and deadlines are set.</li>
                <li>2. Monitor Task Progress: Regularly review task statuses and follow up with users as needed. Ensure tasks are completed on time and report any delays.</li>
                <li>3. Approve or Reject Leave Requests: Review leave requests submitted by employees. Approve or reject requests based on company policies and staffing needs.</li>
                <li>4. Update Task and Leave Records: Keep records updated with any changes in task assignments or leave statuses. Ensure accurate documentation for audits and reports.</li>
            </ul>

        </div>
     </div>


</body>
</html>
<?php
        }
        else{
            header('Location:admin_login.php');
        }