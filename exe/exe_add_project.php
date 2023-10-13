
<?php 
    session_start();
    if(isset($_GET['add_pj'])){
    
        $checking = ['nom_projet', 'propriétaire', 'description'];
        $error = false;
        $error_msg = [];
        
        foreach ($checking as $check) {
            if (trim(empty($_GET[$check]))) {
                $error = true;
                $error_msg[] = 'Le champ ' . $check . ' est vide.';
            }
        }
        
        if ($error) {
            $_SESSION['errorsArray'] = $error_msg;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
           
        }else{

           unset($_SESSION['errorsArray']);
           $nouveauProjet = [
            'nom_projet' => $_GET['nom_projet'],
            'propriétaire' => $_GET['propriétaire'],
            'description' => $_GET['description'],
            'statu' => 'inactif',
            'activitées' => [
            //['activité' => 'Information', 'description' => ' Reunion D\'information pour les participants du projet ', 'date' =>'11/04/2022'],
                [],
            ]

        ];
        
            $_SESSION['projets'][] = $nouveauProjet;
            //print_r($_SESSION['projets']);
            header('location:../project.php');
            
        }

        
    }