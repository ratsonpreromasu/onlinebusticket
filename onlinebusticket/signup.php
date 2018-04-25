
<?php
require_once './class/viewBus.php';
$viewBus = new viewBus();
$query_result = $viewBus->select_all_bus_info();
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Online Bus Ticket Service</title>
        <link href="asset/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <link rel="stylesheet" href="asset/css/styles.css">



    </head>

    <body>

        <div class="container main_body padding_0">
            <header>
                <div id='cssmenu'>
                    <ul>
                        <li class='active'><a href='index.php'>Home</a></li>
                        <li><a href='#'>How to Buy</a></li>
                        <li><a href='#'>Company</a></li>
                        <li><a href='contact_us.php'>Contact</a></li>
                        <li><a href='login.php'>Log In</a></li>
                        <li><a href='signup.php'>Sign Up</a></li>
                    </ul>
                </div>
            </header>


            <div id="login-box">
                <div class="left">
                    <h1>Sign up</h1>

                    <input type="text" name="username" placeholder="Username" />
                    <input type="text" name="email" placeholder="E-mail" />
                    <input type="password" name="password" placeholder="Password" />
                    <input type="password" name="password2" placeholder="Retype password" />

                    <input type="submit" name="signup_submit" value="Sign me up" />
                </div>

                <div class="right">
                    <span class="loginwith">Sign in with<br />social network</span>

                    <button class="social-signin facebook">Log in with facebook</button>
                    <button class="social-signin twitter">Log in with Twitter</button>
                    <button class="social-signin google">Log in with Google+</button>
                </div>
                <div class="or">OR</div>
            </div>

            <footer class="container footer text-center">
                <p>&copy; Online Bus Ticket Service</p>
            </footer>

        </div>

        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="asset/js/bootstrap.min.js"></script>
        <script src="asset/js/script.js"></script>

    </body>
</html>
