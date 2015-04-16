    <?php

    $username = $_POST['input_username'];
    $password = md5(md5($_POST['input_password']));

    $conn = mysql_connect("localhost","root","");
    mysql_select_db("2015_ronysarung");

    $query = "SELECT * FROM admin WHERE username = '$username' AND password ='$password'";
    $result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

    
   if (mysql_num_rows($result) == 1){
      echo 1;
  }
   else {
      // print status message
       echo 0;
  }

    ?>

