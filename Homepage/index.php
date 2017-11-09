<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMyBanquet</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body class="bdy">
<!-- Checking Session for User -->
<?php

?>
<!-- Ending Session for USer -->
    <nav class="navbar navbar-default navbar-fixed-top cst">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link cst" href="">BookmyBanquet</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right navcss">
                   <!--  <li role="presentation">
                        <a href="#">Book Now</a>
                    </li> -->
                    <li role="presentation">
                        <a href="#aboutusid">About Us</a>
                    </li>
                    <li role="presentation">
                        <a href="#contactusid">Contact Us</a>
                    </li>
                    <li role="presentation" id="calllogin" data-toggle="modal" data-target="#loginmodal">
                        <a href="#" class="Login">
                            <i class="material-icons icon">account_circle</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron bg">
        <h1 class="text-center f">Book My Banquet</h1>
        <div class="modal fade cst" role="dialog" tabindex="-1" id="loginmodal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h2 class="text-center text-primary modal-title">LOGIN</h2>
                    </div>

                    <div class="modal-body">
                        <form class="formcst" method="POST" >
                            <input class="form-control input-lg cst" type="text" placeholder="Enter Mobile Number" name="mobile1">
                            <input class="form-control input-lg" type="password" placeholder="Enter Password" name= "pass1">
                            <input class="btn btn-primary btn-block btn-lg cst" type="submit" name="login1" value="Login">
                            <h2 class="text-center text-primary">Sign Up</h2>
                        </form>
                        <!-- Trying php for form validation -->
                        <?php
                             include("server.php");
                                if (!isset($_SESSION)){
                                    session_start();
                                }
                                if ( isset( $_POST['login1'] )){   
                                $mob = $_POST['mobile1'];           
                                $pass = $_POST['pass1'];
                                $_SESSION['mob']=$mob;
                                $_SESSION['pass']=$pass;
                                $sql_query = "Select * from User where Mobile='$mob' and Password='{$pass}' ";
                                // echo $mob;
                                // echo $pass;
                                $result= $conn->query($sql_query);
                                // $result = mysqli_query($sql_query,$conn);
                                if($result->num_rows > 0){
                                    // echo "<script language='javascript' type='text/javascript' location.href='../LoginPage/index.php'> </script>" ;
                                    $row  = $result->fetch_assoc();
                                    $_SESSION['name'] = $row['Name'];
                                    $_SESSION['email'] = $row['Email'];
                                    $_SESSION['logged'] = true;
                                    // $_SESSION['mob'] = $row['Mobile'];
                                    $test = $_SESSION['name'];
                                     // echo "$test";
                                    // header("location:tryp.php");
                                   header("location:../LoginPage/index.php");
                                }
                                else{
                                    echo "<script language='javascript' type='text/javascript'>alert('Mobile or Password Incorrect')</script> " ;
                                }
                            }
                        ?>
                        <!-- Ending php -->
                        <form  class="formcst" method="POST">
                            <input class="form-control input-lg cst" type="text" placeholder="Enter Your Name" name = "name1">
                            <input class="form-control input-lg cst" type="text" placeholder="Enter Mobile Number" name="mobile2">
                            <input class="form-control input-lg cst" type="email" placeholder="Enter Email " name="email1">
                            <input class="form-control input-lg cst" type="password" placeholder="Enter Password" name="pass2">
                            <input class="btn btn-primary btn-block btn-lg cst" type="submit" name="signup" value="Signup">
                        </form>
                        <!-- Starting Signup PHP -->
                        <?php
                            include("server.php");
                            if (isset($_POST['signup'])) {
                                $mob = $_POST['mobile2'];
                                $name = $_POST['name1'];
                                $pass = $_POST['pass2'];
                                $email = $_POST['email1'];
                                $sql_query = "Select * from User where Mobile ='$mob' ";
                                $result = $conn->query($sql_query);
                                echo $result->num_rows;
                                if ($result->num_rows == 0 ) {
                                    //insertion for a new user
                                        echo "$name $mob $email $pass";
                                     $sql = "Insert into User values ('{$name}','{$mob}','{$email}','{$pass}')";
                                     $res = $conn->query($sql);
                                     echo "result is $res";
                                     if (!$res){
                                        echo "User not created ";
                                     }
                                     else{
                                        echo "<script language='javascript' type='text/javascript'>alert('User Successfully Created!! Please Login.')</script>";
                                         // header("location:index.php");
                                     }

                                }
                                else{
                                        echo "<script language='javascript' type='text/javascript'>alert('User Already Exists.')</script>";
                                }
                            }
                        ?>
                        <!-- Ending Signup PHP -->
                    </div>

                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="carousel slide c" data-ride="carousel" id="carousel-1">
        <div class="carousel-inner" role="listbox">
            <div class="item active"><img class="img-responsive a" src="assets/img/try3.jpg" alt="Slide Image"></div>
            <div class="item"><img class="img-responsive a" src="assets/img/try2.jpg" alt="Slide Image"></div>
            <div class="item"><img class="img-responsive a" src="assets/img/try1.jpg" alt="Slide Image"></div>
        </div>
        <div><a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i><span class="sr-only">Previous</span></a>
            <a class="right carousel-control" href="#carousel-1" role="button" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i><span class="sr-only">Next</span></a>
        </div>
        <ol class="carousel-indicators">
            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2"></li>
        </ol>
    </div>

    <h2 class="text-uppercase text-center contact">Our Few events</h2>

    <div class="container c">
        <div class="col-md-4 cld12">
            <div class="thumbnail"><img src="assets/img/img1.jpg"></div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail"><img src="assets/img/img2.jpg" class="img11"></div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail"><img src="assets/img/img3.jpg" class="img11"></div>
        </div>
    </div>

    <div class="container c">
        <div class="col-md-4 cld12">
            <div class="thumbnail"><img src="assets/img/img4.jpg" class="img11"></div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail"><img src="assets/img/img5.jpg" class="img11"></div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail"><img src="assets/img/img6.jpg" class="img11"></div>
        </div>
    </div>

    <h2 class="text-uppercase text-center contact">Meet our employees</h2>
    <div class="container c">
        <div class="col-md-3 cld12">
            <div class="thumbnail"><img src="assets/img/decorator2.jpg" class="img12"></div>
        </div>
        <div class="col-md-3">
            <div class="thumbnail"><img src="assets/img/decorator3.jpg" class="img12"></div>
        </div>
        <div class="col-md-3">
            <div class="thumbnail"><img src="assets/img/id2.jpg" class="img12"></div>
        </div>
        <div class="col-md-3">
            <div class="thumbnail"><img src="assets/img/decorator4.jpg" class="img12"></div>
        </div>
    </div>
    <div class="container" id="contactusid">
        <h2 class="text-uppercase text-center contact" id="contactus"><strong>Contact Us</strong></h2>
        <form class="cntfrm">
            <input class="form-control input-lg emil" type="text" placeholder="Enter your Email" >
            <textarea class="form-control input-lg emil" placeholder="Enter Your Query" ></textarea>
            <button class="btn btn-primary btn-block btn-lg contactbtn" type="submit">Contact Us</button>
        </form>
    </div>
    <div class="container ct">
        <h2 class="text-uppercase text-center text-primary abut" id="aboutusid">About us</h2>
        <img src="assets/img/decorator4.jpg" class="aboutus">
        <p class="lead text-center conte">
            <strong><em>We try to make your memorable events wonderful and complete..... Book My Banquet</em></strong>
        </p>
    </div>

    <footer>
        <div>
            <h4 class="text-left text-muted bg-info">An ISO9000 Company</h4>
        </div>
    </footer>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>


</html>