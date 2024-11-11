<?php
session_start();
include("connect.php");

$isLoggedIn = isset($_SESSION['username']);
$username = $isLoggedIn ? $_SESSION['username'] : '';
?>


<!DOCTYPE html>
<html long="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </mata>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="index.js" defer></script>

    <title>ENANKO Photo</title>
    <link rel="stylesheet" href="index.css ">

<body>
    <nav>
        <div class="nav-container">
            <a href="index.html">
                <img src="./img/logo.png" class="logonav">
            </a>
            <div class="cat-name" style="font-size: 2vw;">ENANKO SHOP</div>
            <button class="btnt-contact" onclick="window.location.href='contact.html'">Contact</button>
            <div class="nav-profile">
                <p class="nav-profile">Shop</p>
                <div onclick="OpenCart()" style="cursor: pointer;" class="nav-profile-cart">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div id="cartcount" class="cartcount" style="display: none;">
                        0
                    </div>
                </div>

                <?php if (!$isLoggedIn): ?>
                    <button id="signInButton" class="btnt-in" onclick="window.location.href='login.php'">Log out</button>
                <?php else: ?>
                    <button id="logoutButton" onclick="logout()">Logout</button>
                    <p>Welcome, <?php echo htmlspecialchars($username); ?></p>
                <?php endif; ?>

    

            </div>
        </div>
    </nav>



    <div class="container">
        <div class="sidebar">
            <input onkeyup="Search(this)" id="txt_search" type="text" class="sidebar-search"
                placeholder="Search somthing....">

            <a onclick="searchphoto('All')" class="sidebar-item">
                All
            </a>

            <a onclick="searchphoto('Album')" class="sidebar-item">
                Album
            </a>

            <a onclick="searchphoto('BUS')" class="sidebar-item">
                BUS
            </a>

            <a onclick="searchphoto('ENHYPHEN')" class="sidebar-item">
                ENHYPHEN
            </a>

            <a onclick="searchphoto('SEVENTEEN')" class="sidebar-item">
                SEVENTEEN
            </a>

            <a onclick="searchphoto('ATLAST')" class="sidebar-item">
                ATLAST
            </a>
           

        </div>


        <!--ใส่รูป-->
        <div id="productlist" class="product">

            <!--ยังไม่ใส่Detail-->

        </div>
    </div>

    <!--ใส่Detailข้อมูล Card-->
    <div id="modalDesc" class="model" style="display: none;">
        <div onclick="closepic()" class="model-bg"></div>
        <div class="model-page">
            <h2>Detail</h2><br>

            <div class="modeldesc-content">
                <img id="mdd-img" class="modalesc-img" src="img/Wonwoo1.jpg" alt="">
                <div class="modelesc-detail">
                    <p id="mdd-name" style="font-size: 1.6vw;">Product name</p>
                    <p id="mdd-price" style="font-size: 1.2vw; color: #fb6767;">150 THB</p><br>
                    <p id="mdd-desc" style="font-size: 1.2vw ; color: rgb(115, 113, 113);">Their smiles and expressions
                        convey genuine
                        passion and dedication.</p><br>
                    <div class="btn-control">
                        <button onclick="closepic()" class="btn" style="font-size: 1vw;">
                            Close
                        </button>
                        <button onclick="Addtocart()" class="btn btn-buy" style="font-size: 1vw;">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <!--เพิ่มใส่ตะกร้า-->
    <div id="modalCart" class="model" style="display: none;">
        <div onclick="closecart()" class="model-bg"></div>
        <div class="model-page">
            <h2>My cart</h2><br>
            <div id="myCart" class="cartlist">

            </div>
            <div class="btn-control">
                <button onclick="closecart()" class="btn">
                    Cancel
                </button>
                <button onclick="proceedToPayment()" class="btn btn-buy">
                    Buy
                </button>
            </div>
        </div>


</html>