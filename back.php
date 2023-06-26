<html>
    <?php
        $email = $_POST["email"];
        $pword = $_POST["psw"];
        $con=mysqli_connect("localhost", "root", "", "satracker");
        $confirm=mysqli_query($con, "SELECT * FROM userdata WHERE email = '$email' and pword = '$pword';");
        if(mysqli_num_rows($confirm) > 0) {
            $rem = $_POST["remember"];  
            $xz=mysqli_close($con);
            if (isset($rem)){
                setcookie("email", $email, time()+3600*24*365*10, "/");
                setcookie("password", $pword, time()+3600*24*365*10, "/");
            } else {
                setcookie("email", $email, 0, "/");
                setcookie("password", $pword, 0, "/");
            }
            echo '<script>window.open("attendance_tracker.php","_self")</script>';
        }
        else {
            $xz=mysqli_close($con);
            echo '<script>alert("This Account Doesnt Exist, Please Try Creating An Account");</script>';
            echo '<script>window.open("attendance_tracker_signup.html","_self")</script>';
        }
    ?>
</html>