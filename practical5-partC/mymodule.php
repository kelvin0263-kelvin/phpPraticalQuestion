<?php
$apiUrl = "http://192.168.100.103:106/tarumt/ip/practical5/example/subject_api.php"; // never put parameter cuz have different action
$message = "";

// Handle Add / Edit / Delete actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $actionType = $_POST['actionType'] ?? ''; // this is from form aslo
    $data = [];

    if ($actionType === 'add') {
        //this is postField
        // $data = [
        //     "code" => $_POST['code'], // all this value is from form
        //     "title" => $_POST['title'],
        //     "credit" => (int)$_POST['credit'],
        //     "year" => (int)$_POST['year']
        // ];
        $data = [
            "name" => $_POST['name'], // all this value is from form
            "nickname" => $_POST['nickname'],
            "message" => (int)$_POST['message'],
        ];
        $ch = curl_init("$apiUrl?action=add"); // this is url pass in 
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($data)); // sent as the postfield
        curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        $response = curl_exec($ch); // here is response 
        curl_close($ch);
        $message = json_decode($response,true)['message'] ?? '';
    }

    if ($actionType === 'edit') {
        $id = $_POST['id'];
        $data = [
            "code" => $_POST['code'],
            "title" => $_POST['title'],
            "credit" => (int)$_POST['credit'],
            "year" => (int)$_POST['year']
        ];
        $ch = curl_init("$apiUrl?action=edit&id=$id");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"PUT");
        curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($data));
        curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/json']);
        $response = curl_exec($ch);
        curl_close($ch);
        $message = json_decode($response,true)['message'] ?? '';
    }

    if ($actionType === 'delete') {
        $id = $_POST['id'];
        $ch = curl_init("$apiUrl?action=delete&id=$id");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
        $response = curl_exec($ch);
        curl_close($ch);
        $message = json_decode($response,true)['message'] ?? '';
    }
}


// Always fetch all subjects after actions (Get action here)
$studentsJson = file_get_contents("$apiUrl?action=getAll");
$subjectsArray = json_decode($studentsJson,true);

if(isset($subjectsArray['status']) && $subjectsArray['status'] === 'success'){
    $subjects = $subjectsArray['data']; // ensure if the action failed do get the data first
} else {
    $subjects = [];
    $message = $subjectsArray['message'] ?? "Unknown API error";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Subjects Management</title>
</head>
<body>
<h2>Subjects Management</h2>
<?php if($message) echo "<p><b>$message</b></p>"; ?>




<!-- <h3>Add New Subject</h3> -->
<h3>Get attendence</h3>
<form method="post">
    <input type="hidden" name="actionType" value="add">
    Name: <input type="text" name="name" required>
    Nickname: <input type="text" name="nickname" required>
    <input type="submit" value="Add">
</form>

<!-- <form method="post">
    <input type="hidden" name="actionType" value="add">
    Code: <input type="text" name="code" required>
    Title: <input type="text" name="title" required>
    Credit: <input type="number" name="credit" required>
    Year: <input type="number" name="year" required>
    <input type="submit" value="Add">
</form> -->


<h3>attendence</h3>
<table border="1" cellpadding="5">
<tr><th>Name</th><th>Nickname</th><th>Message</th></tr>
<?php foreach($subjects as $s): ?>
<tr>
    <td><?= $s['name'] ?></td>
    <td><?= $s['nickname'] ?></td>
    <td><?= $s['message'] ?></td>
    <!-- <td>
        <form style="display:inline" method="post">
            <input type="hidden" name="actionType" value="delete">
            <input type="hidden" name="id" value="<?= $s['id'] ?>">
            <input type="submit" value="Delete">
        </form>
        <form style="display:inline" method="post">
            <input type="hidden" name="actionType" value="edit">
            <input type="hidden" name="id" value="<?= $s['id'] ?>">
            Code: <input type="text" name="code" value="<?= $s['code'] ?>" required>
            Title: <input type="text" name="title" value="<?= $s['title'] ?>" required>
            Credit: <input type="number" name="credit" value="<?= $s['credit'] ?>" required>
            Year: <input type="number" name="year" value="<?= $s['year'] ?>" required>
            <input type="submit" value="Edit">
        </form>
    </td> -->
</tr>
<?php endforeach; ?>



</table>
