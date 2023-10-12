<?php
if (isset($_GET['action'])) {
    echo "J'ai reçu le formulaire";

    if (isset($_GET['name']) && isset($_GET['fristName']) && isset($_GET['agerange']) && isset($_GET['weight']) && isset($_GET['temperature']) && isset($_GET['agerange']) && isset($_GET['gender']) && isset($_GET['cough']) && isset($_GET['diarrhea']) && isset($_GET['weightloss'])) 
    {
        echo "J'ai stocké";
        
        $_SESSION['name'] = $_GET['name'];
        $_SESSION['fristName'] = $_GET['fristName'];
        $_SESSION['weight'] = $_GET['weight'];
        $_SESSION['temperature'] = $_GET['temperature'];
        $_SESSION['gender'] = $_GET['gender'];
        $_SESSION['agerange'] = $_GET['agerange'];
        $_SESSION['headache'] = $_GET['headache'];
        $_SESSION['cough'] = $_GET['cough'];
        $_SESSION['diarrhea'] = $_GET['diarrhea'];
        $_SESSION['weightloss'] = $_GET['weightloss'];

        $_SESSION['percentage'] = 0;

        

        // Vérification n2
        if (empty($_GET['name']) || empty($_GET['fristName']) || empty($_GET['agerange']) || empty($_GET['weight']) || empty($_GET['temperature']) || empty($_GET['agerange']) || empty($_GET['gender']) || empty($_GET['cough']) || empty($_GET['diarrhea']) || empty($_GET['weightloss'])) {
            echo 'Vide';

        } else {
            echo "Le formulaire n'est pas vide";
            //controle personalisé

            $radioFields = [ 'headache', 'cough', 'diarrhea', 'weightloss'];

            foreach ($radioFields as $field) {
                if (isset($_GET[$field]) && $_GET[$field] === 'oui') {
                    $_SESSION['percentage'] += 15;
                } else {
                    $_SESSION['percentage'] = 0;
                }
            }

            if ($_GET['temperature'] >= 32 || $_GET['temperature'] <= 36) {
                $_SESSION['percentage'] += 10;
            }else {
                $_SESSION['percentage'] += 30;
            }

            if ($_GET['weight'] > 50 ){
                $_SESSION['percentage'] += 30;
            }

            if ($_GET['agerange'] == "enfant" ) {
                $_SESSION['percentage'] += 10;
            }
            elseif ($_GET['agerange'] == ""){
                $_SESSION['percentage'] += 30;
            }elseif ($_GET['agerange'] >= 36 || $_GET['age'] < 70){
                $_SESSION['percentage'] += 50;
            }


            echo $_SESSION['percentage'];
          


        }
    }
} else {
    echo "Formulaire non reçu";
}
?>
