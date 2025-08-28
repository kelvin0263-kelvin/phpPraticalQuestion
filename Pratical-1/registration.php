<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="processRegistration.php" method="post">
        <h1>Registration Form </h1>
        <label for="Name">Name</label>
        <br>
        <input type="text" name="fullName" id="Name">

        <br><br>
        <label for="mobileNumber">Mobile Phone</label>
        <br>
        <input type="text   " name="mobileNumber" id="mobileNumber">


        <br><br>

        Gender 
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>  

        <br><br>
        <input type="submit">
        <button type="reset">Reset</button>

    </form>


    <?php
    //Name: Tan Chun Keat
//Student ID : 2314612
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $_POST["fullName"];
        $mobileNumber = $_POST["mobileNumber"];
        $gender = $_POST["gender"];
    }
    if (isset($_GET['error'])) {

        echo '<h1>Registration Failed</h1>';

        echo $_GET['error'];
    }




    ?>
</body>

</html>