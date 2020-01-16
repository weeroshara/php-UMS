<?php
    include_once('inc/connection.php');
    session_start();

    
    $id='';

    $fname='';
    $lname='';
    $email='';


    $error=array();
    $_SESSION['hname']=$_SESSION['name'];
        $query="SELECT * FROM user WHERE id={$_GET['user_id']} LIMIT 1";
        $resultSet=mysqli_query($connection, $query);
        $id=$_GET['user_id'];
        if($resultSet){
            if(mysqli_num_rows($resultSet)==1){
               $id=$_GET['user_id'];
                $result=mysqli_fetch_assoc($resultSet);
                $fname=$result['first_name'];
                $lname=$result['last_name'];
                $email=$result['email'];               
                
                
                
            }else{
                $error[]='queury error';
                //die('fetch assoc error');
            }
        }else{
            $error[]='queury error';
            //header('Location: user.php');
            //die('query rror');
        }
        
        if(isset($_POST['submit'])){
            $id=$_POST['id'];
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $email=$_POST['email'];
             $query1="UPDATE user SET first_name='{$fname}', last_name='{$lname}', email='{$email}' WHERE id={$id} LIMIT 1";
             $result_Set=mysqli_query($connection, $query1);
             if($result_Set){
                 header('Location: user.php');
             }else{
                 die('some connection error');
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
    <h3><a href="user.php">go back</a></h3>
    <form action="modify_user.php?" method="post">
        <fieldset class="fieldset">
            <legend class="legend">Add new user</legend>
            <div>

                <?php
                    if(isset($error) && !empty($error)){
                        echo "<p class='error'>pleas form fill correctly </p>";

                    }
                ?>
                <input type="hidden" name="id" class="id" value='<?php echo $id ?>'>
                <div class="block">
                <label for="" class="lable">first name</label>
                <input type="text" name="fname" class="inputnew" id="" <?php echo "value='".$fname."'" ?>><br><br>
                </div>

                <div class="block">
                <label for="" class="lable">last name</label>
                <input type="text" name="lname" class="inputnew" id="" <?php echo "value='".$lname."'" ?>><br><br>
                </div>

                <div class="block">
                <label for="" class="lable">email</label>
                <input type="text" name="email" class="inputnew" id="" <?php echo "value='".$email."'" ?>><br><br>
                </div>

                <div class="block">
                <label for="" class="lable">password</label>
                <p >  ***** | <a href="changepass.php">change password</a></p>
                </div>

                <input type="submit" value="Add user" name="submit" class="submit">

            </div>
        </fieldset>

    </form>
    <?php mysqli_close($connection); ?>
</body>
</html>