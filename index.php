<?php session_start();
$_SESSION['constant_fcfa'] = 655.957;
$_SESSION['date_init'] = time();


include "test.php";
?>
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
         <form action="exe/exe_of_converter.php" method="get">
            
            <div class="field">
               <input type="number" step="any"  min="5" name= "amound" required>
               <label>Set FCFA Value</label>
            </div>

            <div class="field">
                <input type="submit" value="convert" name="action">
             </div>

             <div class="field">
                <input type="text" name="output" readonly>
                <label> 
                  <?php 
                     if(isset($_SESSION['euro_value']) ){
                        echo $_SESSION['euro_value'];
                        
                     }         
                  ?>           
               </label>
             </div>

            <div class="content">
               <div class="pass-link">           
                  <a href="#">Get source code on github </a>
               </div>
            </div>


         </form>
      </div>

      <div class="wrapper">
         <div class="title">
         History
         </div>
        
         <form action="exe/exe_reset_history.php" method="get">
      
            <div class="field">
                <input type="submit" name="reset_action" value="Reset History">
             </div>
    
         </form>
      </div>

      <div style="overflow-y: scroll;">  
         <table class="styled-table">
                <thead>
                    <tr>
                        <th>Conversion of history</th>
                        <th> from FCFA amound</th>
                        <th> to Euro Amound</th>
                        <th>Date/Hour</th>
                    </tr>
                </thead>
                     <?php 
                        if(  isset($_SESSION['euro_value']) ){
                           echo "<tbody>";
                                    echo "<tr>";
                                       echo "<td>Made by user</td>";
                                       
                                    echo "</tr>";

                                    if (empty($_SESSION['history'])) {
                                       echo "<tr>";
                                       echo "<td colspan='4'>Your history has been cleaned up</td>";
                                       echo "</tr>";
                                    } else {
                                       foreach ($_SESSION['history'] as $key => $value) {
                                          echo "<tr class='active-row'>";
                                             echo "<td>Melissa</td>";
                                             echo "<td>".$value."</td>";
                                             echo "<td>".$_SESSION['euro_value']."</td>";
                                             echo "<td>".$_SESSION['date_history'][$key]."</td>";  
                                             
                                          echo "</tr>";
                                       }
                                       //print_r($_SESSION['date_history']); 
                                    }
                              echo "</tbody>";
                        }
                     ?>

            </table>
            </div>


      
         
   </body>
</html>