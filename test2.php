<?php
include_once('headers.php');
include_once('file-handling.php');
include_once('queries.php');
?>

<html>
    <body>
        <div class="container mt-5 md">
            <div class="row">
                <label>Amount of records</label>
            </div> 
            <div class="row">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" enctype="multipart/form-data" method="POST">
                    <div class="form-group">   
                        <input id="records_amount" type="text" name="records_amount" class="form-control">
                        <?php if(!isset($succsess_message) && !isset($failure_message)) { ?>
                            <span class="records_error" id="records_error" style="color: red;"><?php if(isset($records_error)) { echo $records_error; } else { echo "Required!"; } ?></span>
                        <?php } else if(isset($succsess_message)) { ?>
                            <span class="records_error" id="records_error" style="color: green;"><?php if(isset($succsess_message)) { echo $succsess_message; } ?></span>

                        <?php } else if (isset($failure_message)) { ?>
                            <span class="records_error" id="records_error" style="color: red; font-size: 24px;"><?php if(isset($failure_message)) { echo $failure_message; } ?></span>
                        <?php } ?>
            </div>    
            <div class="row">        
                <button id="records_btn" type="submit" name="generate_records" class="btn btn-primary">Generate Records</button>
            </div>
            </form>
        </div>    

        <div class="container mt-5 md">
            <div class="row">
                <label>Upload file to database</label>
            </div> 
            <div class="row">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" enctype="multipart/form-data" method="POST">
                    <div class="form-group">   
                        <input type="file" name="output_file" class="form-control">
                        <span class="file_error" id="file_error" style="color: red; font-size: 24px;"><?php if(isset($file_error)) { echo $file_error; } else { echo "Required!"; } ?></span>
                    </div>    
            <div class="row">        
                <button id="records_btn" type="submit" name="upload" class="btn btn-primary">Generate Records</button>
            </div>
            </form>
        </div>   
    </body>
</html>