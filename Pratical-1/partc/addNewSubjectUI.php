<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add New Subject</h1>
    <form action="addNewSubject.php" method="post">
        <label for="subjectCode">Subject Code : </label>
        <input type="text" name="subjectCode" id="subjectCode">
        <br><br>
        <label for="title">Title : </label>
        <input type="text" name="title" id="title">
        <br><br> 
        <label for="creditValue">Credit Value : </label>
        <input type="text" name="creditValue" id="creditValue">
        <br><br>
        <label for="yearOfStudy">Year Of Study : </label>
        <input type="text" name="yearOfStudy" id="yearOfStudy">
        <br><br>
        <button type="submit">Add</button>

    </form>
    

    
</body>
</html>