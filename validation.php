<?php

include_once('queries.php');
$error_count = 0;
$idError = 0;
$input = $name = $surname = $idNo = $dob = '';

//if(isset($_POST['post'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["name"])) {
            $name_error = 'Please provide your Name!';
            $error_count += 1;
        } else {
            $name_error = '';
            $name = input_to_test($_POST["name"]);
        }
        if(empty($_POST["surname"])) {
            $surname_error = 'Please provide your Surname!';
            $error_count += 1;
        } else {
            $surname_error = '';
            $surname = input_to_test($_POST["surname"]);
        }
        if(empty($_POST["idNo"])) {
            $idNo_error = 'Please provide your ID Number!';
            $error_count += 1;
        } else if(!is_numeric($_POST["idNo"])) {
            $idNo_error = 'Please only enter numeric values!';
            $error_count += 1;
        } else if(strlen($_POST["idNo"]) < 13 || strlen($_POST["idNo"]) > 13) {
            $idNo_error = 'Please only enter 13 characters!';
            $error_count += 1;
        } else {
            $idError = test_id_duplicates($conn, $dbName, $_POST["idNo"]);
            if($idError > 0) {
                $error_count += 1;
                $idNo_error = "That ID number already exists";
            } else {
                $idNo_error = '';
            }
        }
        if(empty($_POST["dob"])) {
            $dob_error = 'Please provide your Date of Birth!';
            $error_count += 1;
        } else {
            $dob_error = '';
            $dob = test_dob($_POST["dob"]);
        }
    }

//}

function input_to_test($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function test_dob($input) {
    
}
