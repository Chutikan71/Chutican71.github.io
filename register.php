<?php
include 'connect.php'; // 

if (isset($_POST['signUp'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    // ตรวจสอบอีเมล์ว่ามีในฐานข้อมูลหรือไม่
    $checkEmail = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        echo "Email Address Already Exists!";
    } else {
        // เพิ่มข้อมูลผู้ใช้ใหม่
        $insertQuery = "INSERT INTO user (firstName, lastName, email, password)
                       VALUES ('$firstName', '$lastName', '$email', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
            header("Location: login.php"); // รีไดเรกต์กลับไปหน้าแรก
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("Location: login.php"); // รีไดเรกต์กลับไปหน้าแรก
        exit();
    } else {
        echo "Incorrect Email or Password";
    }
}
?>
