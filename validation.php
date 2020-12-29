<?php

include_once('queries.php');

$error_count = 0;
$idError = 0;
$input = $name = $surname = $idNo = $dob = $century = '';
$display_century = false;

if(isset($_POST['post'])) {
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
                $idNo = $_POST["idNo"];
                if(substr(Date('Y'), 2, 2) > substr($idNo, 0, 2) && substr(Date('Y'), 2, 2) < 99) {
                    $dob_error = 'Please provide the century you were born in!';
                    $display_century = true;
                    $error_count += 1;
                    if(isset($_POST['century'])) {
                        $century = $_POST['century'];
                        $dob = fill_century($idNo, $century);
                        $display_century = false;
                        $dob_error = '';
                        $error_count = 0;
                    }                    
                } else {
                    $dob = fill_dob($idNo);
                    $dob_error = '';
                    $display_century = false;
                }
            }
        }  
        if($error_count === 0) {
            $day = substr($dob, 0, 2); echo "<br>";
            $month = substr($dob, 3, 2); echo "<br>";
            $year = substr($dob, 6, 4); echo "<br>";
            $dob_validated = $year."/".$month."/".$day;
            update_database($conn, $dbName, $name, $surname, $idNo, $dob_validated);
            $name = $surname = $idNo = $dob = $century = '';
        }
    }
}
   

function input_to_test($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function fill_dob($input) {
    $year = substr($input, 0, 2);
    $month = substr($input, 2, 2);
    $day = substr($input, 4, 2);    
    $input = $day."/".$month."/19".$year;
    return $input; 
}

function fill_century($input, $century) {
    $year = substr($input, 0, 2);
    $month = substr($input, 2, 2);
    $day = substr($input, 4, 2);
    $input = $day."/".$month."/".$century.$year;
    return $input;
}