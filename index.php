<?php
include_once('headers.php');
include_once('queries.php');
?>

<body>
    <div class="container mt-5 md">
        <div class="row">
            <h3>Welcome to Jacques' demo.</h3>
        </div>    
        <div class="row">
            <h3>Test 1</h3>
        </div>
        <div class="row">
            <p>It is imperative that you first do Test 1 first<br>
            By pressing "Generate Database" button we will create a database called "DEVPROX"<br>
            After successfull creation of the databse we create a table called "PERSON DETAIL"<br>
            Finally we insert some dummy data<br>
            If you are ready click Generate Database</p><br>
        </div>
        <div class="row">
            <form action="persons.php" method="POST" id="db_form">
                <button id="db_btn" type="submit" name="generate_db" class="btn btn-primary">Generate Database</button>
            </form>
        </div>
    </div>

 <div class="container mt-5 md">
    <div class="row">
        <h3>For test 2 Click the "Test 2" button.</h3>
    </div>    
    <div class="row">
        <a href="test2.php"><button class="btn btn-success">Test 2</button></a>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
     if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
