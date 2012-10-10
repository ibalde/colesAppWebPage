<?php session_start()?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Kennesaw State University - Coles College of Business</title>
    <meta content="" name="keyword" />
    <meta content="" name="description">
    <meta content="KSU MadLab" name="author">
    
    <meta content='True' name='HandheldFriendly' />
    <meta content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' name='viewport' />
    <meta name="viewport" content="width=device-width">
    
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

</head>
<body>
    <header>
        <div id="logo" class="constrain">
            <!-- background added in the css -->
            <img src="images/layout/logo.png" alt="Kennesaw State University - Coles College of Business" />
        </div>
        <div id="nav"> 
            <div class="constrain">
                <ul> 
                    <li><a href="#">Home</a></li> 
                    <li>
                        <a href="#">Resources</a>
                        <ul>
                            <li>
                                <a href="#">Tables</a>
                                <ul>
                                    <li><a href="#">Link 1</a></li>
                                    <li><a href="#">Link 2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Text</a>
                                <ul>
                                    <li><a href="#">Link 1</a></li>
                                    <li><a href="#">Link 2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">FAQs</a>
                                <ul>
                                    <li><a href="#">Link 1</a></li>
                                    <li><a href="#">Link 2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Web Servics</a>
                                <ul>
                                    <li><a href="#">Link 1</a></li>
                                    <li><a href="#">Link 2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> 
                    <li>
                        <a href="#">Updates</a>
                        <ul>
                            <li>
                                <a href="#">Advising Traffic</a>
                                <ul>
                                    <li><a href="#">Link 1</a></li>
                                    <li><a href="#">Link 2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Maps</a>
                                <ul>
                                    <li><a href="#">Link 1</a></li>
                                    <li><a href="#">Link 2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Directory</a>
                                <ul>
                                    <li><a href="#">Link 1</a></li>
                                    <li><a href="#">Link 2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> 
                    <li><a href="#">Site Navigation</a></li>
                </ul> 
            </div>
        </div>
    </header>
    <div id="content" class="constrain">
        <h1>Welcome</h1>
        <p>
            Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus 
            libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, 
            est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis. 
            Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar 
            nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus 
            sed, urna.
        </p>
        <p>
        <br />
        <p align="center">Please Login to access restricted data</p>
            <form name="form1" action="" method="POST" onSubmit="return checkValues();">
                <table class="login" cellpadding="2" cellspacing="10" align="center">
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" maxlength="15"/></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" maxlength="10"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="submit" value="login"/></td>
                    </tr>
                </table>
            </form>
            <?php 
                if(isset($_POST['submit'])){
                    $user1 = "coles";
                    $pass1 = "bigowl";
                    $user= $_POST['username'];
                    $pass = $_POST['password'];
                    if($user == $user1 && $pass == $pass1){
                        $_SESSION['username'] =$user;
                        $_SESSION['password'] = $pass;
                        //$_SESSION['start'] = time();
                        //$_SESSION['expire'] = $_SESSION['start']+(10);
                        echo "You are currently logged in";
                    }
                    else echo "Invalid username/password";
                }
                if(isset($_SESSION['username'])) {
                    ini_set('session.gc_maxlifetime', 10);           
                }
            ?>
        </p>
    </div>
</body>
</html>
