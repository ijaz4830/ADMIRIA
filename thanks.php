<?php include "server.php"?>
<?php
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="cart.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
$query = "DELETE FROM cart 
                   where uname = '".$_SESSION['username']."'";
mysqli_query($db,$query);
?>
<?php  if (!isset($_SESSION['username'])) : ?>
    <p align="top-right"> <a href="register.php" style="color: greenyellow;padding:0px;
font-size: 13px;
color: black;
text-align:center;
position: absolute;
top: 10px;
right: 10px;"><u>register/login</u></a> </p>
<?php endif ?>

<?php  if (isset($_SESSION['username'])) : ?>
    <p align="top-right" style="color: greenyellow;padding:0px;
font-size: 13px;
color: black;
text-align:center;
position: absolute;
top: -10px;
right: 10px;"><strong><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?></strong></p>
    <p align="top-right"> <a href="index.php?logout='1'" style="color: greenyellow;padding:0px;
font-size: 13px;
color: black;
text-align:center;
position: absolute;
top: 20px;
right: 10px;">logout</a> </p>
<?php endif ?>
<p align="right"> <a href="#cart" style="color: greenyellow;padding: 0px;
font-size: 13px;
color: black;
text-align:center;
position: absolute;
top: 10px;
right: 10px;"><i class="fa fa-basket"></i></a> </p>

<div class="header">

    <p style="font-size: 30px;font-family: 'Agency FB'"><b>ADMIRIA</b></p>
    <p style="font-size: 10px;color: black">Beauty & Frangrances</p>
</div>

<div class="topnav" id="myTopnav">
    <a href="index.php" class="active">Home</a>
    <div class="dropdown">
        <button class="dropbtn">Brands
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="MAC.php" target="_blank">M A C</a>
            <a href="HudaBeauty.php" target="_blank">HUDA BEAUTY</a>
            <a href="Nyx.php" target="_blank">NYX</a>
            <a href="Nars.php" target="_blank">NARS</a>
            <a href="Maybelline.php" target="_blank">MAYBELLINE(New York)</a>
            <a href="L'Oreal.php" target="_blank">L'Oreal</a>
            <a href="gucci.php" target="_blank">GUCCI</a>
            <a href="H&M.php" target="_blank">H&M</a>
            <a href="Dior.php" target="_blank">DIOR</a>
            <a href="Chanel.php" target="_blank">CHANEL</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Products
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="Foundations.php" target="_blank">Foundations</a>
            <a href="Highlighter.php" target="_blank">Highlighter</a>
            <a href="eyeliner.php" target="_blank">Eyeliners,Kajal,Mascara</a>
            <a href="Lipsticks.php" target="_blank">Lipsticks</a>
            <a href="Eye_palletes.php" target="_blank">Eye-Pallettes</a>
            <a href="Makeup%20Brush.php" target="_blank">Makeup BRUSH</a>
            <a href="MakeupRemovers.php" target="_blank">Makeup Removers</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Accessories
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="perfumes.php">Perfumes</a>
            <a href="purses.php">Purses</a>
        </div>
    </div>



    <a href="card.html"target="_blank">About</a>

</div>

<p style="color: white">hello</p>
<p style="color: white">hello</p>
<p style="color: white">hello</p>

<center align="center" style="text-align: center;top: 50px">Thank You for shopping with us. Hope You Will Like It.</strong></center>
<center align="center" style="text-align: center;top: 50px">Please Check Your Email For Confirmation.</strong></center>



</body>
</html>