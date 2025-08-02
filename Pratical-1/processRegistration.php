<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-weight: bold;
        }
    </style>
</head>

<body>



    <?php
    //declare an empty arrayx
    $errors = [];
    //ensure the method is post method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = isset($_POST["fullName"]) ? trim($_POST["fullName"]) : "";
        $mobileNumber = isset($_POST["mobileNumber"]) ? trim($_POST["mobileNumber"]) : "";
        $gender = isset($_POST["gender"]) ? trim($_POST["gender"]) : "";


        if (empty(trim($name))) {
            $errors[] = "Name field can not be empty";
        }
        if (empty(trim($mobileNumber))) {
            $errors[] = "Mobile number field can not be empty";
        }

        if (empty($gender)) {
            $errors[] = "Gender field must be selected";
        }

        if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
            $errors[] = "Name must contain letter only";
        }

        if (!preg_match("/^[0-9]+$/", $mobileNumber)) {
            $errors[] = "Mobile number must contain digit only";
        }




        if (!empty($errors)) {

            $query = http_build_query(
                [
                    'error' => implode(' | ', $errors),
                    'name' => $name,
                    'mobileNumber' => $mobileNumber,
                    'gender' => $gender,

                ]
            );
            header("Location: registration.php?" . $query);
            exit;
        } else {

            echo "<h1>Registration sucessful </h1> <br /> ";
            echo "Mr" . htmlspecialchars(string: $name) . "<br /> ";
            echo "Mobile Number :" . htmlspecialchars($mobileNumber) . "<br /> ";
            echo "Gender :" . htmlspecialchars($gender) . "<br /> ";
        }
    }






    ?>
</body>

</html>