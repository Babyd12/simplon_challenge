<?php session_start(); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Test</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <div class="row"> 
        <section class="section">
          <header>
            <h3>Covid Test</h3>
            <h4>Be safe and sure</h4>
          </header>
          <main>
            <form action="exe/exe_enreg.php" method="get">
              <div class="form-item box-item">
                <input type="text" name="name" placeholder="Name" data-required>
                <p class = "errorReq" > <?php  if(empty($_SESSION['name'])) {echo "Empty Input"; }; ?> </p>
                
              </div>

              <div class="form-item box-item">
                <input type="text" name="fristname" placeholder="Frist Name" data-required>
                <p class = "errorReq" > <?php  if(empty($_SESSION['fristname'])) {echo "Empty Input"; }; ?> </p>
              </div>



              <div class="form-item box-item">
                <input type="number" name="weight" min="2" placeholder="Weight" data-required>
                <p class = "errorReq" > <?php  if(empty($_SESSION['weight'])) {echo "Empty Input"; }; ?> </p>
              </div>

              <div class="form-item box-item">
                <input type="number" name="temperature" placeholder="temperature" step="any" min="32" max="43"  data-required>
                <p class = "errorReq" > <?php  if(empty($_SESSION['temperature'])) {echo "Empty Input"; }; ?> </p>
              </div>

              <div class="form-item box-item">
                <div class="form-item-triple">
                  <div class="radio-label"> 
                    <label class="label">Gender</label>
                  </div>
                  <div class="form-item"> 
                    <input id="dio" type="radio" name="gender" value="h" require>
                    <label for="dio">Homme</label> 
                  </div>

                  <div class="form-item"> 
                    <input id="din" type="radio" name="gender" value="f" require>
                    <label for="din">Femme</label>
                  </div>
                </div>
                <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
              </div>



              <div class="form-item box-item">
                <div class="form-item-triple">
                  <div class="radio-label"> 
                    <label class="label">Age Range</label>
                  </div>

                </div>
                <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
              </div>

              <div class="form-item box-item">
                <div class="form-item-triple">

                  <div class="form-item"> 
                    <input id="child" type="radio" name="agerange" value="child" require>
                    <label for="child">0 à 15 ans</label>
                  </div>

                </div>
                <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
              </div>
              <div class="form-item box-item">
                <div class="form-item-triple">

                  <div class="form-item"> 
                    <input id="teenager" type="radio" name="agerange" value="teenager" require>
                    <label for="teenager">15 à 25 ans</label>
                  </div>

                </div>
                <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
              </div>
              <div class="form-item box-item">
                <div class="form-item-triple">

                  <div class="form-item"> 
                    <input id="adult" type="radio" name="agerange" value="adult" require>
                    <label for="adult">26 à 65 ans</label>
                  </div>

                </div>
                <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
              </div>
              <div class="form-item box-item">
                <div class="form-item-triple">

                  <div class="form-item"> 
                    <input id="old" type="radio" name="agerange" value="old" require>
                    <label for="old">65 à Plus ans</label>
                  </div>

                </div>
                <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
              </div>
              
              <div class="form-item box-item">
                <div class="form-item-triple">
                  <div class="radio-label"> 
                    <label class="label">Headache</label>
                  </div>
                  <div class="form-item"> 
                    <input id="md" type="radio" name="headache" value="oui" require>
                    <label for="md">oui</label>
                  </div>

                  <div class="form-item"> 
                    <input id="mdn" type="radio" name="headache" value="non" require>
                    <label for="mdn">non</label>
                  </div>
                </div>
                <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
              </div>

              <div class="form-item box-item">
                <div class="form-item-triple">
                  <div class="radio-label"> 
                    <label class="label">Cough</label>
                  </div>
                  <div class="form-item"> 
                    <input id="to" type="radio" name="cough" value="oui" require>
                    <label for="to">oui</label>
                  </div>

                  <div class="form-item"> 
                    <input id="touxo" type="radio" name="cough" value="non" require>
                    <label for="touxo">non</label>  
                  </div>
                </div>
                <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
              </div>
              
              <div class="form-item box-item">
                <div class="form-item-triple">
                  <div class="radio-label"> 
                    <label class="label">Diarrhea</label>
                  </div>
                  <div class="form-item"> 
                    <input id="diarrheaO" type="radio" name="diarrhea" value="oui" require>
                    <label for="diarrheaO">oui</label>
                  </div>

                  <div class="form-item"> 
                    <input id="diarrheaN" type="radio" name="diarrhea" value="non" require>
                    <label for="diarrheaN">non</label>
                  </div>
                </div>
                <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
              </div>

              
              <div class="form-item box-item">
                <div class="form-item-triple">
                  <div class="radio-label"> 
                    <label class="label">Weight loss </label>
                  </div>
                  <div class="form-item"> 
                    <input id="perte" type="radio" name="weightloss" value="oui" require>
                    <label for="perte">oui</label>
                  </div>

                  <div class="form-item"> 
                    <input id="ptn" type="radio" name="weightloss" value="non" require>
                    <label for="ptn">non</label>
                  </div>
                </div>
                <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
              </div>

              <div class="form-item">
                <input type="submit" value="Submit" class="submit" id="submit" name="action">
               
              </div>
           
            </form>
           
          </main>

          <footer>
            <p>Get source code on github  <a href="#">Click Here</a></p>
          </footer>
          <i class="wave"></i>
        </section>
        <!-- Section 2 -->


        <?php 
         
           if(isset( $_SESSION['percentage'] )){
            
              if( $_SESSION['percentage'] >= 0 &&  $_SESSION['percentage'] <=30){
                echo "
                  <section class='section_show'>
                    <header>
                      <h3>Result of your Covid Test</h3>
                      <h4>Vous êtes dans la Zone Verte : Restez Cool </h4>
                    </header>
                    <main>
                        <p> Name : ".$_SESSION['nom']." </p>
                        <p> Average risk of being contaminated : ".$_SESSION['percentage']." %</p> <br>                    
                        <p> Vous présentez actuellement un faible risque d'infection. Continuez de suivre les mesures de sécurité recommandées, telles que le port du masque dans les lieux publics, le lavage fréquent des mains et la distanciation sociale. Restez vigilant et surveillez votre santé. </p>  
                    </main>
                    <i class='wave'></i>
                  </section>

                ";
              }
              else if( $_SESSION['percentage'] >= 31 &&  $_SESSION['percentage'] <=60){
                echo "
                    <section class='section_show'>
                    <header>
                      <h3>Result of your Covid Test</h3>
                      <h4> Précaution Mode : Niveau Jaune ! </h4>
                    </header>
                    <main>
                        <p> Name : ".$_SESSION['name']." </p>
                        <p> Average risk of being contaminated : ".$_SESSION['percentage']." %</p> <br>
                        <p>Votre résultat indique un risque modéré. Il est important de limiter les contacts sociaux non essentiels et de surveiller de près votre santé. Si vous présentez des symptômes tels que fièvre, toux ou essoufflement, contactez immédiatement un professionnel de la santé.</p>  
                    </main>
                    <i class='wave'></i>
                  </section>
                ";
              }
              else if( $_SESSION['percentage'] >= 61 &&  $_SESSION['percentage'] <=100){
                echo "
                <section class='section_show'>
                <header>
                  <h3>Result of your Covid Test</h3>
                  <h4> Attention ! Zone Rouge : Suivez les Directives </h4>
                </header>
                <main>
                    <p> Name : ".$_SESSION['nom']." </p>
                    <p> Average risk of being contaminated : ".$_SESSION['percentage']." %</p> <br>
                    <p>Votre résultat montre un risque élevé d'infection. Il est impératif de s'isoler immédiatement pour éviter la propagation du virus. Contactez immédiatement un professionnel de la santé pour des conseils et un dépistage supplémentaires. Suivez les recommandations des autorités sanitaires locales </p>  
                </main>
                <i class='wave'></i>
              </section>
            ";
              }
           }

    
        ?>



      </div>

   

    
<!-- Section 2 -->


</body>
</html>