<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if(isset($_POST["logout"])){
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

require_once "config.php";

$user_id = $_SESSION['user_id'];
$sql = "SELECT name FROM users WHERE id = :id";

if($stmt = $pdo->prepare($sql)){
    $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
    $param_id = $user_id;
    if($stmt->execute()){
        if($stmt->rowCount() == 1){
            if($row = $stmt->fetch()){
                $name = $row['name'];
            }
        } else{
            $name = "User";
        }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
}
unset($stmt);
unset($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        input[type="submit"] {
            background-color: #f44336;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            float: right;
        }
        input[type="submit"]:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome to Home Page</h2>
        <p>Hello, <?php echo $name; ?>!</p>
        <form action="" method="post">
            <input type="submit" name="logout" value="Logout">
        </form>
    </div>
</body>
</html>
