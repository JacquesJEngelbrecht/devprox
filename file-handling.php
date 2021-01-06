<?php
include_once('queries.php');
ini_set('memory_limit', '-1');
$records_amount = 0;
$error_count = 0;
$records_error = '';


$names_array = ['0'=>'Angus James','1'=>'Bart Jay','2'=>'Charley Cooper','3'=>'Danny','4'=>'Eric','5'=>'Freddie','6'=>'Grant','7'=>'Harry','8'=>'Iain','9'=>'Jock','10'=>'Kevin','11'=>'Lemmy','12'=>'Malcolm','13'=>'Neil','14'=>'Ozzy','15'=>'Peter','16'=>'Quinton','17'=>'Rudolph','18'=>'Shane','19'=>'Terry'];
$surnames_array = ['0'=>'Adams','1'=>'Bree','2'=>'Clammy','3'=>'Deadish','4'=>'English','5'=>'Froggy','6'=>'Graham','7'=>'Hetfield','8'=>'Irus','9'=>'Jameson','10'=>'Kilmister','11'=>'Leary','12'=>'Masterson','13'=>'Newton','14'=>'Osborne','15'=>'Prince','16'=>'Quint','17'=>'Reese','18'=>'Stevens','19'=>'Truijo'];

if(isset($_POST['generate_records'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         if(empty($_POST["records_amount"])) {
            $records_error = 'Please provide the amount of records to be executed!';
            $error_count += 1;
        } else {
            $records_error = '';
            $records_amount = generate($_POST["records_amount"], $names_array, $surnames_array);
        }        
    }
}

function generate($input, $names_array, $surnames_array) {
    $hearders = ['Name', 'Surname', 'Initials', 'Age', 'DateOfBirth'];
    $file_handler = fopen('output.csv', 'a');
    fputcsv($file_handler, $hearders);

    $merged_array_to_test = [];
    $merged_array = [];
    $csv_array = [];
    $last_value = '';
    $merged_value = '';
    
    for ($i=0; $i < $input; $i++) {
        $last_value = $merged_value;
        $initials_array = [];
        $initials = '';
        $random_name = array_rand($names_array);
        $random_name = $names_array[$random_name];
        $random_surname = array_rand($surnames_array);
        $random_surname = $surnames_array[$random_surname];
        
        $name_for_initials = explode(" ", $random_name);
            foreach($name_for_initials as $name) {
                $initials_string = substr($name, 0, 1);
                $initials_array[] = $initials_string;
            }
            foreach($initials_array as $initials_to_add) {
                $initials .= $initials_to_add;
            }

        $current_date = time();
        $int = mt_rand(0, $current_date);
        $date_insert = date("d/m/Y",$int);
        $age = substr($date_insert, 0, 2);
        $merged_array_to_test[] = $random_name." ".$random_surname." ".$initials." ".$age." ".$date_insert;
        $merged_value = $merged_array_to_test[$i];        
        
         if($merged_value === $last_value) {
                $merged_value = '';
                $i--;
            } else {               
                $merged_value = '"'.$i.'","'.$random_name.'","'.$random_surname.'","'.$initials.'","'.$age.'","'.$date_insert.'"';
                $merged_array[] = ["name" => "$random_name","surname" => "$random_surname", "initials" => "$initials","age" => "$age","dateofbirth" => "$date_insert"];
                fputcsv($file_handler, $merged_array[$i]);
            }
    } 

    $file_count = count(file('output.csv')) - 1;
    fclose($file_handler);  
    echo '<script type="text/javascript">alert("' . $file_count . ' Records Added!")</script>';
}   



