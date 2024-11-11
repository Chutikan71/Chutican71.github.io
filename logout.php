<?php
session_start();
session_unset(); // ลบข้อมูลใน session
session_destroy(); // ทำลาย session

// ย้ายไปหน้า login.php หลังจาก logout
header("Location: login.php");
exit();
?>
