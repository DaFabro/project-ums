<?php
$conn = new mysqli("localhost", "root", "", "uniformms");
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
include 'header.php';
$results = [];
if (isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM students 
            WHERE name LIKE '%$search%' 
               OR id LIKE '%$search%' 
               OR class LIKE '%$search%'";
    $query = $conn->query($sql);

    while ($row = $query->fetch_assoc()) {
        $results[] = $row;
    }
}
$conn->close();  
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Search</title>
    <link rel="icon" href="logo-APADE.2x.png" type="x-icon">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    text-align: center;
}

h2, h3 {
    color: #fff;
}

form {
    margin-bottom: 20px;
}

input[type="text"] {
    width: 60%;
    padding: 10px;
    border: 2px solid rgb(9, 133, 56);
    border-radius: 5px;
    font-size: 16px;
}

button {
    background-color:rgb(6, 94, 10);
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color:rgb(9, 99, 6);
}

table {
    width: 80%;
    margin: 0 auto;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color:rgb(2, 119, 55);
    color: white;
}

tr:hover {
    background-color: #f1f1f1;
}

    </style>
</head>
<body>
    <h2>Search for a Student</h2>
    <form method="get" action="search.php">
        <input type="text" name="search" placeholder="Enter name, ID or class" required>
        <button type="submit">Search</button>
    </form>

    <?php if (!empty($results)): ?>
        <h3>Search Results:</h3>
        <table>
            <tr>
                <th>OrderID</th>
                <th>Name</th>
                <th>Class</th>
            </tr>
            <?php foreach ($results as $student): ?>
                <tr>
                    <td><?= htmlspecialchars($student['id']) ?></td>
                    <td><?= htmlspecialchars($student['name']) ?></td>
                    <td><?= htmlspecialchars($student['class']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif (isset($_GET['search'])): ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>
</html>