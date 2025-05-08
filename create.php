<?php
include 'config.php';  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $class = $_POST['class'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];
    $photoPath =$_POST ['photo'];
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $targetDir = "uploads/";
        if(!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        
        $fileExtension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $newFileName = uniqid().'.'.$fileExtension;
        $targetFile = $targetDir . $newFileName;
        if ($_FILES['photo']['size'] > 2000000) {
            die("Sorry, your file is too large.");
        }
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if(!in_array(strtolower($fileExtension), $allowedExtensions)) {
            die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }
        
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
            $photoPath = $targetFile;
        } else {
            die("Sorry, there was an error uploading your file.");
        }
    }
    
    $conn->query("INSERT INTO students (name, date, class, amount, status, photo) VALUES ('$name', '$date', '$class', '$amount', '$status', '$photoPath')");
    header("Location: orders.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APADE UMS - Inventory Management</title>
    <link rel="icon" href="logo-APADE.2x.png" type="x-icon">
    <style>
          body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 15px;
            display: inline-block;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        input[type="email"]:focus,
        input[type="file"]:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }
        input[type="submit"] {
            width: 100%;
            background-color:rgb(0, 122, 51);
            color: white;
            padding: 14px 20px;
            margin: 20px 0 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        label {
            font-weight: 500;
            color: #2c3e50;
        }
        .photo-preview {
            max-width: 150px;
            max-height: 150px;
            margin: 10px 0;
            display: none;
        }
        @media (max-width: 600px) {
            form {
                padding: 15px;
            }
            h2 {
                font-size: 24px;
            }
        }
        </style>
</head>
<body>
    <h2>Add Student</h2>
    <form method="post" enctype="multipart/form-data">
        Student Name: <input type="text" name="name" required><br><br>
        Date: <input type="date" name="date" required><br><br>
        Class: <input type="text" name="class" required><br><br>
        Amount: <input type="number" name="amount" required><br><br>
        Status: <input type="text" name="status" required><br><br>
        Student Photo: 
        <input type="file" name="photo" id="photoInput" accept="image/*">
        <img id="photoPreview" class="photo-preview" src="#" alt="Preview">
        <br><br>
        
        <input type="submit" value="Save">
    </form>

    <script>
        document.getElementById('photoInput').addEventListener('change', function(e) {
            const preview = document.getElementById('photoPreview');
            const file = e.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>