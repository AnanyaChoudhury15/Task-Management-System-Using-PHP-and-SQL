<?php
    include('../includes/connection.php');
?>
<html>
    <body>
        <center><h3>All Leave Applications</h3></center><br>
        <table class="table" style="background-color: whitesmoke; width: 80vw;">
            <tr>
                <th>S.no</th>
                <th>User</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Status</td>
                <th>Action</th>
            </tr>
            <?php
                $sno=1;
                $query = "select * from leaves";
                $query_run = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                    <tr>
                        <td><?php echo $sno; ?></td>
                        <?php
                            $query1 = "select name from users where uid = $row[uid]";
                            $query_run1=mysqli_query($connection,$query1);
                            while($row1=mysqli_fetch_assoc($query_run1)){
                                ?>
                                <td><?php echo $row1['name']; ?></td>
                                <?php
                            }
                        ?>

                        <td style="width: 180px;"><?php echo $row['subject']; ?></td>
                        <td style="width: 400px;"><?php echo $row['message']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><a href="approve_leave.php?id=<?php echo $row['lid'];?>">Approve
                            </a> | <a href="reject_leave.php?id=<?php echo $row['lid'];?>">Reject</a></td>
                    </tr>
                    <?php
                    $sno=$sno+1;
                }
            ?>
        </table>
    </body>
</html>