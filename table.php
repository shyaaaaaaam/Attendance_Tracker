<html>
    <?php
        $email = $_COOKIE["email"];
        $password = $_COOKIE["password"];
        $sc1 = $_POST["sc1"];
        $sn1 = $_POST["sn1"];
        $sf1 = $_POST["sf1"];
        $sc2 = $_POST["sc2"];
        $sn2 = $_POST["sn2"];
        $sf2 = $_POST["sf2"];
        $sc3 = $_POST["sc3"];
        $sn3 = $_POST["sn3"];
        $sf3 = $_POST["sf3"];
        $sc4 = $_POST["sc4"];
        $sn4 = $_POST["sn4"];
        $sf4 = $_POST["sf4"];
        $sc5 = $_POST["sc5"];
        $sn5 = $_POST["sn5"];
        $sf5 = $_POST["sf5"];
        $sc6 = $_POST["sc6"];
        $sn6 = $_POST["sn6"];
        $sf6 = $_POST["sf6"];
        $sc7 = $_POST["sc7"];
        $sn7 = $_POST["sn7"];
        $sf7 = $_POST["sf7"];
        $sc8 = $_POST["sc8"];
        $sn8 = $_POST["sn8"];
        $sf8 = $_POST["sf8"];
        $con=mysqli_connect("localhost", "root", "", "satracker");
        $check=mysqli_query($con, "CREATE TABLE IF NOT EXISTS attendata(email VARCHAR(50), subjectcode VARCHAR(50), subjectc VARCHAR(100), subjectfaculty VARCHAR(100), total_class INT, class_attend INT, class_skip INT);");
        $checkz=mysqli_query($con, "SELECT * FROM attendata WHERE email = '$email';");
        if(mysqli_num_rows($checkz) == 0) {
            $confirm=mysqli_query($con, "INSERT INTO attendata(email, subjectcode, subjectc, subjectfaculty, total_class, class_attend, class_skip) VALUES ('$email', '$sc1', '$sn1', '$sf1', 0, 0, 0);");
            $confirm=mysqli_query($con, "INSERT INTO attendata(email, subjectcode, subjectc, subjectfaculty, total_class, class_attend, class_skip) VALUES ('$email', '$sc2', '$sn2', '$sf2', 0, 0, 0);");
            $confirm=mysqli_query($con, "INSERT INTO attendata(email, subjectcode, subjectc, subjectfaculty, total_class, class_attend, class_skip) VALUES ('$email', '$sc3', '$sn3', '$sf3', 0, 0, 0);");
            $confirm=mysqli_query($con, "INSERT INTO attendata(email, subjectcode, subjectc, subjectfaculty, total_class, class_attend, class_skip) VALUES ('$email', '$sc4', '$sn4', '$sf4', 0, 0, 0);");
            $confirm=mysqli_query($con, "INSERT INTO attendata(email, subjectcode, subjectc, subjectfaculty, total_class, class_attend, class_skip) VALUES ('$email', '$sc5', '$sn5', '$sf5', 0, 0, 0);");
            $confirm=mysqli_query($con, "INSERT INTO attendata(email, subjectcode, subjectc, subjectfaculty, total_class, class_attend, class_skip) VALUES ('$email', '$sc6', '$sn6', '$sf6', 0, 0, 0);");
            $confirm=mysqli_query($con, "INSERT INTO attendata(email, subjectcode, subjectc, subjectfaculty, total_class, class_attend, class_skip) VALUES ('$email', '$sc7', '$sn7', '$sf7', 0, 0, 0);");
            $confirm=mysqli_query($con, "INSERT INTO attendata(email, subjectcode, subjectc, subjectfaculty, total_class, class_attend, class_skip) VALUES ('$email', '$sc8', '$sn8', '$sf8', 0, 0, 0);");
            $xz=mysqli_close($con);
            echo '<script>alert("Records Entered...");</script>';
            echo '<script>window.open("attendance_tracker.php","_self")</script>';
        }
        else {
            echo '<script>alert("Records Already Exist...");</script>';
            echo '<script>window.open("attendance_tracker.php","_self")</script>';
            $xz=mysqli_close($con);
        }
    ?>
</html>