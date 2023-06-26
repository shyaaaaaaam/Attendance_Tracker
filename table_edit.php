<html>
  <head>
    <title>
      SATracker - The Best Attendance Tracker
    </title>
    <style>
      fieldset{
          background-color: beige;
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
          color: beige;
      }

      input{
          font-size: inherit;
          display:inline-block;
          text-align: center;
          vertical-align: center;
          margin: 0 auto;
      }
      
      .head {
          text-align:center;
          color: beige;
      }
      
      .sa {
        text-align:center;
      }
      
    </style>
  </head>
  <script>
    function selectval(val) {
      let arr = val.split('|%$|');
      document.getElementById("soriginal").value = arr[1].replace(/_/g, ' ');
      document.getElementById("scode").value = arr[0].replace(/_/g, ' ');
      document.getElementById("sname").value = arr[1].replace(/_/g, ' ');
      document.getElementById("sfaculty").value = arr[2].replace(/_/g, ' ');
      document.getElementById("ta").value = arr[3].replace(/_/g, ' ');
      document.getElementById("ca").value = arr[4].replace(/_/g, ' ');
      document.getElementById("cs").value = arr[5].replace(/_/g, ' ');
    }

    function validateForm() {
      let ta = parseInt(document.forms["tableedit"]["ta"].value);
      let ca = parseInt(document.forms["tableedit"]["ca"].value);
      let cs = parseInt(document.forms["tableedit"]["cs"].value);
      if (ta < ca + cs) {
        alert("Sum Of Classes Attended And Classes Skipped Should Be Equal To Total Classes!");
        return false;
      } else if (ta > ca + cs) {
        alert("Sum Of Classes Attended And Classes Skipped Should Be Equal To Total Classes!");
        return false;
      }
    }
  </script>

  <?php
    echo "<form name='tableedit' action='table_edit_back.php' method='post' onsubmit='return validateForm()' style=background-color:aqua>";
    echo "<div>";
    echo "<center><h3>Press The Reset Button If You Want To Get Rid Of All Data:</h3></center>";
    echo "<center><input style='background-color:red; color:white;' type='submit' name='resetallbutton' value='Reset All Data'><input style='background-color:red; color:white;' type='submit' name='resetattendancebutton' value='Reset Attendance Data'></center>";
    echo "<hr>";
    $email = $_COOKIE["email"];
    $password = $_COOKIE["password"];
    $con=mysqli_connect("localhost", "root", "", "satracker");
    $result=mysqli_query($con, "SELECT subjectcode, subjectc, subjectfaculty, total_class, class_attend, class_skip FROM attendata WHERE email = '$email';");
    echo 'Select The Subject To Edit:';
    echo '<select name="Subjects" id="subjectselect" onchange="selectval(this.value);">';
    for($i = 1; $row = mysqli_fetch_assoc($result); ++$i) {
      $subjectcode=$row['subjectcode'];
      $subjectc=$row['subjectc'];
      $subjectf=$row['subjectfaculty'];
      $totalclass=$row['total_class'];
      $classattend=$row['class_attend'];
      $classskip=$row['class_skip'];
      echo '<option value=' . (str_replace(' ', '_', $subjectcode) . "|%$|" . str_replace(' ', '_', $subjectc) . "|%$|" . str_replace(' ', '_', $subjectf) . "|%$|" . str_replace(' ', '_', $totalclass) . "|%$|" . str_replace(' ', '_', $classattend) . "|%$|" . str_replace(' ', '_', $classskip)) . '>' . $subjectc . '</option>';
    }
    echo '</select>';
    $xz=mysqli_close($con);
    echo '<hr><br>';
    echo 'Subject Chosen: <input type="text" id="soriginal" name="soriginal" value="-" required readonly><br>';
    echo 'Subject Code: <input type="text" id="scode" name="scode" value="-" required><br>';
    echo 'Subject Name: <input type="text" id="sname" name="sname" value="-" required><br>';
    echo 'Subject Faculty: <input type="text" id="sfaculty" name="sfaculty" value="-" required><br>';
    echo 'Total Attendance: <input type="text" id="ta" name="ta" value="-" required><br>';
    echo 'Classes Attended: <input type="text" id="ca" name="ca" value="-" required><br>';
    echo 'Classes Skipped: <input type="text" id="cs" name="cs" value="-" required><br>';
  ?>
    </div>
    <div class="sa">
    <?php
      echo '<input style="background-color:blue; color:white;" type="submit" name="updatebutton" value="Edit"><input class="button" type="submit" style="background-color:red; color:white;" name="cancelbutton" value="Cancel">';
    ?>
    </div>
  </form>
</html>