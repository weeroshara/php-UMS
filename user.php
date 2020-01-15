
<?php include_once('inc/connection.php'); ?>
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
<?php include('inc/header.php');
?>

<h3 class="heduser">User Details <a href="addNewUser.php" style="padding-left:70%"> + Add User</a> </h3>
<?php
    $user_list='';
    $query="SELECT id,first_name,email,last_login FROM user WHERE is_delited=0 ORDER BY first_name";

    $result_set=mysqli_query($connection,$query);
    
    if($result_set){
        while($user=mysqli_fetch_assoc($result_set)){
            $user_list.='<tr>';
            $user_list.="<td>{$user['first_name']}</td>";
            $user_list.="<td>{$user['email']}</td>";
            $user_list.="<td>{$user['last_login']}</td>";
            $user_list.="<td><a href=\"modify_user.php?user_id={$user['id']}\">edit</a></td>";
            $user_list.="<td><a href=\"delet_user.php?user_id={$user['id']}\">delet</a></td>";
            $user_list.="</tr>";
        }
    }


?>

<table>
    <tr>
        <th>first name</th>
        <th>email</th>
        <th>last login</th>
        <th>edit</th>
        <th>delet</th>
    </tr>
    <?php echo $user_list ?>
</table>

<?php mysqli_close($connection);?>
</body>
</html>