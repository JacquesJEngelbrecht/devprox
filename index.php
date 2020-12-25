<?php
include_once('queries.php');
include_once('validation.php');
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>DEVPROX</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!--<script type="text/javascript" src="script.js" defer></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">-->
</head>
<body>
    <form action="" method="POST">
        <button type="submit" name="generate_db" class="btn btn-primary">Generate Database</button>
    </form>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="POST" id="register_form">
        <div class="form-group">
            <label>Name</label>
            <input id="name" type="text" name="name" class="form-control" value="<?php echo $name;?>">
            <span class="name_error" id="name_error">*</span>
        </div>
        <div class="form-group">
            <label>Surname</label>
            <input id="surname" type="text" name="surname" class="form-control" value="<?php echo $surname;?>">
            <span class="surname_error" id="surname_error">*</span>
        </div>
        <div class="form-group">
            <label>Id No</label>
            <input id="idNo" type="text" name="idNo" class="form-control">
            <span class="idNo_error" id="idNo_error">*</span>
        </div>
        <div class="form-group">
            <label>Date of Birth</label>
            <input id="dob" type="text" name="dob" class="form-control" value="<?php echo $dob;?>">
            <span class="dob_error" id="dob_error">*</span>
        </div>
    </form>
    <button type="submit" name="post" onclick="errorHandler()" form="register_form" class="btn btn-primary">POST</button>
</body>
</html>
<script type="text/javascript">
        
    function errorHandler() {
        $(document).ready(function() {
            $("form").submit(function(event) {
                event.preventDefault();
                var name = $("#name").val();
                var surname = $('#username').val();
                var idNo = $('#idNo').val();
                var date_of_birth = $('#dob').val();
            
                    $("#name_error").load("validation.php", { name: name });
                    $("#surname_error").load("validation.php", { surname: surname });
                    $("#idNo_error").load("validation.php", { idNo: idNo });
                    $("#dob_error").load("validation.php", { dob: dob });
                
                    var error_count = "<?php echo $error_count; ?>";               
                    var name_error = "<?php echo $name_error; ?>";
                    var surname_error = "<?php echo $surname_error; ?>";
                    var idNo_error = "<?php echo $idNo_error; ?>";
                    var dob_error = "<?php echo $dob_error; ?>";

                    if(error_count > 0) {
                        document.getElementById("name_error").innerHTML = name_error;
                        document.getElementById("surname_error").innerHTML = surname_error;
                        document.getElementById("idNo_error").innerHTML = id_no_error;
                        document.getElementById("dob_error").innerHTML = date_of_birth_error;
                    }
                });   
                    //name_error = '';
            });
    }

</script>
<!--while($row = $data->fetch_assoc()) {
                $ids_from_db[] = $row['id_number']."<br>";
            }--> 