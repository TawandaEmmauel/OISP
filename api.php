<?php

require_once("Database\initialize.php");

$DB = new Database();

$DATA_RAW =  file_get_contents("php://input");
$DATA_OBJ = json_decode($DATA_RAW);

//process the data

if(isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "signup")
{
    //signing up
    $data = false;
    $data['userid'] = $DB->generate_id(20);
    $data['username'] = $DATA_OBJ->username;
    $data['firstname'] = $DATA_OBJ->firstname;
    $data['lastname'] = $DATA_OBJ->lastname;
    $data['email'] = $DATA_OBJ->email;
    $data['password'] = $DATA_OBJ->password;


    $query = "insert into users (userid,username,firstname,lastname,email,password) values (:userid,:username,:firstname,:lastname,:email,:password)";
    $result = $DB->write($query);

    if($result){

        echo "your profile was created";
        echo "your profile was created";
    }
    else{
        echo "your profile was not created";
    }

}