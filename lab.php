<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="get">
        <input type="text" name="tel" id="">
        <input type="submit" value="send" name="send">
    </form>
    <?php if(isset($_GET['send'])){
         $regexPhoneSn = '/^7(|[7]|[8]|[6]|[0])+[0-9\S]{7}$/';
         $regexText = '/^[a-zA-Z0-9-ÿ\s]{2,}$/';
        $tel = $_GET['tel'];
         if(preg_match($re, $tel )){
            echo 'bon format';
         }else{
            echo 'mauvais format';
         }
    }

    ?>


   
    <?php echo "    <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Votre compte à été créer avec succès',
                text:   'Redirection encours...',
                showConfirmButton: false,
                timer: 5000 //3000 -> 3 Seconds

            }).then(function() {
                window.location.href = 'index.php';
            });
    </script>";
    
    ?>
</body>
</html>