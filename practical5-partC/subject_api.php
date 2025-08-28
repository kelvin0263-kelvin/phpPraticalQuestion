<?php
header("Content-Type: application/json");

// Database connection
$host = "localhost";
$user = "root";
$pass = "123456";
$db   = "collegedb";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "DB connection failed"]));
}

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? null;
$id = $_GET['id'] ?? null;

// GET all subjects
if ($method === 'GET' && $action === 'getAll') {
    $result = $conn->query("SELECT * FROM subjects");
    $subjects = [];
    while($row = $result->fetch_assoc()) $subjects[] = $row;
    echo json_encode(["status"=>"success","data"=>$subjects]);
    exit;
}

// POST add subject
if ($method === 'POST' && $action === 'add') {
    $input = json_decode(file_get_contents("php://input"),true);
    $stmt = $conn->prepare("INSERT INTO subjects (code,title,credit,year) VALUES (?,?,?,?)");
    $stmt->bind_param("ssii",$input['code'],$input['title'],$input['credit'],$input['year']);
    $stmt->execute();
    echo json_encode(["status"=>"success","message"=>"Subject added"]);
    exit;
}

// PUT edit subject
if ($method === 'PUT' && $action === 'edit' && $id) {
    $input = json_decode(file_get_contents("php://input"),true);
    $stmt = $conn->prepare("UPDATE subjects SET code=?, title=?, credit=?, year=? WHERE id=?");
    $stmt->bind_param("ssiii",$input['code'],$input['title'],$input['credit'],$input['year'],$id);
    $stmt->execute();
    echo json_encode(["status"=>"success","message"=>"Subject updated"]);
    exit;
}

// DELETE subject
if ($method === 'DELETE' && $action === 'delete' && $id) {
    $stmt = $conn->prepare("DELETE FROM subjects WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    echo json_encode(["status"=>"success","message"=>"Subject deleted"]);
    exit;
}

echo json_encode(["status"=>"error","message"=>"Invalid action"]);
$conn->close();