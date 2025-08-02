<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<html>
</html>

    <?php
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $name = $_POST["name"];
    //     echo "Hello world, $name <br /> ";
    // }



    // define variables and set to NULL
    $name = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            echo "$nameErr <br /> ";

        } else {

            $name = prepareInput($_POST["name"]);
            echo "Hello world, $name <br /> ";
        }
    }

    function prepareInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }






    ?>

    <form method="post">
        Name: <input type="text" name="name"><br>
        <input type="submit">
    </form>
</body>

</html>