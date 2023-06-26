<html>
    <?php
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $email = $_POST["Email"];
        $ecenter = $_POST["ecenter"];
        $dob = $_POST["dob"];
        $pn = $_POST["Phone_number"];
        $gender = $_POST["gender"];
        $pword = $_POST["password"];
        $con=mysqli_connect("localhost", "root","", "satracker");
        $create=mysqli_query($con, "CREATE TABLE IF NOT EXISTS userdata(fname varchar(100), lname varchar(100), email varchar(100), ecenter varchar(100), dob varchar(100), pn varchar(100), gender varchar(100), pword varchar(100));");
        $check=mysqli_query($con, "SELECT * FROM userdata WHERE email = '$email';");
        if(mysqli_num_rows($check) == 0) {
            $insert=mysqli_query($con, "INSERT INTO userdata (fname, lname, email, ecenter, dob, pn, gender, pword) VALUES ('$fname', '$lname', '$email', '$ecenter', '$dob', '$pn', '$gender', '$pword');");
            $xz=mysqli_close($con);
            echo '<script>alert("Account Created...");</script>';
            echo '<script>window.open("attendance_tracker_login.php","_self")</script>';
        }
        else {
            $xz=mysqli_close($con);
            echo '<script>alert("This Account Already Exists, Please Try Logging In...");</script>';
            echo '<script>window.open("attendance_tracker_login.php","_self")</script>';
        }
    ?>
</html>