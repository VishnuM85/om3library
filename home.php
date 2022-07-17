<?php
session_start();
if (empty($_SESSION['username'])) {
    $sname = $sid = $semail = $starid = $sbook = '';
} else {
    $sname = $_SESSION['username'];
    $ssid = $_SESSION['idno'];
    $sid = $_SESSION['idno'];
    $semail = $_SESSION['email'];
    $sbook = $_SESSION['book'];
}
$borbook = $retbook = '';
if (isset($_POST['returnsub'])) {
    if (empty($_SESSION['username'])) {
        echo "<script> window.location.href='logsig.php'; </script>";
    } else {
        $ssid = $_SESSION['idno'];
        if (empty($_POST['retbooknum'])) {
            echo "<script>alert('Enter a book number!')</script>";
        } else {
            $yes = 'yes';
            $no = 'no';
            $umm = 0;
            $retbook = $_POST['retbooknum'];
            $connect = new mysqli('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
            $id_que = "SELECT * FROM books WHERE user='$ssid' AND id='$retbook' LIMIT 1";
            $resret = mysqli_query($connect, $id_que);
            $userret = mysqli_fetch_assoc($resret);
            if ($resret->num_rows > 0) {
                $query12 = "UPDATE `books` SET avail='$yes',user='$umm' where id='$retbook'";
                $query_run12 = mysqli_query($connect, $query12);
                if ($query_run12) {
                    $holdq2 = mysqli_query($connect, "UPDATE `logsig` SET hold='$umm' WHERE id='$ssid'");
                    if ($holdq2) {
                        $check_query = "SELECT * FROM logsig WHERE id='$ssid'";
                        $res = mysqli_query($connect, $check_query);
                        $resch = mysqli_num_rows($res);
                        if ($resch > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $_SESSION['book'] = $row['hold'];
                            }
                            $sbook = $_SESSION['book'];
                            echo "<script>alert('Return Successful.')</script>";
                            echo "<script> window.location.href='home.php'; </script>";
                        }
                    }
                } else {
                    echo "<script>alert('Please enter the book num that you have borrowed.')</script>";
                }
            } else {
                echo "<script>alert('You don't have any book to return')</script>";
            }
            $retbook = $ssid = '';
            $connect->close();
        }
    }
}

