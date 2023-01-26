<?php 
include_once("connection/connection.php");
$con = connection();

   

if(isset($_POST['submit'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $birthplace = $_POST['birthplace'];
    $course = $_POST['course_section'];
   
  

     $sql = "INSERT INTO `studentlist`(`firstname`, `lastname`, `birthdate`, `birthplace`, `course_section`) VALUES ('$fname','$lname','$birthdate','$birthplace','$course')";
     $con->query($sql) or die ($con->error);

     
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
    <form action="" method="POST">
        
    <div class="center-div">
        <form class="form-addnew" action="" method="POST">
            <div class="center-form">

                <div class="form-label">
                    <label>Firstname</label>
                </div>

                <div class="input-form">
                    <input type="text" name="firstname" id="firstname" value= "<?php $row['firstname']; ?>">
                </div>

                <div class="form-label">
                    <label>Lastname</label>
                </div>

                <div class="input-form">
                    <input type="text" name="lastname" id="lastname" value= "<?php $row['lastname']; ?>">
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
                    <input type="text" name="birthplace" id="birthplace" >
                </div>
                

                <div class="form-label">
                    <label>Birthdate</label>
                </div>

                <div class="input-form">
                    <input type="date" name="birthdate" id="birthdate" value= "<?php $row['birthdate']; ?>">>
                </div>

              
                <div class="submit-button">
                <input type="submit" name="submit" value="Submit Form">
                </div>
            </div>

        </form>
    </div>
        
    </form>
   
</body>
</html>




