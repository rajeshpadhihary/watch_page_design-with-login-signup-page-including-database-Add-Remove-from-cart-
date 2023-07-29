<?php include("connection.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="login-container">
        <div class="fpage">
            <img src="for prj.jpg" alt="flipcart login image">
        </div>
        <div class="fpage">
            <form action="#" method="POST">
                <div style="text-align: right; color: black; font-size: 35px; font-weight: bold; margin-top: 5px;">
                    <!-- <i class="fa fa-window-close fa-lg" aria-hidden="true"></i> -->
                    <span class="close">&times;</span>
                </div>
                <div class="hed">
                    <h1>Login</h1>
                    <h6>Get access to your Orders, Wishlist and Recommendations</h6>
                </div>
                <div class="unpwd">
                    <div class="input-container">
                        <label for=""><b>Enter Email/Mobile number</b></label>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email/Number" required="required">
                    </div>
                    <div class="input-container">
                        <div class="fp">
                            <label for=""><b>Enter Password</b></label>
                            <a href="#" class="b2"><b>Forgot ?</b></a>
                        </div>
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" class="form-control" id="inputPassword" name="inputPassword"
                            placeholder="Password" required="required">
                    </div>
                    <div class="lf">
                        <input type="submit" class="log" value="Login" name="submitLogin">
                        <input type="submit" class="sign" value="Sign up" name="submitSignup">
                    </div>
                    <div class="btm">
                        <p>
                            We no longer support login via Social accounts. To recover your old accounts
                            <br>
                            please <a href="#"><b>click here</b></a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php
    if($_POST['submitSignup'])
    {
        $ie = $_POST['inputEmail'];
        $ip = $_POST['inputPassword'];

        $query = "INSERT INTO user values('$ie','$ip')";

        $data = mysqli_query($connection,$query);

        if($data)
        {
            echo "<b>Sign Up Successfull</b>";
        }
        else
        {
            echo "It seems like there is some error";
        }
    }
    if($_POST['submitLogin'])
    {
        $ie = $_POST['inputEmail'];
        $ip = $_POST['inputPassword'];


        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT useremail,password FROM user WHERE useremail = '$ie' AND password = '$ip'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<b>Login Successfully</b>  here is your email and password";
                echo "&nbsp;&nbsp;"."<b>email:</b> " . $row["useremail"]. "&nbsp;&nbsp;"."<b>password:</b> " . $row["password"]. "<br>";
                echo '<b>Go Back</b>';
            }
        } else {
            echo "<b>Sign up First</b>";
        }

        mysqli_close($conn);
    }
?>