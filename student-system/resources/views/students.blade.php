<!DOCTYPE html>
<html>
<head>
    <title>Registered Students</title>
</head>
<body>
    <h1>List of Registered Students</h1>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Registered At</th>
        </tr>

        @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->created_at }}</td>
        </tr>
        @endforeach
    </table>

    <br>
    <a href="/register">Back to Registration</a>
</body>
</html>
