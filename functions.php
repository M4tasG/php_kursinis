<?php
    function hash_password($password){
        return md5($password);
    }
    function check_creds($dbentry, $username, $password){
        if($dbentry['username'] == $username && $dbentry['password'] == $password){
            return true;
        }
        else{
            return false;
        }
    }
?>