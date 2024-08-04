<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="create_task_container">
        <h3>Create a new Project</h3>
        <div class="row"  style="width: 100%; margin: 0;">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Select User:</label>
                        <select class="form-control" name="id">
                            <option>-Select-</option>
                            <?php
                                include('../includes/connection.php');
                                $query="select uid,name from users";
                                $query_run = mysqli_query($connection,$query);
                                if(mysqli_num_rows($query_run)){
                                    while($row = mysqli_fetch_assoc($query_run)){
                                        ?>
                                        <option value="<?php echo $row['uid'];?>">
                                            <?php echo $row['name'];?>
                                        </option>
                                        <?php 
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea class="form-control" rows="3" cols="50" name="description" placeholder="Project description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Start Date:</label>
                        <input type="date" class="form-control" name="start_date">
                    </div>
                    <div class="form-group">
                        <label>End Date:</label>
                        <input type="date" class="form-control" name="end_date">
                    </div>
                    <input type="submit" class="btn btn-warning" name="create_project" value="Create">

                </form>
            </div>
        </div>
    </div>
</body>

</html>