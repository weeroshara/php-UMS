<?php

    $connection=mysqli_connect('localhost','root','','userdb');

    if(mysqli_connect_errno()){
        die('connection is failed : ' . mysqli_connect_error());
    }