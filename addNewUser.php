<?php include_once('inc/connection.php'); ?>
<?php
    
    if(isset($_POST['submit'])){
        $error=array();
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        

        $hashpass=sha1($pass);
        if(isset($fname) && isset($lname) && isset($email) && isset($pass) && !empty($fname) && !empty($lname) && !empty($email) && !empty($pass)){
            $query="INSERT INTO user (first_name,last_name,email,password,is_delited) VALUES ('{$fname}','{$lname}','{$email}','{$hashpass}',0)";

            $result_stt=mysqli_query($connection, $query);

            if(!$result_stt){
                die('some query issu');
            }
        }else{
            $error[]='invalid field';
            
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
    <h3><a href="index.php">go back</a></h3>
    <form action="addNewUser.php" method="post">
        <fieldset class="fieldset">
            <legend class="legend">Add new user</legend>
            <div>

                <?php
                    if(isset($error) && !empty($error)){
                        echo "<p class='error'>pleas form fill correctly </p>";

                    }
                ?>
                <div class="block">
                <label for="" class="lable">first name</label>
                <input type="text" name="fname" class="inputnew" id=""><br><br>
                </div>

                <div class="block">
                <label for="" class="lable">last name</label>
                <input type="text" name="lname" class="inputnew" id=""><br><br>
                </div>

                <div class="block">
                <label for="" class="lable">email</label>
                <input type="text" name="email" class="inputnew" id=""><br><br>
                </div>

                <div class="block">
                <label for="" class="lable">password</label>
                <input type="password" name="pass" class="inputnew" id=""><br><br>
                </div>

                <input type="submit" value="Add user" name="submit" class="submit">

            </div>
        </fieldset>

    </form>
    <?php mysqli_close($connection); ?>
</body>
</html>