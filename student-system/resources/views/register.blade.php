<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>
    <h1>Register Student</h1>
    <form action="/register" method="POST">
        @csrf
        <label>Name:</label><br>
        <input type="text" name="name"><br><br>


        <label>Email:</label><br>
        <input type="email" name="email"><br><br>


        <button type="submit">Submit</button>
    </form>
</body>
</html>


