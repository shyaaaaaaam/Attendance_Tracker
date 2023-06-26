<html>
    <?php
        $email = $_COOKIE["email"];
        $password = $_COOKIE["password"];
        if(array_key_exists('resetallbutton', $_POST)) {
            resetf();
        } else if(array_key_exists('cancelbutton', $_POST)) {
            cancelf();
        } else if(array_key_exists('updatebutton', $_POST)) {
            updatef();
        } else if(array_key_exists('resetattendancebutton', $_POST)) {
            resetattendance();
        }
        function resetf() {
            echo '<script>';
            echo 'var result = confirm("Are You Sure You Want To RESET ALL DATA?");';
            echo 'if (result) {';
                $email = $_COOKIE["email"];
                $con=mysqli_connect("localhost", "root", "", "satracker");
                $result=mysqli_query($con, "DELETE FROM attendata WHERE email = '$email';");
                $xz=mysqli_close($con);
                echo 'alert("Records Deleted...");';
                echo 'window.open("attendance_tracker.php","_self")';
            echo '} else {';
            echo 'window.open("attendance_tracker.php","_self")';
            echo '}';
            echo '</script>';
        }
        function resetattendance() {
            echo '<script>';
            echo 'var result = confirm("Are You Sure You Want To RESET ATTENDANCE RECORDS?");';
            echo 'if (result) {';
                $email = $_COOKIE["email"];
                $con=mysqli_connect("localhost", "root", "", "satracker");
                $result=mysqli_query($con, "UPDATE attendata SET total_class = 0, class_attend = 0, class_skip = 0 WHERE email = '$email';");
                $xz=mysqli_close($con);
                echo 'alert("Records Cleared...");';
                echo 'window.open("attendance_tracker.php","_self")';
            echo '} else {';
            echo 'window.open("attendance_tracker.php","_self")';
            echo '}';
            echo '</script>';
        }
        function cancelf() {
            echo '<script>window.open("attendance_tracker.php","_self")</script>';
        }
        function updatef() {
            $email = $_COOKIE["email"];
            $password = $_COOKIE["password"];
            $con=mysqli_connect("localhost", "root", "", "satracker");
            $so = $_POST["soriginal"];
            $sc = $_POST["scode"];
            $sn = $_POST["sname"];
            $sf = $_POST["sfaculty"];
            $ta = $_POST["ta"];
            $ca = $_POST["ca"];
            $cs = $_POST["cs"];
            $confirm=mysqli_query($con, "UPDATE attendata SET subjectcode = '$sc', subjectc = '$sn', subjectfaculty = '$sf', total_class = $ta, class_attend = $ca, class_skip = $cs WHERE email = '$email' AND subjectc = '$so' LIMIT 1;");
            $xz=mysqli_close($con);
            echo '<script>alert("Records Updated...");</script>';
            echo '<script>window.open("attendance_tracker.php","_self");</script>';
        }
    ?>
</html>