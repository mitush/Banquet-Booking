<!DOCTYPE html>
<html>
<?php
    include("../Homepage/server.php");
    if (!isset($_SESSION)){
             session_start();
    }
    if (!isset($_SESSION['logged']) || $_SESSION['logged']==false){
        header("location:../Homepage/index.php");
    }
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="">BookmyBanquet</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="#contactusid">Contact Us</a></li>
                    <li role="presentation"><a href="logout.php">Logout </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- trying modal -->
    <div class="jumbotron bg">
        <h1 class="text-center f">Book My Banquet</h1>
        <div class="modal fade cst" role="dialog" tabindex="-1" id="bookmodal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h2 class="text-center text-primary modal-title">Enter Details</h2></div>
                    <div class="modal-body">
                    <center>
                        <form class="formcst" method="POST" action="" >

                            <ul style="list-style: none;">
                                 <li class="text-info">State *</li>

                                 <li>
                                    <input type="text" name="state" placeholder="" value="" >
                                 </li>
                                 <div class="clear"></div>
                             </ul>
                             <ul style="list-style: none;">
                                 <li class="text-info">City *</li>
                                 <li><input type="text" name="city" placeholder="" value= "" >
                                 </li>
                                 <div class="clear"></div>
                             </ul>

                            <ul style="list-style: none;">
                                 <li class="text-info">Full Name *</li>
                                 <?php 
                                    session_start();
                                    $test = $_SESSION['name'];
                                 echo '
                                 <li><input type="text" name="name" placeholder= "'.$test.'" readonly></li>
                                 ';
                                 ?>
                                 <div class="clear"></div>
                             </ul>
                             <ul style="list-style: none;">
                                 <li class="text-info">Email ID *</li>
                                 <?php
                                 session_start();
                                    $test = $_SESSION['email'];
                                 echo '
                                 <li><input type="text" name="email" placeholder="'.$test.'" readonly></li>
                                 ';
                                 ?>
                                 <div class="clear"></div>
                             </ul>
                             <ul style="list-style: none;">
                                 <li class="text-info">Phone Number *</li>
                                 <?php
                                 session_start();
                                    $test = $_SESSION['mob'];
                                 echo '
                                 <li><input type="text" name="phone" placeholder="'.$test.'" readonly></li>
                                 ';?>
                                 <div class="clear"></div>
                             </ul>
                             <ul style="list-style: none;">
                                <li class="text-info">Booking Start Date *</li>
                                <li class="dat"><input name="startdate" placeholder="yyyy-mm-dd" type="date" required=></li>
                                
                                <div class="clear"></div>
                            </ul>
                            <ul style="list-style: none;">
                                <li class="text-info">Booking End Date *</li>
                                <li class="dat"><input name="enddate" placeholder="yyyy-mm-dd" type="date" required=></li>
                                <div class="clear"></div>
                            </ul>
                            <ul style="list-style: none;">
                                <li class="text-info">Your Address *</li>
                                <li><textarea name="address" class="form-control" rows="5"></textarea></li>
                                <div class="clear"></div>
                            </ul>
                             <ul style="list-style: none;">
                                 <li class="text-info">Occasion *</li>
                                 <li class="se">
                                    <select class="time-dropdown form-dropdown validate[required, limitDate]" id="min_15" name="occasion">
                                    <option> Select </option>
                                    <option value="Birthday">Birthday</option>
                                    <option value="Wedding">Wedding</option>
                                    <option value="Engagement">Engagement</option>
                                    <option value="Reception">Reception</option>
                                    <option value="Naming Ceremony">Naming Ceremony</option>
                                    <option value="Cooperate event">Cooperate event</option>
                                    <option value="Family Reunion">Family Reunion</option>
                                    <option value="Anniversary">Anniversary</option>
                                    <option value="Holiday Parties">Holiday Parties</option>
                                    <option value="Others">Others</option>
                                  </select>
                                </li>
                                 <div class="clear"></div>
                             </ul>
                             <ul style="list-style: none;">
                                 <li class="text-info">Number of Guests *</li>
                                 <li class="se"> <select class="time-dropdown form-dropdown validate[required, limitDate]" id="min_15" name="guests">
                                    <option value="0"> Less than 50 </option>
                                    <option value="1"> Less than 100 </option>
                                    <option value="2"> Less than 150 </option>
                                    <option value="3"> Less than 200 </option>
                                    <option value="4"> Less than 250 </option>
                                    <option value="5"> Less than 300 </option>
                                    <option value="6"> Less than 350 </option>
                                    <option value="7"> Less than 400 </option>
                                    <option value="8"> Less than 450 </option>
                                    <option value="9"> Less than 500 </option>
                                    <option value="10"> Less than 1000 </option>
                                    <option value="11"> More than 1000 </option>
                                  </select></li>
                                 <div class="clear"></div>
                             </ul> 
                             <ul style="list-style: none;">
                             <li class="text-info">Additional Information :</li>
                                <li><textarea placeholder="State if you need any additional service you want" name="info" class="form-control" rows="5"></textarea></li>
                            </ul>
