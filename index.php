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
                                          $mergedData = [];
                                          foreach ($_SESSION['date_history'] as $entry) {
                                             $date = $entry['date'];
                                             if (!isset($mergedData[$date])) {
                                                $mergedData[$date] = [];
                                             }
                                       }
                                       
                                       foreach ($_SESSION['val'] as $entry) {
                                             $date = $entry['date'];
                                             $montant = $entry['montant'];
                                             if (isset($mergedData[$date])) {
                                                $mergedData[$date][] = $montant;
                                             }
                                       }
                                       // Afficher les données fusionnées
                                       if (!empty($mergedData)) {
                                         
                                             foreach ($mergedData as $date => $montants) {
                                                echo "<tr>";
                                                   echo "<th>" ."Day of conversion  : "  . $date . "</th>";
                                                   foreach ($montants as $montant) {
                                                      echo "<tr> <td>". $montant . "</td> 
                                                                  <td>". $_SESSION['output_value'] . "</td>
                                                                  
                                                            </tr>";

                                                 
                                                   }
                                                  
                                                echo "</tr>";
                                             }
                                         
                                       }
                                       else {
                                          echo "Aucune donnée disponible.";
                                       }
                                  
                                    }

                              echo "</tbody>";
                        }
                     ?>

            </table>
            </div>


      
         
   </body>
</html>