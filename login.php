<?php
session_start();
//include("home.html");

$host = "localhost";
$dbname = "register_db";
$username = "root";
$password = "";

$conn = mysqli_connect( hostname: $host,
                        username: $username,
                        password: $password,
                        database: $dbname);

if (mysqli_connect_errno()){

    die("connection error" . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['name'] = $row['name'];
    include("home.html");
} else {
    echo "Invalid email or password. Please try again.";
}
mysqli_close($conn);

/*
if (mysqli_connect_errno()){

    die("connection error" . mysqli_connect_error());
} else{
    $stmt = $conn->prepare("SELECT * FROM users WHERE email= ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password) {
            include("home.html");
        } else{
            echo"Invalid Email or Password.";
        }
    } else{
        echo"Invalid Email or Password.";
    }
}
*/

?>