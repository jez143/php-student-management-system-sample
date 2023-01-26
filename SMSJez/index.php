<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once("connection/connection.php");
$con = connection();


$sql = "SELECT * FROM `studentlist` ORDER BY id DESC";
$student = $con->query($sql) or die($con->error);
$row = $student->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Student Information</title>
</head>

<body>

    <div class="header-nav">
        <div class="flex-sample">
            <div class="sam">
            <h1>Student Management</h1>
        </div>
        </div>
        <div class="flex2">
        </div>
    </div>
    <br>
    <br>




    <form action="result.php" method="get">
        <div class="search_box">
            <input type="search" placeholder="Search here" name="search" id="search">
            <button class="fa fa-search"></button>


            <?php if (isset($_SESSION['UserLogin'])) { ?>
                <a href="add.php" class="btn btn-primary prime ">Add New</a>
                <a href="logout.php" class="btn btn-primary prime2 ">Logout</a>
            <?php } else { ?>
                <a href="add.php" class="btn btn-primary prime ">Add New</a>
                <a href="login.php" class="btn btn-primary prime1">Login</a>

            <?php } ?>

        </div>
    </form>

    <div class="div-table">


        
        <section class="table-section">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php do { ?>
                        <tr>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>


                            <td><a class="view" href="details.php?id=<?php echo $row['id']; ?>">View</a></td>
                        </tr>
                    <?php } while ($row = $student->fetch_assoc()); ?>
                </tbody>
            </table>
        </section>
    </div>

</body>

</html>