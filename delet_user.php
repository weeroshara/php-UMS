<?php
    include_once('inc/connection.php');
    session_start();

    $_SESSION['hname']=$_SESSION['name'];
    $id=$_GET['user_id'];
$query="UPDATE user SET is_delited=1 WHERE id={$id} LIMIT 1";

$result=mysqli_query($connection, $query);
if($result){
    header('Location: user.php');

}else{
    die('invalid query');

}

mysqli_close($connection);

?>