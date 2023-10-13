<?php session_start();
/*MobSpyco 2002% */
$_SESSION['constant_fcfa'] = 655.957;
$_SESSION['date_init'] = time();

//$Golbal_SESSION['global_merge_data']  = [];
include "function.php";
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
                     if(isset($_SESSION['output_value']) ){
                        
                        echo $_SESSION['output_value'];
                        
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
         History Reset 
         </div>
        
         <form action="exe/exe_reset_history.php" method="get">
      
            <div class="field">
                <input type="submit" name="reset_action" value="Reset History">
            </div>
            
            <div class="content">
               <select name="reset_selected" id="cars">
                  <?php
                  //var_dump($_SESSION['global_merge_data'] );
                  foreach ($_SESSION['global_merge_data'] as $date => $montants) {
                        echo "<option value='" . $date . "'>" . $date . "</option>";
                        foreach ($montants as $key => $montant) {
                           //echo "<tr> <td>". $key . "</td> ";
                           //echo "<option value='" . $date . "'>" . $montant . "</option>";
                                       
                                 "</tr>";                                 
                        }
                  }
                  ?>
               </select>

            </div>   
            <div class="field">
                <input type="submit" name="reset_one" value="Reset Selected History">
               </div>

         </form>

         
      </div>

      <div style="overflow-y: scroll;">  
         <table class="styled-table">
                <thead>
                    <tr>
                        <th>From FCFA</th>
                        <th> to Euro Amound</th>
                        <th>History of conversion</th>
                    </tr>
                </thead>

                     <?php 

                        if( isDifferentDay() && isset($_SESSION['val']) ){
                           echo "<tbody>";
                                    echo "<tr>";
                                       echo "<td>Made by user</td>";
                                       
                                    echo "</tr>";

                                    if (empty($_SESSION['date_history'])) {
                                       echo "<tr>";
                                       echo "<td colspan='4'>Your history has been cleaned up</td>";
                                       echo "</tr>";
                                    } 

                              echo "</tbody>";
                           }
                           else{
                              echo "<tbody>";

                                    if (empty($_SESSION['date_history'])) {
                                       echo "<tr>";
                                       echo "<td colspan='4'>Your history has been cleaned up</td>";
                                       echo "</tr>";
                                    }
                                    else {
                                         

                                       /*if(empty($_SESSION['global_merge_data'] )) {
                                          $_SESSION['global_merge_data'] = $_SESSION['global_merge_data'] ;
                                       }*/
                                        
                                       // Afficher les données fusionnées
                                       if (!empty($_SESSION['global_merge_data'] )) {
                                         
                                             foreach ($_SESSION['global_merge_data']  as $date => $montants) {
                                                echo "<tr>";
                                                   echo "<th>" ."Day of conversion  : "  . $date . "</th>";
                                                   foreach ($montants as $key => $montant) {
                                                      echo "<tr> <td>". $montant . "</td> 
                                                                  <td>". convertFcfaToEuro($montant) . "</td>
                                                                  
                                                            </tr>";                                 
                                                   }
                                                  
                                                echo "</tr>";
                                             }                                        
                                       }
                                       else {
                                          echo "Aucune donnée disponible.";
                                       }
                                      
                                       //var_dump( $_SESSION['global_merge_data']);
                                       
                                  
                                    }

                              echo "</tbody>";
                        }
                     ?>

            </table>
            </div>


      
         
   </body>
</html>