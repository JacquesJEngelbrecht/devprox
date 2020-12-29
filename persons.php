<?php
include_once('headers.php');
include_once('queries.php');
include_once('validation.php');
?>

<body>
    <div class="container mt-5">
        <div class="row">
            <h3>Please enter all information required!</h3>
        </div>
        <div class="row">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" enctype="multipart/form-data" method="POST" id="register_form">
        <div class="form-group">
            <label>Name</label>
            <input id="name" type="text" name="name" class="form-control" value="<?php echo $name;?>">
            <span class="name_error" id="name_error" style="color: red;"><?php if(isset($name_error)) { echo $name_error; } else { echo "Required!"; } ?></span>
        </div>
        <div class="form-group">
            <label>Surname</label>
            <input id="surname" type="text" name="surname" class="form-control" value="<?php echo $surname;?>">
            <span class="surname_error" id="surname_error" style="color: red;"><?php if(isset($surname_error)) { echo $surname_error; } else { echo "Required!"; } ?></span>
        </div>
        <div class="form-group">
            <label>Id No</label>
            <input id="idNo" type="text" name="idNo" class="form-control" value="<?php echo $idNo;?>">
            <span class="idNo_error" id="idNo_error" style="color: red;"><?php if(isset($idNo_error)) { echo $idNo_error; } else { echo "Required!"; } ?></span>
        </div>
        <div class="form-group">
            <?php if($display_century === true) { ?>
                <label>Century</label>
                <select name="century" id="century"><option value="">Select Century</option><option value="19">19</option><option value="20">20</option></select>
             <?php } ?>   
            <span class="dob_error" id="dob_error" style="color: red;"><?php if(isset($dob_error)) { echo $dob_error; } ?></span>
        </div>
    </form>
            </div>
            </div>
    <div class="container">
        <div class="row">
            <button type="submit" name="post" form="register_form" class="btn btn-primary btn-lg" id="post_btn">POST</button>

        </div>
    </div>
        
</body>
</html>
 
