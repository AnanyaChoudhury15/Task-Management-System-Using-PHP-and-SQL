<?php
    session_start();
    if(isset($_SESSION['email'])){
    include('includes/connection.php');
    if(isset($_POST['submit_leave'])){
        $query = "insert into leaves values(null,$_SESSION[uid], '$_POST[subject]', '$_POST[message]','No Action')";
        $query_run = mysqli_query($connection, $query);
        if($query_run){
            echo "<script type='text/javascript'>
                alert('Leave applied successfully...');
                window.location.href='user_dashboard.php';
                </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
                alert('Error....Please try again.');
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
    <title>TMS| User Dashboard</title>
    <!--jquery file-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- bootstrap file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- external css file -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript">
        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#right_sidebar").load("task.php");
            });
        });
        $(document).ready(function(){
            $("#manage_project").click(function(){
                $("#right_sidebar").load("project.php");
            });
        });

        $(document).ready(function(){
            $("#apply_leave").click(function(){
                $("#right_sidebar").load("leaveform.php");
            });
        });

        $(document).ready(function(){
            $("#leave_status").click(function(){
                $("#right_sidebar").load("leave_status.php");
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
                <span style="margin-left: 25px;"><b> Name: </b> <?php echo $_SESSION['name']; ?></span>
            </div>
        </div>
     </div>
     <!--Main code starts -->
     <div class="row">
        <div class="col-md-2" id="left_sidebar">
            <table class="table">
                <tr>
                    <td style="text-align: center;">
                        <a href="user_dashboard.php" class="sidebar-button">Dashboard</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a class="sidebar-button" id="manage_task">View Tasks</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a class="sidebar-button" id="manage_project">View Projects</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a class="sidebar-button" id="apply_leave">Apply Leave</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a class="sidebar-button" id="leave_status">Leave Status</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="logout.php" class="sidebar-button">Logout</a>
                    </td>
                </tr>
            </table>

        </div>
        <div class="col-md-10" id="right_sidebar">
            <h3 style="font-weight: bold; text-decoration:underline;">Instructions for Employees</h3>
            <ul style="font-size: 1em; list-style-type: none;">
                <br>
                <li>1. Prioritize and Track Tasks: Identify urgent tasks and manage them using a task list or management tool. Regularly update task statuses and communicate any challenges.</li>
                <li>2. Maintain Professionalism: Use respectful communication, adhere to the dress code, and keep your workspace organized. Be punctual for work and meetings.</li>
                <li>3. Ensure Regular Attendance: Follow your work schedule, avoid unnecessary absences, and report on time. Notify your manager in advance if you need time off.</li>
                <li>4. Deliver High-Quality Work: Aim for accuracy and completeness in all tasks. Seek feedback for improvement and perform a final review before marking tasks as complete.</li>
            </ul>

        </div>
     </div>


</body>
</html>
<?php
    }
    else{
        header('Location:user_login.php');
    }