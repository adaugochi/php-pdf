<?php
require "db.php";
    
    
        

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</head>
<body>
    <div class="container">
        <h2>Student Academic Report</h2>
        <form class="form-inline" action="report.php" method="post">
            <select name="coursename" class="form-control">
                <option>Select course</option>
                <?php 
                    $query = "SELECT * FROM `course` ORDER BY `id`";
                    $query_run = mysql_query($query);        
                    
                    while ($query_row = mysql_fetch_array($query_run)) {
                        $rowId = $query_row['id'];
                        $row = $query_row['courseName'];
                ?>
                <option value="<?php echo $rowId; ?>"><?php echo $row; ?></option>
                <?php
                    }
                ?>      
            </select>
            <select name="classes" class="form-control">
                <option>Select class</option>
                <?php 
                    $query1 = "SELECT * FROM `classes` ORDER BY `id`";
                    $query_run1 = mysql_query($query1);        
                    
                    while ($query_row1 = mysql_fetch_array($query_run1)) {
                        $rowId1 = $query_row1['id'];
                        $row1 = $query_row1['class'];
                ?>
                <option value="<?php echo $rowId1 ?>"><?php echo $row1; ?></option>
                <?php
                    }
                ?>      
            </select>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
        <p></p>
        <table class="table table-bordered" style="margin-top: 50px; width: 50%;">
            <thead>
                <tr>
                    <th>FULL NAME</th>
                    <th>GENDER</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        if (isset($_POST['submit'])) {
                            $coursename = $_POST['coursename'];
                            $classes = $_POST['classes'];
                            if (!empty($coursename) && !empty($classes)) {
                                $query2 = "SELECT `fullname`, `gender` FROM `students` WHERE `course_id` = '$coursename' AND `class_id` = '$classes'";
                                $query_run2 = mysql_query($query2);

                                if (mysql_num_rows($query_run2) != NULL){

                                    while ($query_row2 = mysql_fetch_assoc($query_run2)) {
                                        $fullname = $query_row2['fullname'];
                                        $gender = $query_row2['gender'];
                                        //echo $fullname. " is a ". $gender."<br>";
                    ?>
                                    <tr>
                                        <td><?php echo $fullname."<br>"; ?></td>
                                        <td><?php echo $gender."<br>"; ?></td>
                                    </tr>
                    <?php                    
                                    }
                                } else {
                                    echo "No Name found";
                                }
                            }
                        }
                    ?>       
            </tbody>
        </table>
    </div>
    
</body>
</html>
