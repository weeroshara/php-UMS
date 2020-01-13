<?php session_start() ?>
<h3>user2</h3>
<?php
    echo $_SESSION['name'];

    if(!isset($_SESSION['user'])){
        header('Location: index.php');
    }
?>