<?php 

    require 'libs/database.php';
    function userNameCheck($username,$conn){
        $sql = "SELECT * FROM students WHERE username = '$username'";
        $data = $conn->query($sql);
        if ($data->num_rows === 1) {
            return false;
        }
        else{
            return true;
        }
    }

    function emailCheck($email,$conn){
        $sql = "SELECT * FROM students WHERE email = '$email'";
        $data = $conn->query($sql);
        if ($data->num_rows === 1) {
            return false;
        }
        else{
            return true;
        }
    }