if (isset($_POST['borrowsub'])) {
    if (empty($_SESSION['username'])) {
        echo "<script> window.location.href='logsig.php'; </script>";
    } else {
        $ssid = $_SESSION['idno'];
        if (empty($_POST['borbooknum'])) {
            echo "<script>alert('Enter a book number!')</script>";
        } else {
            $yes = 'yes';
            $no = 'no';
            $borbook = $_POST['borbooknum'];
            $connect = new mysqli('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
            $id_query = "SELECT * FROM books WHERE user='$ssid' LIMIT 1";
            $res = mysqli_query($connect, $id_query);
            $user2 = mysqli_fetch_assoc($res);
            if ($res->num_rows > 0) {
                echo "<script>alert('Return the previous book!')</script>";
            } else {
                $user_check_query = "SELECT * FROM books WHERE id='$borbook' AND avail='$yes' LIMIT 1";
                $result = mysqli_query($connect, $user_check_query);
                $user = mysqli_fetch_assoc($result);
                if ($result->num_rows > 0) {
                    $query1 = "UPDATE `books` SET avail='$no',user='$ssid' where id='$borbook'";
                    $query_run1 = mysqli_query($connect, $query1);
                    if ($query_run1) {
                        $holdq = mysqli_query($connect, "UPDATE `logsig` SET hold='$borbook' WHERE id='$ssid'");
                        if ($holdq) {
                            $check_query = "SELECT * FROM logsig WHERE id='$ssid'";
                            $res = mysqli_query($connect, $check_query);
                            $resch = mysqli_num_rows($res);
                            if ($resch > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $_SESSION['book'] = $row['hold'];
                                }
                                $sbook = $_SESSION['book'];
                            }
                            echo "<script>alert('Borrow Successful.')</script>";
                            echo "<script> window.location.href='home.php'; </script>";
                        }
                    }
                } else {
                    echo "<script>alert('No books found with that book number / other user might having that book.')</script>";
                }
            }
            $borbook = $ssid = '';
            $connect->close();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <title>OM3 Lib - Home</title>

</head>

<body id="body" class="container-fluid">
    <header class="container-fluid">
        <span>
            <h1 class="mt-4 mb-4" style="font-size:270%; font-family:Magneto; color:#b3ffab;margin-left:20px ; text-align:left;">
                OM<sup><small>3</small></sup> Library <img width="130" src="https://www.logo.wine/a/logo/Apache_Tomcat/Apache_Tomcat-Logo.wine.svg" align="right" style="margin:-15px 5px" /></h1>
        </span>
    </header>
    <ul>
        <li style="float:left;">
            <a id="anav" href="#" data-toggle="modal" data-target="#modal1">Books List</a>
        </li>
        <p style="float:left;margin: 0px 5px;">|</p>
        <li style="float:left;">
            <a id="anav" href="support.php" target="_blank">Support</a>
        </li>
        <li style="float:right;margin-right: 35px;">
            <?php
            if (isset($_SESSION['username'])) {
                echo "
                <a id='anav' href='logout.php' title='Sign out'>Log out</a>";
            } else if (!isset($_SESSION['username'])) {
                echo "
                <a id='anav' href='logsig.php' title='Sign in'>Log in</a>";
            }

            ?>
        </li>
        <p style="float:right;margin-right: 5px;">|</p>
        <li style="float:right;margin-right: 5px;">
            <a id="anav" href="#" data-toggle="modal" data-target="#modal4">Profile</a>
        </li>
    </ul>
    <div class="col-md-10 offset-1 text-center mt-5 pt-2">
        <a id="borret" class="btn btn-primary mr-2" href="#read1" role="button">Read</a>|<a id="borret" class="btn btn-primary ml-2 mr-2" href="#" data-toggle="modal" data-target="#modal2" role="button">Borrow</a>

        <!--<h1 id="he1" class=""><span>Welcome author!</span></h1>-->
    </div>
    <div class="wrap2 col-md-10 offset-1 mt-0 border-bottom border-secondary">
        <h2 class="sm-head2 mt-5 mb-5" style="font-family: Elephant;">Explore Om<small><b><sup>3</sup></b></small>
            Library and savour the beyond knowledge</h2>
        <div id="cfade" class="carousel slide carousel-fade mb-5" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://qphs.fs.quoracdn.net/main-qimg-ff43d86fb71e339b408f856481eb7ffe-lq" class="img-fluid d-block w-100 h-auto">
                    <div class="carousel-caption d-none d-md-block">
                        <p>Libraries store the energy that fuels the imagination.
                            They open up windows to the world and inspire us to explore and achieve,
                            and contribute to improving our quality of life.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://qphs.fs.quoracdn.net/main-qimg-376b816e6be9c16bc3998f2001de1ba0-lq" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <p>Everything you need for better future and success has already been written.
                            And guess what? All you have to do is go to the library.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://qphs.fs.quoracdn.net/main-qimg-55e5a51996021cc43872bda00e1861dc-lq" class="d-block w-100">
                    <div class="carousel-caption d-none d-md-block">
                        <p>Nothing is pleasanter than exploring a library.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#cfade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#cfade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="wrap2 col-md-10 offset-1 mt-0 border-bottom border-secondary">
        <h2 class="sm-head2 mt-5 mb-5" style="font-family: Elephant;">Top chart this week!</h2>
        <div class="card-deck mb-5">
            <div class="card border-0 bg-dark shadow rounded">
                <img class="card-img-top" src="https://qphs.fs.quoracdn.net/main-qimg-2399eb360969520dbe8087d3ce90a4fd-lq">
                <div class="card-body text-muted ">
                    <h4 class="card-title">PRIDE AND PREJUDICE</h4>
                    <h6 class="card-text ">Jane Austen</h6>
                </div>
            </div>
            <div class="card bg-dark border-0 shadow rounded">
                <img class="card-img-top" src="https://qphs.fs.quoracdn.net/main-qimg-23fea25c8677ce80e6d97b0cc50848f6-lq">
                <div class="card-body text-muted">
                    <h4 class="card-title">A STUDY IN SCARLET</h4>
                    <h6 class="card-text ">Sir Arthur Conan Doyle</h6>
                </div>
            </div>
            <div class="card bg-dark border-0 shadow rounded">
                <img class="card-img-top" src="https://qphs.fs.quoracdn.net/main-qimg-dc0c29381caff9a34310ed6be83ee2a0-lq">
                <div class="card-body text-muted">
                    <h4 class="card-title">DUNE</h4>
                    <h6 class="card-text fs-10">Frank Herbert</h6>
                </div>
            </div>
        </div>
    </div>
    <div id="read1" class="col-md-10 offset-1 mt-3 pb-5 border-bottom border-secondary">
        <section class="container-fluid d-flex">
            <div class="mt-5">
                <img height="450px" width="650px" src="https://qphs.fs.quoracdn.net/main-qimg-8a05d32faa5c334fa97f57e78ac297ae" alt="">
            </div>
            <div class="mt-5">
                <h2 style="font-family: Elephant;"> Read Articles</h2>
                <p>There are enough articles on this site to fill multiple books,
                    so it can sometimes be daunting to know where to start.
                    Below are what many consider to be the best articles that have been the most popular,
                    the most shared, or had the greatest effect on readers' lives.
                </p>
                <!-- articles accordion  -->
                <div class="accordion " id="accordionExample">
                    <div class="accordion-item border-0
                    ">
                        <h2 class="accordion-header " id="headingTwo">
                            <button id="but1" class="accordion-button  collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">»&ensp;The Mark of a Servant Leader</button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse  collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body border-top border-secondary">“Meaningful relationships are what
                                matter most.
                                Showing the people around you that you care about them and that you're willing to put
                                them first,
                                is the mark of a true leader. Great leaders are vulnerable and unselfish. Ultimately,
                                they thrive by exhibiting this behavior and in so doing,
                                they earn the respect of all.”</div>
                        </div>
                    </div>
                    <div class="accordion-item border-0
                    ">
                        <h2 class="accordion-header" id="headingTwo">
                            <button id="but1" class="accordion-button collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">»&ensp;Shift Small Habits for Big Wins</button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body border-top border-secondary">"If you look at culture change as a
                                series of successful habit shifts,
                                the process of making it a reality starts to feel more achievable.
                                The impact of one small change across every team in your organization means hundreds or
                                thousands of interactions shifting to align with the culture you want.
                                It's not simple, but there are practical approaches you can take to move the needle."
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0
                    ">
                        <h2 class="accordion-header" id="headingTwo">
                            <button id="but1" class="accordion-button collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">»&ensp;Take It Easy On Yourself</button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body border-top border-secondary">"I don’t know about you, but balance
                                in life makes it easier.
                                If you like to chill a lot, try to mix it up with more hustle. If you’re the opposite,
                                try to find pauses during the day. The more you experiment, the better you understand my
                                intuition says."</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="read2" class="col-md-10 offset-1 mt-3 pb-5 mb-5 border-0 border-secondary">
        <section class="container-fluid d-flex">
            <div class="mt-5">
                <h2 style="font-family: Elephant;"> Read Newsletter</h2>
                <p>The ongoing Russian invasion of Ukraine has prompted the United States
                    and other western countries to impose hard sanctions of Russia and the European Union (EU)
                    has also been trying to decrease oil and gas imports from the country.
                </p>

                <!-- newsletter accordion -->
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item border-0
                    ">
                        <h2 class="accordion-header" id="headingTwo">
                            <button id="but1" class="accordion-button collapsed btn btn-outline-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">»&ensp;Plane carrying 126 people catches fire after crash
                                landing at US airport.</button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body border-top border-secondary">A Red Air plane carrying 126 people
                                caught fire after crash landing at Miami International Airport.
                                The plane's landing gear collapsed as it approached the runway. As per officials,
                                three people suffered minor injuries in the crash landing and the subsequent fire.
                                A video posted online shows flames and smoke billowing out from near the wing of the
                                aircraft.</div>
                        </div>
                    </div>
                    <div class="accordion-item border-0
                    ">
                        <h2 class="accordion-header" id="headingTwo">
                            <button id="but1" class="accordion-button collapsed btn btn-outline-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">»&ensp;David Warner becomes second cricketer to get out
                                stumped on 99 in ODI history.</button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body border-top border-secondary">Australia opener David Warner on
                                Tuesday became the second cricketer
                                after former India batter VVS Laxman to get out stumped on 99 in ODI history.
                                Warner was stumped on 99(112) by Sri Lanka's Niroshan Dickwella on the bowling of
                                Dhananjaya de Silva
                                in the fourth ODI in Colombo. Laxman was stumped on 99(110) against West Indies in
                                Nagpur in 2002.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0
                    ">
                        <h2 class="accordion-header" id="headingTwo">
                            <button id="but1" class="accordion-button collapsed btn btn-outline-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseTwo">»&ensp;Musk's $44 bn deal in 'best interests' of Twitter &
                                its shareholders, says its board</button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body border-top border-secondary">Twitter's board has recommended that
                                shareholders vote in favour of the proposed
                                $44 billion sale of the company to billionaire Elon Musk, a regulatory filing showed on
                                Tuesday.
                                The social media giant's board of directors has unanimously determined that the merger
                                agreement is
                                "advisable and in the best interests of Twitter and its stockholders", the filing
                                showed.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <img height="500px" width="700px" src="https://qphs.fs.quoracdn.net/main-qimg-c2a463559c283ff084e82bc127ad1201">
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal1" tabindex="1" role="dialog" aria-labelledby="modal1title" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered text-center" role="document" id="mod1">
            <div class="modal-content text-center" id="moc1">
                <div class="modal-header text-center border-0 align-center" id="moh1">
                    <button type="button" id="mod1but" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!--   <h3 class="title" id="modal1ltitle">Books List</h3>-->
                <div class="modal-body">
                    <div id="bbor" class="mt-3 ml-3 mb-4 mr-3">
                        <table id="tb1" class="table table-borderless text-dark col-md-10 offset-1">
                            <thead>
                                <h4 id="bna" class="mb-3">Romantic</h4>
                            </thead>
                            <tr>
                                <th scope="col">Book No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Author</th>
                                <th scope="col">Availablity</th>
                            </tr>
                            <?php

                            $conn = mysqli_connect('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
                            $tab = "SELECT id,bname,author,avail FROM books WHERE genre='rom' ORDER BY id ASC";
                            $re = $conn->query($tab);
                            if ($re->num_rows > 0) {
                                while ($ro = $re->fetch_assoc()) {
                                    echo "<tr style='font-size:90%;'><td>" . $ro['id'] . "</td><td>" . $ro['bname'] . "</td><td>" . $ro['author'] . "</td><td>" . $ro['avail'] . "</td></tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                            }
                            $conn->close();
                            ?>
                        </table>
                    </div>
                    <div id="bbor" class="mt-5 ml-3 mb-4 mr-3">
                        <table id="tb1" class="table table-borderless text-dark col-md-10 offset-1">
                            <thead>
                                <h4 id="bna" class="mb-3">Fantasy</h4>
                            </thead>
                            <tr>
                                <th scope="col">Book No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Author</th>
                                <th scope="col">Availablity</th>
                            </tr>
                            <?php

                            $conn = mysqli_connect('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
                            $tab = "SELECT id,bname,author,avail FROM books WHERE genre='fan' ORDER BY id ASC";
                            $re = $conn->query($tab);
                            if ($re->num_rows > 0) {
                                while ($ro = $re->fetch_assoc()) {
                                    echo "<tr style='font-size:90%;'><td>" . $ro['id'] . "</td><td>" . $ro['bname'] . "</td><td>" . $ro['author'] . "</td><td>" . $ro['avail'] . "</td></tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                            }
                            $conn->close();
                            ?>
                        </table>
                    </div>
                    <div id="bbor" class="mt-5 ml-3 mb-4 mr-3">
                        <table id="tb1" class="table table-borderless text-dark col-md-10 offset-1">
                            <thead>
                                <h4 id="bna" class="mb-3"><em><b>Science Fiction</b></em></h4>
                            </thead>
                            <tr>
                                <th scope="col">Book No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Author</th>
                                <th scope="col">Availablity</th>
                            </tr>
                            <?php

                            $conn = mysqli_connect('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
                            $tab = "SELECT id,bname,author,avail FROM books WHERE genre='scfi' ORDER BY id ASC";
                            $re = $conn->query($tab);
                            if ($re->num_rows > 0) {
                                while ($ro = $re->fetch_assoc()) {
                                    echo "<tr style='font-size:90%;'><td>" . $ro['id'] . "</td><td>" . $ro['bname'] . "</td><td>" . $ro['author'] . "</td><td>" . $ro['avail'] . "</td></tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                            }
                            $conn->close();
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal2" tabindex="1" role="dialog" aria-labelledby="modal2title" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered text-center" role="document" id="mod2">
            <div class="modal-content text-center" id="moc2">
                <div class="modal-header text-center border-0 align-center" id="moh2">
                    <h3 class="title" id="modal2ltitle">Borrow Books</h3>
                    <button type="button" id="mod2but" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <p id="mutedtext">Check the book numbers in books list menu to borrow. To return the book got to profile.</p>
                <div class="modal-body">
                    <div id="baid" class="text-left ml-3">
                        Name: &emsp;&ensp;<span style="color: #000;font-weight:bold;"><?php echo $sname ?></span><br>
                        ID no:&emsp;&emsp;<span style="color: #000;font-weight:bold;"><?php echo $sid ?></span><br>
                    </div>
                    <div class="text-left">
                        <form method="post" name="borrowbooks" id="borrowbooks" action="home.php">

                            <label for="borbooknum" style="font-size:90%;" id="baid" class="text-left ml-3">Book no:</label><br>
                            <input id="borrnum" type="tel" name="borbooknum" class="col-md-10 offset-1 mb-2 mt-1" minlength="8" maxlength="8" placeholder="Enter book number to borrow" value="<?php echo $retbook ?>">
                            <p id="prompts" class="ml-5" style="font-size:80%;"></p>

                            <input type="submit" style="margin-top:px" class="col-md-4 offset-4" id="borsub" name="borrowsub" value="Borrow">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal4" tabindex="1" role="dialog" aria-labelledby="modal4title" aria-hidden="true">
        <div class="modal-dialog modal-mg modal-dialog-centered text-center" role="document" id="mod4">
            <div class="modal-content text-center" id="moc4">
                <div class="modal-header text-center border-0 align-center" id="moh4">
                    <h3 class="title" id="modal4ltitle">Profile</h3>
                    <button type="button" id="mod4but" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <p id="mutedtext" class="ml-3 mr-3">Check the books that are with you and return later. To borrow books go to borrow.</p>
                <div id="jaffa" class="modal-body">
                    <div id="baid" class="text-left ml-3">
                        Name: &emsp;&emsp;&emsp;&emsp;<span style="color: #000;font-weight:bold;"><?php echo $sname ?></span><br>
                        ID no:&emsp;&emsp;&emsp;&ensp;&emsp;<span style="color: #000;font-weight:bold;"><?php echo $sid ?></span><br>
                        E-mail Id:&emsp;&emsp;&emsp;<span style="color: #000;font-weight:bold;"><?php echo $semail ?></span><br>
                        Books with me:&ensp;<span style="color: #000;font-weight:bold;"><?php echo $sbook ?></span><br><br>
                    </div>
                    <div class="text-left">
                        <form method="post" name="returnbooks" id="returnbooks" action="home.php">

                            <input id="retnum" type="tel" class="col-md-10 offset-1" name="retbooknum" minlength="8" maxlength="8" placeholder="Enter book number to return" value="<?php echo $retbook ?>">
                            <p id="prompts" class="ml-5" style="font-size:80%;"></p><br>

                            <input type="submit" style="margin-top:px" class="col-md-4 offset-4 mb-2" id="retsub" name="returnsub" value="Return">
                        </form>
                    </div>
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