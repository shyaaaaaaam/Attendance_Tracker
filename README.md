# Attendance_Tracker
This is an HTML project that makes advantage of PHP and JavaScript to help school and university students track their attendance at ease. It uses MySQL to store user data, subject data, and attendance data.<br />

I use XAMPP to run the project through localhost, however feel free to use any other software.<br /><br />
File Breakdown:<br />
- The main file is `attendance_tracker.php` which calls all sub files to bring the tracker to life.<br />
- The file `attendance_tracker_forgot.html` is a simple template forgot password html file, you may use it to make your own forgot password code using PHP.<br />
- `attendance_tracker_login.php` is a backend file used to check and verify logins.<br />
- `attendance_tracker_signup.html` is used to generate a sign up page, it uses `sign.php` to generate and check the details.<br />
- `back.php` is the backend used to check and verify login details.<br />
- `table.php` is a backend file that is used to display the subject details along with their recorded attendance from database.<br />
- `table_create.html` is the HTML front end file used to take input of subjects along with subject information such as staff name, subject name, etc.<br />
- `table_edit.php` and `table_edit_back.php` are used to edit the tables for future use.<br />

Current Features:<br />
- Uses JavaScript To Generate An Iterative Count Of Users In The Front Page.
- Uses CSS To Bring Colourful Animations Such As Coloured Coded Attendance Such As:
-  - Green: >75%
   - Orange: =75%
   - Red: <75%
- Can Reset Attendance Data Or Subject Data Entirely.
- Can Add Upto N Subjects.
- Can Edit Subject Data Or Attendance Data.
- Users Can Fill Feedback Form.
- Javascript to check input fields.
