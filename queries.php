<?php
include_once('database.php');

if(isset($_POST['generate_db'])) {
    if (!mysqli_select_db($conn, $dbName)){
        $sql = "CREATE DATABASE IF NOT EXISTS ".$dbName;
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully<br>";
        } else {
            echo "Error creating database: " . $conn->error;
        }
    }

    if (mysqli_select_db($conn, $dbName)) {
        $sql = "CREATE TABLE IF NOT EXISTS person_detail (
            id BIGINT NOT NULL AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            surname VARCHAR(255) NOT NULL,
            id_number VARCHAR(13) UNIQUE NOT NULL,
            date_of_birth DATE,
            PRIMARY KEY (id)
            ) ";
        if ($conn->query($sql) === TRUE) {
            echo "Table created successfully<br>";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }

    if (mysqli_select_db($conn, $dbName)) {
        $sql = "INSERT INTO person_detail 
        (id, name, surname, id_number, date_of_birth) 
        VALUES 
        (DEFAULT, 'Jacques','Engelbrecht','7610185124087','1976/10/18'),
        (DEFAULT, 'Anthony','Struthers','7611125144087','1976/11/12'),
        (DEFAULT, 'Lucy','James','7711105424088','1977/11/10')
        ";
        if ($conn->query($sql) === TRUE) {
            echo "Records inserted successfully<br>";
        } else {
            echo "Error inserting records: " . $conn->error;
        }
    }
}

function test_id_duplicates($conn, $dbName, $input) {
    if (mysqli_select_db($conn,$dbName)) {
        $sql = "SELECT id_number FROM person_detail WHERE id_number = ".$input;
        $data = $conn->query($sql);
        if($data) {
            if($data->num_rows > 0) {
                $idError = 0;
                $idError += 1; 
                return $idError;   
            }
        } else {
            echo "Error ".$sql."<br>".$conn->error;
        }
    }
}

function update_database($conn, $dbName, $name, $surname, $idNo, $dob) {
     if (mysqli_select_db($conn, $dbName)) {
         $sql = "INSERT INTO person_detail 
        (id, name, surname, id_number, date_of_birth) 
        VALUES 
        (DEFAULT, '$name' ,'$surname' ,'$idNo' ,'$dob')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='container'><div class='row success_row'>Name: ".$name.
            "</div><div class='row success_row'>Surname: ".$surname.
            "</div><div class='row success_row'>Id Number: ".$idNo.
            "</div><div class='row success_row'>Date of Birth: ".$dob.
            "</div><div class='row success_row'>inserted successfully!</div>";
        } else {
            echo "Error inserting records: " . $conn->error;
        }
     }
}