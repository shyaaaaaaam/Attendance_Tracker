<html>
  <head>
    <title>
      SATracker - The Best Attendance Tracker
    </title>
    <style>
        body {
            background-color: aqua;
        }

        .title {
            color: beige;
            font-family: 'Courier New';
            text-align: center;
            padding: 0;
            margin: 0;
        }

        fieldset{
          background-color: #f1f1f1;
          border: none;
          border-radius: 2px;
          margin-bottom: 12px;
          overflow: hidden;
          padding: 0 .625em;
      }

        label{
            font-family:"tahoma";
            cursor: pointer;
            display: inline-block;
            padding: 3px 6px;
            text-align: left;
            width: 150px;
            vertical-align: top;
            color: cyan;
        }

        input{
            font-size: inherit;
        }
          
        body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;}
        
        button {
            background-color: blue;
            color: black;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
        }
        
        button:hover {
            opacity: 0.8;
        }

        .button1 {
          background-color: red; 
          color: white; 
          border: 2px solid black;
        }

        .button1:hover {
          background-color: white;
          color: red;
        }

        .button2 {
          background-color: green; 
          color: white; 
          border: 2px solid black;
        }

        .button2:hover {
          background-color: white;
          color: green;
        }

        .button3 {
          background-color: purple; 
          color: white; 
          border: 2px solid black;
        }

        .button3:hover {
          background-color: white;
          color: purple;
        }
        
        .container {
            padding: 16px;
        }
        
        span.psw {
            float: right;
            padding-top: 16px;
        }

        span.psa {
            float:right;
            padding-top: 0px;
        }

        table, th, td {
          border:1px solid black;
        }
    </style>
  </head>

  <?php
    $email = $_COOKIE["email"];
    $password = $_COOKIE["password"];

    if(array_key_exists('logoutbutton', $_POST)) {
        logoutf();
    } else if(strpos(key($_POST), 'addbutton/@') !== false) {
        $subjectc = str_replace("addbutton/@", "", key($_POST));
        $subjectc = str_replace("_", " ", $subjectc);
        $res = append($email, $subjectc);
    } else if(strpos(key($_POST), 'subtractbutton/@') !== false) {
        $subjectc = str_replace("subtractbutton/@", "", key($_POST));
        $subjectc = str_replace("_", " ", $subjectc);
        $res = subtract($email, $subjectc);
    } else if(array_key_exists('editbutton', $_POST)) {
      editf();
  }

    function logoutf() {
      setcookie("email", "", time() - 3600, "/");
      setcookie("password", "", time() - 3600, "/");
      echo '<script>window.open("attendance_tracker_login.php","_self")</script>';
    }

    function editf() {
      echo '<script>window.open("table_edit.php","_self")</script>';
    }
 
    function data($email, $subjectc, $field) {
      $con=mysqli_connect("localhost", "root", "", "satracker");
      $check=mysqli_query($con, "SELECT $field FROM attendata WHERE subjectc='$subjectc' AND email='$email';");
      $check = mysqli_fetch_array($check)[0];
      $xz=mysqli_close($con);
      return $check;
    }

    function append($email, $subjectc) {
      $con=mysqli_connect("localhost", "root", "", "satracker");
      $v=mysqli_query($con, "SELECT total_class FROM attendata WHERE subjectc='$subjectc' AND email='$email';");
      $v = mysqli_fetch_array($v)[0];
      $v = (integer)$v;
      $w=mysqli_query($con, "SELECT class_attend FROM attendata WHERE subjectc='$subjectc' AND email='$email';");
      $w = mysqli_fetch_array($w)[0];
      $w = (integer)$w;
      $check=mysqli_query($con, "UPDATE attendata SET total_class = $v + 1 WHERE subjectc='$subjectc' AND email='$email';");
      $check=mysqli_query($con, "UPDATE attendata SET class_attend = $w + 1 WHERE subjectc='$subjectc' AND email='$email';");
      $x=mysqli_query($con, "SELECT class_attend FROM attendata WHERE subjectc='$subjectc' AND email='$email';");
      $x=mysqli_fetch_array($x)[0];
      $xz=mysqli_close($con);
      return $x;
    }

    function subtract($email, $subjectc) {
      $con=mysqli_connect("localhost", "root", "", "satracker");
      $v=mysqli_query($con, "SELECT total_class FROM attendata WHERE subjectc='$subjectc' AND email='$email';");
      $v = mysqli_fetch_array($v)[0];
      $v = (integer)$v;
      $w=mysqli_query($con, "SELECT class_skip FROM attendata WHERE subjectc='$subjectc' AND email='$email';");
      $w = mysqli_fetch_array($w)[0];
      $w = (integer)$w;
      $check=mysqli_query($con, "UPDATE attendata SET total_class = $v + 1 WHERE subjectc='$subjectc' AND email='$email';");
      $check=mysqli_query($con, "UPDATE attendata SET class_skip = $w + 1 WHERE subjectc='$subjectc' AND email='$email';");
      $x=mysqli_query($con, "SELECT class_skip FROM attendata WHERE subjectc='$subjectc' AND email='$email';");
      $x=mysqli_fetch_array($x)[0];
      $xz=mysqli_close($con);
      return $x;
    }

    if(count($_COOKIE) > 0) {
      $password = $_COOKIE["password"];
      $con=mysqli_connect("localhost", "root", "", "satracker");
      $check=mysqli_query($con, "CREATE TABLE IF NOT EXISTS attendata(email VARCHAR(50), subjectcode VARCHAR(50), subjectc VARCHAR(100), subjectfaculty VARCHAR(100), total_class INT, class_attend INT, class_skip INT);");
      $checkz=mysqli_query($con, "SELECT * FROM attendata WHERE email = '$email';");
      if(mysqli_num_rows($checkz) == 0) {
        echo '<script>alert("No Subject Records Found...");</script>';
        echo '<script>window.open("table_create.html","_self")</script>';
        $xz=mysqli_close($con);
      }
      else {
        $xz=mysqli_close($con);
      }

      echo "<h2><u><center>Your Attendance Tracker</center></u></h2>";
      
      echo '<form method="post">';
      echo "<h4><center>Email: $email<br>Pass Criteria: 75%<br><input type='submit' value='Logout' class='button1' name='logoutbutton' onclick='logout()'><input type='submit' value='Edit' class='button3' name='editbutton'><hr></center></h4>";
      echo "<table style='width:100%; background-color:white'>";
        echo "<tr>";
          echo "<th>Subject Code</th>";
          echo "<th>Subject</th>";
          echo "<th>Faculty</th>";
          echo "<th>Total Classes</th>";
          echo "<th>Classes Attended</th>";
          echo "<th>Classes Skipped</th>";
          echo "<th>Options</th>";
          echo "<th>Attendance Percentage</th>";
        echo "</tr>";

        $con=mysqli_connect("localhost", "root", "", "satracker");
        $result=mysqli_query($con, "SELECT subjectcode, subjectc, subjectfaculty FROM attendata WHERE email = '$email';");
        for($i = 0; $row = mysqli_fetch_assoc($result); ++$i) {
          $subjectcode=$row['subjectcode'];
          $subjectc=$row['subjectc'];
          $subjectfaculty=$row['subjectfaculty'];
          $subtotal=data($email, $subjectc, 'total_class');
          $subattend=data($email, $subjectc, 'class_attend');
          $subskip=data($email, $subjectc, 'class_skip');
        try {
            $subpercent=($subattend/$subtotal)*100;
        } catch(DivisionByZeroError $e){
            $subpercent=0;
        }
        if($subjectc == "") {
          $xasdasdasdas = 0;
        } else {
          echo "<tr>";
          echo "<td>$subjectcode</td>";
          echo "<td>$subjectc</td>";
          echo "<td>$subjectfaculty</td>";
          echo "<td>$subtotal</td>";
          echo "<td>$subattend</td>";
          echo "<td>$subskip</td>";
          echo "<td><input type='submit' class='button2' name='addbutton/@$subjectc' value='+'><input type='submit' class='button1' name='subtractbutton/@$subjectc' value='-'></td>";
          echo "<td id='colorcode'>$subpercent</td>";
          echo "</tr>";
        }
        }
        echo "</table>";
        echo "</form>";
        $xz=mysqli_close($con);
    } else {
      echo '<script>alert("Cookies Have Either Been Cleared Or They Are Disabled...");</script>';
      echo '<script>window.open("attendance_tracker_login.php","_self")</script>';
    }
  ?>

  <script>
    elements = document.getElementsByTagName("td")
    for (var i = elements.length; i--;) {
      if ((elements[i].innerHTML < 75) && isNaN(elements[i].id)) {
        elements[i].style.color = "red";    
      }
      if ((elements[i].innerHTML == 75) && isNaN(elements[i].id)) {
        elements[i].style.color = "orange";    
      }
      if ((elements[i].innerHTML > 75) && isNaN(elements[i].id)) {
        elements[i].style.color = "green";  
      }
    }
  </script>

</html>