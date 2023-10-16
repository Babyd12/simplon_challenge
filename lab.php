<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="lab.php">
    <input type="text" name="date" id="">
    <input type="submit" value="send">

  </form>
  <?php 
 
   $regex_date = '/^([0-2][0-9]|3[0-1])-([0-9]|1[0-2])-[0-9]{4}$/';
   $regex_text_field = "/^[a-zA-Z0-9À-ÿ\s]*$/";
   if(isset($_GET['date'])) {

      if(preg_match($regex_text_field,$_GET['date'])){
        echo 'bon format';
      }else{
        echo 'mauvai format';
      }
   }
  ?>
  
</body>
</html>