<button class="btn btn-primary btn-block btn-lg cst" type="submit" value="Submit" style="margin-bottom:2%;" name ="Enter">Submit</button>
                        </form>
                        <!-- trying php for entering data in database -->
                        <?php 
                            include("../Homepage/server.php");
                            if (!isset($_SESSION)){
                                session_start();
                            }
                            if (isset($_POST['Enter'])){//}
                                     $mob = $_SESSION['mob'];
                                     $state = $_POST['state'];
                                     $city = $_POST['city'];
                                     $rawdate1 = htmlentities($_POST['startdate']);
                                     $startdate = date('Y-m-d', strtotime($rawdate1));
                                     $rawdate2 = htmlentities($_POST['enddate']);
                                     $enddate = date('Y-m-d', strtotime($rawdate2));
                                     $address = $_POST['address'];
                                     $occasion = $_POST['occasion'];
                                     $guests = $_POST['guests'];
                                     $info = $_POST['info'];
        $sql="INSERT INTO Booking VALUES ('{$mob}','{$state}','{$city}','{$startdate}','{$enddate}','{$address}','{$occasion}','{$guests}','{$info}')";

                            if ($conn->query($sql) === TRUE){
                                echo "New record created successfully";
                            } 
                            else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                    ?>
                        <!-- ending php for database service -->
                        </center>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- ending modal -->
    <?php
         include("../Homepage/server.php");
         if (!isset($_SESSION)){
            session_start();
         }
         $name = $_SESSION['name'];
         $email  = $_SESSION['email'];
         $mob    = $_SESSION['mob'];
        echo '
    <div class="jumbotron jbm"><i class="glyphicon glyphicon-user usercst" style="margin-left:50%;"></i>
        <h3 class="text-center usr" style="margin-left:4%;">  '.$name.' </h3></div>
    <div class="container">
        <div class="det">
            <div>
                <label class="lbldet">Email Address </label>
                <input class="input-lg emailadd" type="text" placeholder =" '.$email.' " readonly >
            </div>
            <div>
                <label class="lbldet">Contact Number</label>
                <input class="input-lg contladd" type="text" placeholder = "'.$mob.'" readonly>
            </div>
        </div>
    </div>
    ';
    ?>
    <div class="btnbook">
        <center>
        <input class="btn btn-primary btn-block btn-lg oldb" type="submit" data-toggle="modal" data-target="#bookmodal" value="Book New" style=" width: 500px;">
            <form action="oldbooking.php"  method="POST" target="_blank">
            <input class="btn btn-primary btn-block btn-lg oldb" type="submit" value="
            Old Bookings" style="margin-top: 1%; width: 500px;">
            </form>
        </center>
    </div>
    <div class="container" id="contactusid">
        <h2 class="text-uppercase text-center contact" id="contactus"><strong>Contact Us</strong></h2>
        <form class="cntfrm">
            <input class="form-control input-lg emil" type="text" placeholder="Enter your Email" >
            <textarea class="form-control input-lg emil" placeholder="Enter Your Query" ></textarea>
            <button class="btn btn-primary btn-block btn-lg contactbtn" type="submit">Contact Us</button>
        </form>
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