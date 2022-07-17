<?php
if (isset($_POST['ssend'])) {
    $hsname = $_POST['sname'];
    $hsmail = $_POST['semail'];
    $hssub = $_POST['ssubject'];
    $hstarea = $_POST['stextarea'];
    $conn = mysqli_connect('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
    $htres = mysqli_query($conn, "INSERT INTO supp2(sname,semail,ssub,starea)values('$hsname','$hsmail','$hssub','$hstarea')");
    $conn->close();
    echo "<script>alert('Message sent, thank you for contacting us!')</script>";
    $hsname = $hsmail = $hssub = $hstarea = '';
    echo "<script> window.location.href='support.php'; </script>";
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
    <link href="http://fonts.cdnfonts.com/css/magneto" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/forte" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/berlin-sans-fb-demi" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <title>OM3 Lib - Support</title>



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
    </ul>
    <div style="width: 100%;">
        <div class="jack">
            <div class="form-box2">
                <div class="button-box2">
                    <h2 id="supporttitle" class="col-md-4 offset-4 ">Support</h2>
                    <form method="post" name="support" id="support" action="#">

                        <input type="text" name="sname" minlength="6" maxlength="50" class="input-field" placeholder="Enter your name" value="" required><br>

                        <input type="email" name="semail" minlength="5" maxlength="50" class="input-field" placeholder="Enter your mail" value="" required><br>

                        <input type="text" name="ssubject" minlength="5" maxlength="30" class="input-field" placeholder="Enter the subject" value="" required><br>

                        <textarea name="stextarea" class="input-field" rows="4" cols="91" align="middle" placeholder="Tell us about your problem" value="" required></textarea>

                        <input type="submit" style="margin-top:40px" class="col-md-2 offset-5 submit-btn" id="hsend" name="ssend" value="Send">
                    </form>
                </div>
            </div>
        </div>
    </div>

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