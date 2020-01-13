<?php session_start();
?>
<?php include_once('inc/connection.php'); ?>

<?php
    
    if(isset($_POST['submit'])){
        $error=array();
        if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1){
            $error[]='mail is incorrect / missing';
        }
        if(!isset($_POST['pass']) || strlen(trim($_POST['pass'])) < 1){
            $error[]='password is incorrect / missing';
        }
        if(empty($error)){
            $email=mysqli_real_escape_string($connection, $_POST['email']);
            $pass=mysqli_real_escape_string($connection, $_POST['pass']);

            $hashpass=sha1($pass);

            $query="SELECT * FROM user WHERE email ='{$email}' AND password ='{$hashpass}' LIMIT 1";

            $result_set=mysqli_query($connection, $query);
            if($result_set){
               if(mysqli_num_rows($result_set)==1){
                   $user=mysqli_fetch_assoc($result_set);
                   $_SESSION['name']=$user['first_name'];
                   $_SESSION['hname']=$user['first_name'];

                   //login time set
                   $query="UPDATE user SET last_login = NOW() ";
                   $query .="WHERE first_name='{$_SESSION['name']}' LIMIT 1";

                   $result_set=mysqli_query($connection, $query);

                   if(!$result_set){
                       die("connection faild");
                   }

                   header('Location: user.php');
               }else{
                   $error[]='invalid user / password';
               }
                
            }else{
                $error[]='invalid Db query';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    
   <form action="index.php" method="post">
    <fieldset>
    <?php 
        if(isset($error) && !empty($error)){
            echo '<p>invalid user / password</p>';
        }
    ?>
    <legend><h2>user logon</h2></legend>
    <h4>user email</h4>
    <input type="text" name="email" id="" class="input">
    <h4>password</h4>
    <input type="password" name="pass" id="" class="input"><br>
    <input type="submit" value="login" name="submit" class="button">
    </fieldset>
   </form>
</body>
</html>
<?php mysqli_close($connection); ?>