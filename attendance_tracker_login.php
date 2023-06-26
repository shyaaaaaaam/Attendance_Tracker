<html>
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
            width: 100%;
        }
        
        button:hover {
            opacity: 0.8;
        }
        
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
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
    </style>

    <h1 class="title">SATracker</h1>
    <h3 class="title">The Best Attendance Tracker</h3>
    <?php
        if(count($_COOKIE) > 0) {
            echo '<script>window.open("attendance_tracker.php","_self")</script>';
        } else {
            $string = <<<HEREDOC
                <form action="back.php" method="post" style=background-color:white>
                    <h1 class="head"><b>Log In:-</b></h1>
                    <label for="fname"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email:" name="email" required><br>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password: " name="psw" required><br><br>
                    <label><input type="checkbox" checked="checked" name="remember"> Remember me</label>
                    <button type="submit">Login</button>
                    <div class="container" style="background-color:white">
                        <a href="attendance_tracker_forgot.html">Forgot password?</a><br>
                        <a href="attendance_tracker_signup.html">Don't Have An Account?</a>
                    </div>
                </form>
            HEREDOC;
            echo $string;
        }
    ?>
</html>