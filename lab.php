<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
       
        <input type="date" name="d1" id="">
        <input type="date" name="d2" id="">
        <input type="submit" value="send" name="send">
    </form>
    <?php 
    include 'function.php';
        if(isset($_POST['send'])){
            $d1 = $_POST['d1'];
            $d2 = $_POST['d2'];
            if(isValidIntervalDate($d1, $d2)){
                echo 'valide';
            }

        }






        
    ?>

    

</body>
</html>