<?php session_start(); ?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Form Design | CodeLab</title>
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
         Money Converter
         </div>
         <form action="exe_of_converter.php" method="get">
            <div class="field">
               <input type="text" required>
               <label>Set FCFA Value</label>
            </div>

            <div class="field">
                <input type="submit" value="convert">
             </div>

             <div class="field">
                <input type="text" name="output" required>
                <label> <?php echo isset($_SESSION['euro_value']) ?> </label>
             </div>
            <div class="content">
               <div class="pass-link">
                  <a href="#">Get source code on github </a>
               </div>
            </div>


         </form>
      </div>
   </body>
</html>