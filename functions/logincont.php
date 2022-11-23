<?php

class LoginCon extends Login{

    private $username;
    private $password;


    function __construct($username,$password){
        $this->username = $username;
        $this->password = $password;
    }

    function loginUser(){
        if($this->emptyInput()==false){
            header("Location: ../index.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->username, $this->password);
    }

    function emptyInput(){
        $result;
        if(empty($this->username) || ($this->password)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }






}