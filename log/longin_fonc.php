<?php 
if (isset($_POST['submit'])) {

$userName =$_POST['uname'];
$passwordConf=$_POST['psw'];


$servername = "localhost";
$username = "root";
$db_password = "";
$dbname = "mydatabase";



// Create connection
$conn = mysqli_connect($servername, $username,$db_password, $dbname);
// sql to create table
$sql = "SELECT * FROM tbl_User where userName=? OR passwordConf=?;" ;

$statement=mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($statement,$sql)) {
  echo "eroor";
 
}
else{
   
   mysqli_stmt_bind_param($statement,"ss",$userName ,$passwordConf);
    mysqli_stmt_execute($statement);
    $result=mysqli_stmt_get_result($statement);

    if ($row=mysqli_fetch_assoc($result)) 

      $passwordConf=$_POST['psw'];
      //$passwordConf=true;
   
    if ($row['passwordConf']!==$passwordConf) {
      //echo "<script type='text/javascript'>alert('wrong password');</script>";
     echo "wrong password";
  
}
elseif ( $row['passwordConf']==$passwordConf) {
  //echo "<script type='text/javascript'>alert('you are logged in');</script>";
  echo "you are logged in";
   exit();
}
elseif ( $row['userName']!==$userName) {
  //echo "<script type='text/javascript'>alert('you are logged in');</script>";
  echo "you are ";
   exit();
}
else{
 echo "erreur";
  exit();
}
}
}

 ?>