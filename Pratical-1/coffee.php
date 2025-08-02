<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <h1>MyDot Coffee</h1>
        <label for="numBag">Number of bags : </label>
        <input type="text" name="numBag" id="">
        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['numBag'])) {
            $numBag = $_POST['numBag'];

            $discountRate = 0;
            if ($numBag >= 300) {
                $discountRate = 0.30;
            } elseif ($numBag >= 200) {
                $discountRate = 0.25;
            } elseif ($numBag >= 150) {
                $discountRate = 0.20;
            } elseif ($numBag >= 100) {
                $discountRate = 0.15;
            } elseif ($numBag >= 50) {
                $discountRate = 0.10;
            } elseif ($numBag >= 25) {
                $discountRate = 0.05;
            } else {
                // For any number less than 25
                $discountRate = 0.0;
            }

            echo '<p>Price for ' . $numBag . ' bags = RM' . ($numBag * 5.5) . '</p>';
            echo '<p>Discount = RM ' . ($numBag * 5.5) * ($discountRate) . '</p>';
            echo '<p>Your total charge = RM ' . ($numBag * 5.5) * (1 - $discountRate) . '</p>';
            if ((($numBag * 5.5) * (1 - $discountRate)) >= 1000) {
                echo '<p>You will get 1 free movie ticket</p>';
            }
        }
    }
    ?>
</body>

</html>