<?php
session_start();

$username = "";
$email    = "";
$errors = array();
$uname = "";
$tag = "";


$db = mysqli_connect('localhost', 'root', '', 'admiria');


// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM access WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }


    if (count($errors) == 0) {
        $password = md5($password_1);

        $query = "INSERT INTO access (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $uname = $_SESSION['username'];
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}




// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM access WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $uname = $_SESSION['username'];
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}











//////////////////add to cart


if (isset($_POST['1'])) {

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Nars 12 Matte Shades';
    $price = 12;
    $uname = $_SESSION['username'];

    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db, $query);
}
}
if (isset($_POST['2'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'NYX Ultimate';
    $price = 9;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['3'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Huda Beauty
Rose Golden edition';
    $price = 17;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['4'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'C H A N E L
Summer box';
    $price = 18;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['5'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'D I O R
High Ends 25';
    $price = 3;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['6'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Gucci Colors';
    $price = 14;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['7'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'H&M Metallic';
    $price = 10;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['8'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'LA Pallete GOLD';
    $price = 17;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['9'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'MAC Eyes';
    $price = 25;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['10'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'M A Y B E L L I N E
Burgandy Bar';
    $price = 21;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['11'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Channel_eyes11';
    $price = 15;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['12'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'D I O R
eyes22';
    $price = 12;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['13'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'G U C C I
eyes33

';
    $price = 19;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['14'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'h & M
eyes44';
    $price = 11;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['15'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Huda Beauty
eyes505

';
    $price = 17;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['16'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Loreal Paris
eyes66

';
    $price = 14;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['17'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'M ~ A ~ C
eyes100';
    $price = 22;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['18'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'M A Y B E L L I N E
eyes77

';
    $price = 20;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['19'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'N A R S
eyes88

';
    $price = 17;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['20'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'N Y X
eyes99';
    $price = 14;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['21'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'NYX_Natural';
    $price = 31;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['22'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'N A R S_fiji
Natural Base';
    $price = 26;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['23'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'C H A N E L_22Rose
LES BEIGES';
    $price = 41;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['24'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'M ~ A ~ C_NC20
Studio Fix Fluid';
    $price = 38;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['25'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Loreal n2
True Match Foundation';
    $price = 29;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['26'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'HudaBeauty_food110N';
    $price = 40;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['27'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'H&M_Pinky';
    $price = 22;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['28'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'G U C C I_050';
    $price = 45;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['29'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'DIOR SKIN';
    $price = 35;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['30'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'M A Y B E L L I N E
Nautral Coverage';
    $price = 34;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['31'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Gucci_103';
    $price = 7;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['32'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Camelia De Plumes';
    $price = 5;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['33'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'M A Y B E L L I N E_108';
    $price = 7;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['34'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'MAC Minerise';
    $price = 7;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['35'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Loreal_106
Crushed Foil';
    $price = 4;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['36'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Huda Beauty
Pink Sands';
    $price = 9;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['37'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'H&M_104
Sparkiling Purple';
    $price = 3;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['38'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'N Y X_201
Mosaic Powder';
    $price = 6;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['39'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'N A R S_109
Highlighting Blush Powder';
    $price = 11;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['40'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'D I O R_102
Duals';
    $price = 5;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['41'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'N Y X
lipsH9H

';
    $price = 31;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['42'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'N A R S
lipsG9G';
    $price = 24;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['43'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'M A Y B E L L I N E
LipsF9F';
    $price = 29;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['44'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'M ~ A ~C
RoobyWoo';
    $price = 40;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['45'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Loreal
lipsE9E';
    $price = 36;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['46'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Huda Beauty
lipsD9D

';
    $price = 43;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['47'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'H&M
lipsC9C

';
    $price = 21;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['48'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'G U C C I
lipsB9B';
    $price = 51;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['49'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'D I O R
lipsA9A';
    $price = 43;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['50'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'C H A N E L
lips999

';
    $price = 33;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['51'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'N Y X
brushPPP';
    $price = 70;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['52'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Huda Beauty
BrushEEE';
    $price = 68;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['53'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'M A Y B E L L I NE
brushNNN';
    $price = 65;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['54'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'M ~ A ~ C
MbrushGGG';
    $price = 85;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['55'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Loreal Paris
brushFFF';
    $price = 59;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['56'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'D I O R
brushBBB';
    $price = 60;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['57'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'H&M
brushDDD

';
    $price = 45;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['58'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'G U C C I
brushCCC';
    $price = 45;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['59'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'C H A N E L
brushAAA

';
    $price = 63;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['60'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'N A R S
brushMMM';
    $price = 62;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['61'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'N Y X
remoBWCW.';
    $price = 2;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['62'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'N A R S
remo9090';
    $price = 3;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['63'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'M A Y B E L L I N E
remoPOPO';
    $price = 5;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['64'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'M ~ A ~ C
remo8080';
    $price = 6;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['65'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Loreal Paris
remo7070';
    $price = 2;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['66'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Huda Beauty
remoQAQM';
    $price = 3;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['67'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'H & M
remo6060';
    $price = 4;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['68'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'G U C C I
remo5050';
    $price = 3;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['69'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'D I O R
remo4040';
    $price = 6;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['70'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'C H A N E L
remo3030';
    $price = 3;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['71'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'ANNIE JUSTIN (AJ)';
    $price = 120;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['72'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'Beyonce Heat';
    $price = 89;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['73'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'C H L O E';
    $price = 117;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['74'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'D I O R
Jadore202';
    $price = 205;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['75'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'G U C C I
perfume8888';
    $price = 138;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['76'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'LeFemme
perfume1212

';
    $price = 69;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['77'])) {if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'O P I U M
perfume201';
    $price = 76;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);

}
}
if (isset($_POST['78'])) 
{if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
else {
    $name = 'T O N I Q
Gray Glitter';
    $price = 58;
    $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
    mysqli_query($db,$query);


}
}
if (isset($_POST['79'])) {
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    } else {
        $name = 'Berry Pecker
Wedding Collection

';
        $price = 65;
        $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
        mysqli_query($db, $query);

    
}
}
if (isset($_POST['80'])) {
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    } else {
        $name = 'Louis Vuitton
Summer coll';
        $price = 92;
        $uname = $_SESSION['username'];
    $query = "INSERT INTO cart (uname,prname,price) 
  			    VALUES('$uname','$name','$price')";
        mysqli_query($db, $query);
}
}





if (isset($_POST['send'])) {
    $name = $_POST['firstname'];
    $mail = $_POST['email'];
    $addr = $_POST['address'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $card = $_POST['cardnumber'];
    $exp = $_POST['expyear'];
    $cvv = $_POST['cvv'];
    $tag = $_SESSION['username'];
    $uname = $_SESSION['username'];
    $email = 'admiria.2013@gmail.com';
    $query = "INSERT INTO memo(tag,bname,bmail,baddr,bstate,bzip,bnum,byear,bcvv) 
  			    VALUES('$tag','$name','$mail','$addr','$state','$zip','$card','$exp','$cvv')";
    mysqli_query($db,$query);

    mail( "$mail", "Confirmation Mail ", "Hello $name, Your order has been shipped.The products will be delivered to you within 3 working days to: $addr, $state,-$zip. Mention your phone number to the delivery person to confirm identity. Thank You For Shopping With Us.  ", "From: Admiria <$email>");
    header('location: memo.php');

}




if (isset($_POST['search'])) {
    $min = $_POST['min'];
    $max = $_POST['max'];
    $result = mysqli_query($db,"SELECT * FROM products WHERE price BETWEEN  $min AND $max");
    $all_property = array();  //declare an array for saving property

//showing property
    echo '<table class="data-table">
        <tr class="data-heading">';  //initialize table tag
    while ($property = mysqli_fetch_field($result)) {
        echo '<td>'    .$property->name.   '</td>';  //get field name for header
        array_push($all_property, $property->name);  //save those to array
    }
    echo '</tr>';

//showing all data
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        foreach ($all_property as $item) {
            echo '<td>'. $row[$item] .'</td>'; //get items using property value
        }
        echo '</tr>';
    }
    echo "</table>";
}
?><html>

<STYLE>
    body {
        font-size: 19px;
        background: white;
    }
    table{
        width: 50%;
        margin: 30px auto;
        border-collapse: collapse;
        text-align: left;
    }
    tr {
        border-bottom: 1px solid ;
        color: black;
    }
    th, td{
        border: none;
        height: 30px;
        padding: 2px;
        color: black;
    }
    tr:hover {
        background: blueviolet;
    }
</STYLE>
<body>
</body>
</html>