<?php 
include_once("connection/connection.php");
$con = connection();
$id =  $_GET['id'];

$sql = "SELECT * FROM `studentlist` WHERE id = '$id'";
$student = $con->query($sql) or die ($con->error);
$row = $student->fetch_assoc();


if(isset($_POST['submit'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $course = $_POST['course_section'];
    $birthdate = $_POST['birthdate'];
    $birthplace = $_POST['birthplace'];
   
  

     $sql = "UPDATE `studentlist` SET firstname = '$fname', lastname = '$lname', course_section = '$course', birthdate = '$birthdate', birthplace = '$birthplace' WHERE id = '$id'";
     $con->query($sql) or die ($con->error);

     echo header("Location:details.php?id=".$id);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Student Information</title>
</head>
<body>
    <div class="center-div">
    <form action="" method="POST">
    <div class="center-form">
    <div class="form-label">
        <label>Firstname</label>
        </div>
        <div class="input-form">
        <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" id="firstname">
        </div>
        <div class="form-label">
        <label>Lastname</label>
        </div>
        <div class="input-form">
        <input type="text" name="lastname" value="<?php echo $row['lastname'];?>" id="lastname">
        </div>
        <div class="form-label">
        <label>Course/Section</label>
        </div>
        <div class="input-form">
        <input type="text" name="course_section" value="<?php echo $row['course_section'];?>" id="course_section">
        </div>
        
        <div class="form-label">
        <label>Birthdate</label>
        </div>
        <div class="input-form">
        <input type="date" name="birthdate" value="<?php echo $row['birthdate']; ?>" id="birthdate">
        </div>
        <div class="form-label">
        <label>Birthplace</label>
        </div>
        <div class="input-form">
        <input type="text" name="birthplace" value="<?php echo $row['birthplace']; ?>" id="birthplace">
        </div>
        <div class="submit-button">
       <button type="submit" name="submit">Update Form</button>
       </div>
    </form>
    </div>
    </div>
   
</body>
</html>