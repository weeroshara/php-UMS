<?php session_start();

 ?>
<?php include_once('connection.php'); ?>
<?php 
    
 
    if(!isset($_SESSION['hname'])){
      header('Location: index.php');  
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
    <header>
    <div class="company">USER MANAGEMENT SYSTEMS</div>
    <div class="leftTin">welcome <?php echo $_SESSION['hname']; ?> <a href="logout.php">sine out</a></div>
    </header>

    <?php 
    
        unset($_SESSION['hname'])
    ?>
</body>
</html>