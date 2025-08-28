<!DOCTYPE html>
<html lang="en">
<head>
<title>REST API Client Demo</title>
<meta charset="utf-8">
</head>
<body>

<h2>REST API Client Demo</h2>
<form method="POST">
    <label>Product Name: </label>
    <input type="text" name="name" required>
    <button type="submit" name="submit">Submit</button>
</form>

<p>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];

    // REST API URL
    $url = "http://localhost:106/tarumt/ip/practical5/soupui/PartB/api.php?name=" . urlencode($name);

    // Call API using CURL
    $client = curl_init($url);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true); // store response
    $response = curl_exec($client);

    // Convert JSON response into PHP object
    $result = json_decode($response);

    if (isset($result->data)) {
        echo "Price of $name is RM " . number_format($result->data, 2);
    } else {
        echo $result->error;
    }
}
?>
</p>

</body>
</html>
