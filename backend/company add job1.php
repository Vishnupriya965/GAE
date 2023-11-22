<!doctype html>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="$1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>test</title>

    <?php
    include_once 'Config.php';
    ?>

</head>
<body>
     <?php
    if(isset($_POST['save'])){
        $sql = "INSERT INTO job (job_type, job_name, job_desc, salary)
        VALUES ('".$_POST["job_type"]."','".$_POST["job_name"]."','".$_POST["job_desc"]."','".$_POST["salary"]."')";
    }

    ?>

    <form method="post"> 
    <label id="first"> Job_type:</label><br/>
    <input type="text" name="job_type"><br/>

    <label id="first">job_name</label><br/>
    <input type="password" name="job_name"><br/>

    <label id="first">job_desc</label><br/>
    <input type="text" name="job_desc"><br/>

     <label id="first">salary</label><br/>
    <input type="text" name="salary"><br/>

    <button type="submit" name="save">save</button>
    <button type="submit" name="get">get</button>
    </form>

</body>
</html>