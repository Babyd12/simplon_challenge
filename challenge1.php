<?php session_start(); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <!--/*After rebase */-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Test</title>
    <link rel="stylesheet" href="css/challenge1.css">
</head>
<body>
    <div class="row"> 
        <section class="section">
          <header>
            <h3>Covid Test</h3>
            <h4>Be Safe And Sure</h4>
          </header>
          <main>
            <?php
                if (!empty($_SESSION['errorsArray'])) {
                  foreach ($_SESSION['errorsArray'] as $errorMessage) {
                      echo "<p  class='errorReq'>Error :" . $errorMessage . "</p>\n";
                  }
                  // Ne réinitialisez pas $_SESSION['errorsArray'] à false ici
                } else {
                  echo "Thanks for testing";
                }
          ?>

            <form action="exe/exe_challenge1.php" method="get">

              <label for="name">Name</label>
              <div class="form-item box-item">               
                <input type="text" name="name"  value="<?php if(!empty($_SESSION['name'])) {echo ($_SESSION['name']);  } ?>"  >                         
              </div>

              <label for="fristname">Frist Name</label>
              <div class="form-item box-item">
                <input type="text" name="fristname"  value= "<?php if(!empty($_SESSION['fristname'])) {echo ($_SESSION['fristname']);  } ?>" >         
              </div>


              <label for="weight">Weight</label>
              <div class="form-item box-item">         
                <input type="text" name="weight" min="2"  value = "<?php if(!empty($_SESSION['weight'])) {echo ($_SESSION['weight']);  } ?>">
              </div>

              <label for="temperature">Temperature</label>
              <div class="form-item box-item">
                <input type="text" name="temperature"  value= "<?php if(!empty($_SESSION['temperature'])) {echo ($_SESSION['temperature']);  } ?>"  > 
              </div>

              <div class="form-item box-item">
                <div class="form-item-triple">
                  <div class="radio-label"> 
                    <label class="label">Gender</label>
                  </div>
                  <div class="form-item"> 
                    <input id="dio" type="radio" name="gender" value="h" <?php if(!empty($_SESSION['gender']) && $_SESSION['gender']=="h"  ){echo 'checked="checked"'; }; ?>   >
                    <label for="dio">Homme</label> 
                  </div>

                  <div class="form-item"> 
                    <input id="din" type="radio" name="gender" value="f" <?php if(!empty($_SESSION['gender']) && $_SESSION['gender']=="f" ){echo 'checked="checked"'; }; ?>   >
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
                    <input id="child" type="radio" name="agerange" value="child" <?php if(!empty($_SESSION['agerange']) && $_SESSION['agerange']=="child" ){echo 'checked="checked"'; }; ?>    >
                    <label for="child">0 à 15 ans</label>
                  </div>

                </div>
                <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
              </div>
              <div class="form-item box-item">
                <div class="form-item-triple">

                  <div class="form-item"> 
                    <input id="teenager" type="radio" name="agerange" value="teenager" <?php if(!empty($_SESSION['gender']) && $_SESSION['gender']=="f" ){echo 'checked="checked"'; }; ?> >
                    <label for="teenager">15 à 25 ans</label>
                  </div>

                </div>
                <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
              </div>
              <div class="form-item box-item">
                <div class="form-item-triple">

                  <div class="form-item"> 
                    <input id="adult" type="radio" name="agerange" value="adult" <?php if(!empty($_SESSION['agerange']) && $_SESSION['agerange']=="adult" ){echo 'checked="checked"'; }; ?>>
                    <label for="adult">26 à 65 ans</label>
                  </div>

                </div>
                <small class="errorOnce"><i class="fa fa-asterisk" aria-hidden="true"></i> choose at least one</small>
              </div>
              <div class="form-item box-item">
                <div class="form-item-triple">

                  <div class="form-item"> 
                    <input id="old" type="radio" name="agerange" value="old" <?php if(!empty($_SESSION['agerange']) && $_SESSION['agerange']=="old" ){echo 'checked="checked"'; }; ?> >
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
                    <input id="md" type="radio" name="headache" value="oui" <?php if(!empty($_SESSION['headache']) && $_SESSION['headache']=="oui" ){echo 'checked="checked"'; }; ?>  >
                    <label for="md">oui</label>
                  </div>

                  <div class="form-item"> 
                    <input id="mdn" type="radio" name="headache" value="non" <?php if(!empty($_SESSION['headache']) && $_SESSION['headache']=="non" ){echo 'checked="checked"'; }; ?> >
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
                    <input id="to" type="radio" name="cough" value="oui"  <?php if(!empty($_SESSION['cough']) && $_SESSION['cough']=="oui" ){echo 'checked="checked"'; }; ?> >
                    <label for="to">oui</label>
                  </div>

                  <div class="form-item"> 
                    <input id="touxo" type="radio" name="cough" value="non" <?php if(!empty($_SESSION['cough']) && $_SESSION['cough']=="non" ){echo 'checked="checked"'; }; ?> >
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
                    <input id="diarrheaO" type="radio" name="diarrhea" value="oui"  <?php if(!empty($_SESSION['diarrhea']) && $_SESSION['diarrhea']=="oui" ){echo 'checked="checked"'; }; ?> >
                    <label for="diarrheaO">oui</label>
                  </div>

                  <div class="form-item"> 
                    <input id="diarrheaN" type="radio" name="diarrhea" value="non" <?php if(!empty($_SESSION['diarrhea']) && $_SESSION['diarrhea']=="non" ){echo 'checked="checked"'; }; ?> >
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
                    <input id="perte" type="radio" name="weightloss" value="oui" <?php if(!empty($_SESSION['weightloss']) && $_SESSION['weightloss']=="oui" ){echo 'checked="checked"'; }; ?>  >
                    <label for="perte">oui</label>
                  </div>

                  <div class="form-item"> 
                    <input id="ptn" type="radio" name="weightloss" value="non" <?php if(!empty($_SESSION['weightloss']) && $_SESSION['weightloss']=="non" ){echo 'checked="checked"'; }; ?> >
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
         
           
            
              if( $_SESSION['percentage'] >= 0 &&  $_SESSION['percentage'] <=30 && $_SESSION['errors'] == false ){
                echo "
                  <section class='section_show'>
                    <header>
                      <h3>Result of your Covid Test</h3>
                      <h4>Vous êtes dans la Zone Verte : Restez Cool </h4>
                    </header>
                    <main>
                        <p> Name : ".$_SESSION['name']." </p>
                        <p> Age : ".$_SESSION['agerange']." </p>
                        <p> Temperature : ".$_SESSION['temperature']." </p>
                        <p> Weight : ".$_SESSION['weight']." </p>
                        
                        <p> Average risk of being contaminated : ".$_SESSION['percentage']." %</p> <br>                    
                        <p> Vous présentez actuellement un faible risque d'infection. Continuez de suivre les mesures de sécurité recommandées, telles que le port du masque dans les lieux publics, le lavage fréquent des mains et la distanciation sociale. Restez vigilant et surveillez votre santé. </p>  
                    </main>
                    <i class='wave'></i>
                  </section>

                ";
              } else if( $_SESSION['percentage'] >= 31 &&  $_SESSION['percentage'] <=60  &&  $_SESSION['errors'] == false ){
                echo "
                    <section class='section_show'>
                    <header>
                      <h3>Result of your Covid Test</h3>
                      <h4> Précaution Mode : Niveau Jaune ! </h4>
                    </header>
                    <main>
                        <p> Name : ".$_SESSION['name']."  </p>
                        <p> fristname : ".$_SESSION['fristname']."  </p>
                        <p> Age Range : ".$_SESSION['agerange']."  </p>
                        <p> Weight : ".$_SESSION['weight']."  </p>
                        <p> Temperature : ".$_SESSION['temperature']."  </p>
                        <p> <strong> Average risk of being contaminated </strong> : ".$_SESSION['percentage']." %</p> <br>
                        <p>Votre résultat indique un risque modéré. Il est important de limiter les contacts sociaux non essentiels et de surveiller de près votre santé. Si vous présentez des symptômes tels que fièvre, toux ou essoufflement, contactez immédiatement un professionnel de la santé.</p>  
                    </main>
                    <i class='wave'></i>
                  </section>
                ";
              }else if( $_SESSION['percentage'] >= 61 &&  $_SESSION['percentage'] <=100 && $_SESSION['errors'] == false ){
                echo "
                <section class='section_show'>
                <header>
                  <h3>Result of your Covid Test</h3>
                  <h4> Attention ! Zone Rouge : Suivez les Directives </h4>
                </header>
                <main>
                    <p> Name : ".$_SESSION['name']." </p>
                    <p> Average risk of being contaminated : ".$_SESSION['percentage']." %</p> <br>
                    <p>Votre résultat montre un risque élevé d'infection. Il est impératif de s'isoler immédiatement pour éviter la propagation du virus. Contactez immédiatement un professionnel de la santé pour des conseils et un dépistage supplémentaires. Suivez les recommandations des autorités sanitaires locales </p>  
                </main>
                <i class='wave'></i>
              </section>
            ";
              }
           

    
        ?>



      </div>

   

    
<!-- Section 2 -->


</body>
</html>