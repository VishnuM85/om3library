<?php
    $name = $email = '';
    $errors = array('uname' => '', 'eemail' => '');
    if (isset($_POST['signup'])) {
        $count = 1;

        $name = $_POST['userid'];

        if (empty($_POST['emailid'])) {
        } else {
            $email = $_POST['emailid'];
            $connect = new mysqli('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
            $user_check_query = "SELECT * FROM logsig WHERE email='$email' LIMIT 1";
            $result = mysqli_query($connect, $user_check_query);
            //$user = mysqli_fetch_assoc($result);
            if ($result->num_rows > 0) {
                echo "<script>alert('Email already exists')</script>";
            } else {
                ++$count;
            }
        }
        $password = $_POST['passwrd'];
        if ($count == 2) {

            if ($connect->connect_error) {
                die('Connection Failed : ' . $connect->connect_error);
                $count = 1;
            } else {
                $regisresult = mysqli_query($connect, "INSERT INTO logsig(nameid,email,pass)values('$name','$email','$password')");
                echo "<script>alert('Registration Successful!')</script>";
                $name = $email = '';
                $connect->close();
                $count = 1;
                echo "<script>window.location.href='logsig.php';</script>";
            }
        }
    }
    session_start();
    $email = '';
    $errors = array('eemail' => '');

    if (isset($_POST['login'])) {

        $email = $_POST['emailid2'];
        $connect = new mysqli('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
        $email_check_query = "SELECT * FROM logsig WHERE email='$email' LIMIT 1";
        $result1 = mysqli_query($connect, $email_check_query);
        $user = mysqli_fetch_assoc($result1);

        if ($result1->num_rows > 0) {
            $password = $_POST['passwrd2'];
            $pass_check_query = "SELECT * FROM logsig WHERE pass='$password' LIMIT 1";
           // echo "<script>alert('Login Successful!')</script>";
            $result2 = mysqli_query($connect, $pass_check_query);
            if ($result2->num_rows > 0) {
                $eemail_check_query = "SELECT * FROM logsig WHERE email='$email'";
                $res = mysqli_query($connect, $eemail_check_query);
                $resch = mysqli_num_rows($res);
                if ($resch > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $_SESSION['idno'] = $row['id'];
                        $_SESSION['username'] = $row['nameid'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['book']=$row['hold'];
                        $_SESSION['password'] = $row['pass'];
                    }
                }
                $email = '';
                echo "<script>alert('Login Successful!')</script>";
                echo "<script>window.location.href='home.php';</script>";
            } else {
                echo "<script>alert('Invalid username/password!')</script>";
            }
        }
    }


    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="https://www.logo.wine/a/logo/Apache_Tomcat/Apache_Tomcat-Logo.wine.svg">
    <link rel="stylesheet" href="./css/ind.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


    <title>OM3 Lib - Login/Signup</title>

    

</head>

<body id="body" class="container-fluid" style="animation-name: example;
animation-duration: 0.2s;
animation-iteration-count: 3;">
    <header class="container-fluid">
        <span>
            <h1 class="mt-4 mb-4" style="font-size:270%; font-family:Magneto; color:#b3ffab;margin-left:20px ; text-align:left;">
                OM<sup><small>3</small></sup> Library <img width="130" src="https://www.logo.wine/a/logo/Apache_Tomcat/Apache_Tomcat-Logo.wine.svg" align="right" style="margin:-15px 5px" /></h1>
        </span>
    </header>
    <ul>
        <li style="float:left;margin-left: -5px;">
            <a id="anav" href="index.html">About us</a>

        </li>
        <li style="float:right;margin-right: 40px;">
            <a id="anav" href="support.php" target="_blank" title="Sign in">Support</a>
        </li>
    </ul>
    <div style="width: 100%;">
        <div class="jack">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Login</button>
                    <button type="button" class="toggle-btn" onclick="regis()">Sign up</button>
                </div>
                <div class="fgrp">
                    <form id="login" class="input-group" method="post" action="">
                        <input type="email" name="emailid2" class="input-field" placeholder="Enter mail" required>
                        <input type="password" name="passwrd2" class="input-field" placeholder="Enter password" required>
                        <input type="submit" name="login" class="submit-btn" value="Sign in">
                    </form>
                    <form id="regis" class="input-group" method="post" action="logsig.php">
                        <input type="text" class="input-field" value="<?php echo $name ?>" name="userid" placeholder="User ID" minlength="6" required>
                        <input type="email" class="input-field" value="<?php echo $email ?>" name="emailid" placeholder="Enter mail" required>
                        <input type="password" class="input-field" name="passwrd" placeholder="Enter password" minlength="6" required>
                        <input type="submit" name="signup" class="submit-btn" value="Sign up">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("regis");
        var z = document.getElementById("btn");

        function regis() {
            x.style.left = '-450px';
            y.style.left = "-333px";
            z.style.left = "125px";
        }

        function login() {
            x.style.left = '17px';
            y.style.left = "117px";
            z.style.left = "0px";
        }
    </script>




</body>
<footer style="background-color:#252525;">
    <div id="ff">
        <p id="foot1" align="middle">Contact us</p>
        <div align="middle">
            <a href="https://www.facebook.com/profile.php?id=100005647128902" target="_blank" title="Facebook" class="fa fa-facebook"></a>
            <a href="https://twitter.com/_v4vishnu_" target="_blank" class="fa fa-twitter" title="Twitter"></a>
            <a href="https://www.instagram.com/_v4vishnu_/" target="_blank" class="fa fa-instagram" title="Instagram"></a>
            <a href="https://www.linkedin.com/in/vishnu-m-6092811a7/" target="_blank" class="fa fa-linkedin" title="Linkedin"></a>
        </div>
    </div>
</footer>

</html>