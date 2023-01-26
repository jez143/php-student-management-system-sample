<?php
include_once("connection/connection.php");
$con = connection();



if (isset($_POST['submit'])) {

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $course = $_POST['course_section'];
    $birthdate = $_POST['birthdate'];
    $birthplace = $_POST['birthplace'];



    $sql = "INSERT INTO `studentlist`(`firstname`, `lastname`, `birthdate`, `birthplace`, `course_section`) VALUES ('$fname','$lname','$birthdate','$birthplace','$course')";
    $con->query($sql) or die($con->error);

    echo header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Student Information</title>
</head>

<body class="body1">
    <div class="center-div">
        <form class="form-addnew" action="" method="POST">
            <div class="center-form">

                <div class="form-label">
                    <label>Firstname</label>
                </div>

                <div class="input-form">
                    <input type="text" name="firstname" id="firstname">
                </div>

                <div class="form-label">
                    <label>Lastname</label>
                </div>

                <div class="input-form">
                    <input type="text" name="lastname" id="lastname">
                </div>

                <div class="form-label">
                    <label>Course/Section</label>
                </div>

                <div class="input-form">
                    <input type="text" name="course_section" id="course_section">
                </div>

                <div class="form-label">
                    <label>Birthplace</label>
                </div>

                <div class="input-form">
                    <input type="text" name="birthplace" id="birthplace">
                </div>
                

                <div class="form-label">
                    <label>Birthdate</label>
                </div>

                <div class="input-form">
                    <input type="date" name="birthdate" id="birthdate">
                </div>

              
                <div class="submit-button">
                    <button type="submit" name="submit">Add New</button>
                </div>
            </div>

        </form>
    </div>
</body>

</html>