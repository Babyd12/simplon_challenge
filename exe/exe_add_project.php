
<?php 
    session_start();
    if(isset($_GET['add_pj'])){
    
        $checking = ['nom_projet', 'propriétaire', 'description'];
        $error = false;
        $error_msg = [];
        $regex_date = '/^([0-2][0-9]|3[0-1])-([0-9]|1[0-2])-[0-9]{4}$/';
        $regex_text_field = "/^[a-zA-Z0-9À-ÿ\s]*$/";
        
        unset($_SESSION['errorsArray']);
        foreach ($checking as $check) {
            if (trim(empty($_GET[$check]))) {
                $error = true;
                $error_msg[] = 'Le champ ' . $check . ' est vide.';
            }else if(!preg_match($regex_text_field, $_GET[$check])){
                $error = true;
                $error_msg[] = 'Vous avez saisi des caractères non acceptable.';
            }else if(is_numeric($_GET[$check])){
                $error = true;
                $error_msg[] = 'Un projet ne peut etre de type numérique.';
            }

            }
        }
        
        if(!preg_match($_GET['date'], $regex_date)){
            $error = true;
            $error_msg[] = 'Le type de date n\'est pas valide';
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
                
            ],
            'partenaires' => [
            //['activité' => 'Information', 'description' => ' Reunion D\'information pour les participants du projet ', 'date' =>'11/04/2022'],
                
            ]

        ];
        
            $_SESSION['projets'][] = $nouveauProjet;
            //print_r($_SESSION['projets']);
            header('location:../project.php');
            
        }

        
    