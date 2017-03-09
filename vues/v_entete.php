<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Musique & Co</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/> <!--compatibiliténternet explorer-->
        <meta name="viewport" content="width=device-width, initial-scale=1"/> <!--compatibilité mobile-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>-->

        <meta name="keywords" content="opensource rich wysiwyg text editor jquery bootstrap execCommand html5" />
        <meta name="description" content="This tiny jQuery Bootstrap WYSIWYG plugin turns any DIV into a HTML5 rich text editor" />
        <script src="../bootstrap-wysiwyg.js"></script>
        <script src="../external/jquery.hotkeys.js"></script>
        <link href="../external/google-code-prettify/prettify.css" rel="stylesheet">
        <script src="../external/google-code-prettify/prettify.js"></script>
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">

        <style>
            /* Responsivité de l'écran */
            @media screen and (max-width: 480px) {
            body {
                font-size: 90%;
            }
            }

            @media screen and (min-width: 1000px) {
            body {
                font-size: 110%;
            }
            }
            
            /* Corps du site */
            body {
                font: 400 17px/1.8 Lato, sans-serif;
                color: #3C3939;
            }
            /* Remplacer les styles par défaut de h3 et h4 */
            h3, h4 {
                margin: 10px 0 30px 0;
                letter-spacing: 10px;      
                font-size: 24px;
                color: #111;
            }

            /* Taille des container */
            .container {
                padding: 50px 100px;
            }

            .person {
                border: 10px solid transparent;
                margin-bottom: 25px;
                width: 80%;
                height: 80%;
                opacity: 0.7;
            }
            .person:hover {
                border-color: #f1f1f1;
            }

            /* image carousel */
            .carousel-inner img {
                -webkit-filter: grayscale(90%);
                filter: grayscale(90%); /* mettre toutes les photos en noir et blanc */ 
                width: 100%; /* Définir la largeur à 100% */
                margin: auto;
            }
            /* titre image carousel */
            .carousel-caption h3 {
                color: #f4511e !important;
            }
            /* contenu image carousel */
            .carousel-caption p {
                color: #f4511e !important;
            }
            /* Responsivité du carousel */
            @media (max-width: 600px) {
                .carousel-caption {
                display: none; /* Masquer le texte carrousel lorsque l'écran a moins de 600 pixels de large */
                }
            }
            /* Controle gauche et droite carousel*/
            .carousel-control.right, .carousel-control.left {
                background-image: none;
                color: #f4511e;
            }
            .carousel-indicators li {
                border-color: #f4511e;
            }
            .carousel-indicators li.active {
                background-color: #f4511e;
            }

            /* bandeau (ex : pied) */
            .bg-1 {
                background: #2d2d30;
                color: #bdbdbd;
            }
            /* Ecriture du bandeau (ex : pied) */
            .bg-1 h3 {color: #fff;}
            .bg-1 p {font-style: italic;}

            /* Supprimer les bordures arrondies de la liste */
            .list-group-item:first-child {
                border-top-right-radius: 0;
                border-top-left-radius: 0;
            }
            .list-group-item:last-child {
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }
            /* Remove border and add padding to thumbnails */
            .thumbnail {
                padding: 0 0 15px 0;
                border: none;
                border-radius: 0;
            }
            .thumbnail p {
                margin-top: 15px;
                color: #555;
            }
            /* Black buttons with extra padding and without rounded borders */
            .btn {
                padding: 10px 20px;
                background-color: #333;
                color: #f1f1f1;
                border-radius: 0;
                transition: .2s;
            }
            /* On hover, la couleur de .btn passera au blanc avec le texte noir */
            .btn:hover, .btn:focus {
                border: 1px solid #333;
                background-color: #fff;
                color: #000;
            }
            /* Ajoutez une couleur de fond gris foncé à l'en-tête modal et au texte central */
            .modal-header, h4, .close {
                background-color: #333;
                color: #fff !important;
                text-align: center;
                font-size: 30px;
            }
            .modal-header, .modal-body {
                padding: 40px 50px;
            }
            .nav-tabs li a {
                color: #777;
            }
            #googleMap {
                width: 100%; 
                height: 300px;
                -webkit-filter: grayscale(100%);
                filter: grayscale(100%);
            }
            /* Ajoutez une couleur foncée d'arrière-plan avec un peu de transparence */
            .navbar {
                font-family: Montserrat, sans-serif;
                margin-bottom: 0;
                background-color: #2d2d30;
                border: 0;
                font-size: 11px !important;
                letter-spacing: 4px;
                opacity: 0.9;
                padding: 8px;
            }
            /* Ajouter une couleur grise à tous les liens de navbar */
            .navbar li a, .navbar { 
                color: #d5d5d5 !important;
            }
            .navbar-brand {
                color: #f4511e !important;
            }
            /* On hover, les liens deviennent blancs */
            .navbar-nav li a:hover {
                color: #fff !important;
            }
            /* Le lien actif */
            .navbar-nav li.active a {
                color: #fff !important;
                background-color: #29292c !important;
            }
            /* Supprimer la couleur de la bordure du bouton rabattable */
            .navbar-default .navbar-toggle {
                border-color: transparent;
            }
            /* Menu déroulan */
            .open .dropdown-toggle {
                color: #fff;
                background-color: #555 !important;
            }
            /* Menu déroulant lien */
            .dropdown-menu li a {
                color: #000 !important;
            }
            /* On hover, les liens déroulants deviendront orange */
            .dropdown-menu li a:hover {
                background-color: #f4511e !important;
            }
            /* Menu scroll galerie */
            #myScrollspy {
                top: 10%;
                color: #f4511e;
            }
            /* Ajouter une couleur d'arrière-plan sombre au pied de page */
            footer {
                background-color: #f4511e;
                color: #f5f5f5;
                padding: 10px;
            }
            footer a {
                color: #f5f5f5;
            }
            footer a:hover {
                color: #777;
                text-decoration: none;
            }
            /* Supprimer les bordures arrondies sur les champs d'entrée */
            .form-control {
                border-radius: 0;
            }
            /* Disable the ability to resize textareas */
            textarea {
                resize: none;
            }
            .bandeau-inner img {
                -webkit-filter: grayscale(90%);
                filter: grayscale(90%); /* mettre toutes les photos en noir et blanc */ 
                width: 100%; /* Définir la largeur à 100% */
                margin: auto;
            }
            /*.row-same-height {
            display: table;
            width: 100%;
            }
            .col-sm-height {
            display: table-cell;
            float: none;
            }
            .col-full-height {
            height: 100%;
            vertical-align: middle;
            }*/
            .row-eq-height {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display:         flex;
            }
            table {
                border-collapse: separate;
                border-spacing: 50px 4px; /* Nombre de pixels d'espace horizontal (50px), vertical (8px) */
            }
            /* Responsivité du message */
            @media (max-width: 600px) {
                .containerMessage{
                display: none; /* Masquer le container du message lorsque l'écran a moins de 600 pixels de large */
                }
            }
            blockquote{
                border-left:none;
            }

            .quote-badge{
                background-color: rgba(0, 0, 0, 0.2);   
            }
            .quote-box{
                overflow: hidden;
                margin-top: -50px;
                padding-top: -100px;
                border-radius: 17px;
                background-color: #f4511e;
                margin-top: 25px;
                color:white;
                width: 300px;
                box-shadow: 2px 2px 2px 2px #E0E0E0;
            }
            .quotation-mark{
                margin-top: -20px;
                font-weight: bold;
                font-size:70px;
                color:white;
                font-family: "Times New Roman", Georgia, Serif;
            }
            .quote-text{
                font-size: 19px;
                margin-top: -65px;
            }
            .containerMessage {
                position: fixed;
                top: 30%;
                right: 0;
                z-index:4;
            }
            .hide-bullets {
            list-style:none;
            margin-left: -40px;
            margin-top:20px;
            max-width: 1200px;
            max-height : 240px;
            overflow:scroll;
            }
            #editor {
            max-height: 250px;
            height: 250px;
            background-color: white;
            border-collapse: separate; 
            border: 1px solid rgb(204, 204, 204); 
            padding: 4px; 
            box-sizing: content-box; 
            -webkit-box-shadow: rgba(0, 0, 0, 0.0745098) 0px 1px 1px 0px inset; 
            box-shadow: rgba(0, 0, 0, 0.0745098) 0px 1px 1px 0px inset;
            border-top-right-radius: 3px; border-bottom-right-radius: 3px;
            border-bottom-left-radius: 3px; border-top-left-radius: 3px;
            overflow: scroll;
            outline: none;
            }
            #voiceBtn {
            width: 20px;
            color: transparent;
            background-color: transparent;
            transform: scale(2.0, 2.0);
            -webkit-transform: scale(2.0, 2.0);
            -moz-transform: scale(2.0, 2.0);
            border: transparent;
            cursor: pointer;
            box-shadow: none;
            -webkit-box-shadow: none;
            }

            .table-editable {
            position: relative;
            
            .glyphicon {
                font-size: 20px;
            }
            }

            .table-remove {
            color: #700;
            cursor: pointer;
            
            &:hover {
                color: #f00;
            }
            }

            .table-up, .table-down {
            color: #007;
            cursor: pointer;
            
            &:hover {
                color: #00f;
            }
            }

            .table-add {
            color: #070;
            cursor: pointer;
            position: absolute;
            top: 8px;
            right: 0;
            
            &:hover {
                color: #0b0;
            }
            }
        </style>

    </head>
  
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

        <!-- Navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <?php $id = 1; ?>
                <a class="navbar-brand" href="afficher-<?php echo $id ?>">Musique And Co</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    $classement = 1;
                    foreach($LesMenus as $leMenu) //boucle pour afficher les menus stockées dans la BDD
                    {
                        if($leMenu['archive'])
                        {
                            if($classement < $leMenu['classement'])
                            {
                                $id = $leMenu['id'];
                                $nomMenu = $leMenu['nomMenu'];
                                $sousMenu = $leMenu['sousMenu'];
                                $classement = $leMenu['classement'];
                                if(!$sousMenu)
                                {
                                    ?> <li><a href="afficher-<?php echo $id ?>" title="<?php echo  $nomMenu ?>"><?php echo  $nomMenu ?></a></li> <?php
                                }
                                else
                                {
                                    ?> <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo  $nomMenu ?>
                                        <span class="caret"></span></a>
                                        <ul class="dropdown-menu"> <?php
                                        $lesSousMenus = $this->pdo->getSousMenus($nomMenu);
                                        foreach($lesSousMenus as $leSousMenu)
                                        {
                                            $id = $leSousMenu['id'];
                                            $nomSousMenu = $leSousMenu['nomSousMenu'];
                                            $classement = $leSousMenu['classement'];
                                            ?> <li><a href="afficher-<?php echo $id ?>" title="<?php echo  $nomSousMenu ?>"><?php echo  $nomSousMenu ?></a></li> <?php //route paramétrée avec l'id du menu
                                        } ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                            }
                        }
                    }
                    if($app['couteauSuisse']->estConnecte())
                    {
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-cog"></span>
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="modifierMenu" title="modifierMenu">MODIFIER LE MENU</a></li>
                                <li><a href="deconnexionAdmin" title="deconnexionAdmin">DECONNEXION</a></li>
                            </ul>
                        </li><?php
                    }?>
                </ul>
                </div>
            </div>
        </nav>