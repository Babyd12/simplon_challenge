<?php session_start();
$_SESSION['constant_fcfa'] = 655.957;
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
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Made by user</td>
                        <td>User name</td>
                    </tr>
                    <tr class="active-row">
                        <td>Melissa</td>
                        <td>2220</td>
                        <td>2020</td>
                        <td>01-10-2022</td>
                    </tr>
                    <tr class="active-row">
                        <td>Melissa</td>
                        <td>2220</td>
                        <td>2020</td>
                        <td>01-10-2022</td>
                    </tr>
                
                   

                    <?php 
                        $date  =  date("Y/m/d");
                        $output = $_SESSION['euro_value']/$_SESSION['constant_fcfa'];

                        if(empty( ($_SESSION['history']) ) ){
                           echo"Your history has been cleaned up";
                        }
                        else{
                           foreach ($_SESSION['history'] as $value){
                              echo "
                             <tr class='active-row'>
                                <td>Melissa</td>
                                <td>".$value." </td>
                                <td>".number_format($output,2)."</td>
                                <td>".$date."</td>
                             </tr>
                             ";
                             /*echo "
                             
                                <td>Melissa</td>
                                <td>".$value." </td>
                          
                             ";*/                          
  
                          }
                        }


                     ?>

                    <!-- and so on... -->
                </tbody>
            </table>
            </div>
      
         
   </body>
</html>