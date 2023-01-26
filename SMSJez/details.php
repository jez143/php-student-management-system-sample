<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin") {
} else {
    echo header("Location: index.php");
}

include_once("connection/connection.php");
$con = connection();
$id =  $_GET['id'];


$sql = "SELECT * FROM `studentlist` WHERE id = '$id'";
$student = $con->query($sql) or die($con->error);
$row = $student->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/details.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Student Information</title>

    <style>
       

    </style>
</head>

<body>

    <div>
        <div class="header-nav">
            <div class="flex-sample">
                <h1>Student Management</h1>
            </div>
            <div class="flex2">
            </div>
        </div>
        <br>
        <br>
        <div>



<div class="a11">
        <a class="a1" href="index.php"><i class="	fa fa-angle-double-left" aria-hidden="true">&nbsp &nbsp</i>Back </a>

        </div>




            <table style="width: 70%;" class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Birthdate</th>
                        <th>Birthplace</th>
                        <th>Course and Section</th>
                        <th style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php do { ?>
                        <tr>
                            <td style><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['birthdate']; ?></td>
                            <td><?php echo $row['birthplace']; ?></td>
                            <td><?php echo $row['course_section']; ?></td>
                           
                            
                            <td>
                            <form action="delete.php" method="post">
                <div class="edit-delete">
                   
                   
                    <button style="margin-top: 0px;" type="submit" name="delete">Delete</button>
                    <a class="shit" style="background-color:green; color: white;margin-top: 20px; padding: 6px 20px;border: none;border-radius: 4px;cursor: pointer;float: right;font-weight: 550; margin-right: 10px; margin-top: 0px;" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                </div>
            </form>

                            </td>


                        </tr>
                    <?php } while ($row = $student->fetch_assoc()); ?>
                </tbody>
            </table>
        </div>

</body>

</html>