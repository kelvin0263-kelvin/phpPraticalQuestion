<?php
require_once('dbconnection.php');
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $subjectCode = isset($_POST["subjectCode"]) ? trim($_POST["subjectCode"]) : "";
    $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
    $creditValue = isset($_POST['creditValue']) ? trim($_POST["creditValue"]) : "";
    $yearOfStudy = isset($_POST["yearOfStudy"]) ? trim($_POST["creditValue"]) : "";

    if (empty(trim($subjectCode))) {
        $errors[] = "subjectCode can not be empty";
    }
    if (empty(trim($title))) {
        $errors[] = "title field can not be empty";
    }

    if (empty($creditValue)) {
        $errors[] = "creditValue field can not be empty";
    }
    if (empty($yearOfStudy)) {
        $errors[] = "yearOfStudy field can not be empty";
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO subjects (code,tittle,credit,year) VALUES (?,?,?,?)");
        $stmt->execute([$subjectCode, $title, $creditValue, $yearOfStudy]);
        echo "<p> Subject added successfuly !</p>";

    }else{
          $query = http_build_query(
                [
                    'error' => implode(' | ', $errors)
                ]
            );
            header("Location: addNewSubjectUI.php?" . $query);
            exit;
    }

}




?>