<?php
    include('../includes/connection.php');
?>

<html>
    <body>
        <center><h3>All assigned projects</h3></center><br>
        <table class="table" style="width: 79vw; background-color:whitesmoke;margin-left:10px;">
            <tr>
                <th>S.no</th>
                <th>Project ID</th>
                <th>Project title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
                $sno=1;
                $query = "select * from projects";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <td><?php echo $row['pid']; ?></td>
                        <td style="width:40%;"><?php echo $row['description']; ?></td>
                        <td><?php echo $row['start_date']; ?></td>
                        <td><?php echo $row['end_date']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><a href="edit_project.php?id=<?php echo $row['pid']; ?>">Edit</a> | 
                        <a href="delete_project.php?id=<?php echo $row['pid']; ?>">Delete</a></td>
                    </tr>
                    <?php
                    $sno=$sno+1;
                }
            ?>
        </table>
    </body>
</html>