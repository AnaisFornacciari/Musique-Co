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
        
        <meta name="keywords" content="opensource rich wysiwyg text editor jquery bootstrap execCommand html5" />
        <meta name="description" content="This tiny jQuery Bootstrap WYSIWYG plugin turns any DIV into a HTML5 rich text editor" />
        <link rel="apple-touch-icon" href="//mindmup.s3.amazonaws.com/lib/img/apple-touch-icon.png" />
        <link rel="shortcut icon" href="http://mindmup.s3.amazonaws.com/lib/img/favicon.ico" >
        <link href="external/google-code-prettify/prettify.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="external/jquery.hotkeys.js"></script>
        <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
        <script src="external/google-code-prettify/prettify.js"></script>
        <script src="bootstrap-wysiwyg.js"></script>
        <style>
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
            body {
                font: 400 17px/1.8 Lato, sans-serif;
                color: #3C3939;
            }
            /* Overwrite default styles of h3 and h4 */
            h3, h4 {
                margin: 10px 0 30px 0;
                letter-spacing: 10px;      
                font-size: 24px;
                color: #111;
            }
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
            .carousel-inner img {
                -webkit-filter: grayscale(90%);
                filter: grayscale(90%); /* make all photos black and white */ 
                width: 100%; /* Set width to 100% */
                margin: auto;
            }
            .carousel-caption h3 {
                color: #fff !important;
            }
            @media (max-width: 600px) {
                .carousel-caption {
                display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
                }
            }
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
            .bg-1 {
                background: #2d2d30;
                color: #bdbdbd;
            }
            .bg-1 h3 {color: #fff;}
            .bg-1 p {font-style: italic;}
            /* Remove rounded borders from list */
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
            /* On hover, the color of .btn will transition to white with black text */
            .btn:hover, .btn:focus {
                border: 1px solid #333;
                background-color: #fff;
                color: #000;
            }
            /* Add a dark gray background color to the modal header and center text */
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
            /* Add a dark background color with a little bit see-through */
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
            /* Add a gray color to all navbar links */
            .navbar li a, .navbar .navbar-brand { 
                color: #d5d5d5 !important;
            }
            /* On hover, the links will turn white */
            .navbar-nav li a:hover {
                color: #fff !important;
            }
            /* The active link */
            .navbar-nav li.active a {
                color: #fff !important;
                background-color: #29292c !important;
            }
            /* Remove border color from the collapsible button */
            .navbar-default .navbar-toggle {
                border-color: transparent;
            }
            /* Dropdown */
            .open .dropdown-toggle {
                color: #fff;
                background-color: #555 !important;
            }
            /* Dropdown links */
            .dropdown-menu li a {
                color: #000 !important;
            }
            /* On hover, the dropdown links will turn orange */
            .dropdown-menu li a:hover {
                background-color: #f4511e !important;
            }
            /* Add a dark background color to the footer */
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
            /* Remove rounded borders on input fields */
            .form-control {
                border-radius: 0;
            }
            /* Disable the ability to resize textareas */
            textarea {
                resize: none;
            }
            .bandeau-inner img {
                -webkit-filter: grayscale(90%);
                filter: grayscale(90%); /* make all photos black and white */ 
                width: 100%; /* Set width to 100% */
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
            /* Tableau responsive */
            table {
                border-collapse: separate;
                border-spacing: 50px 4px; /* Nombre de pixels d'espace horizontal (50px), vertical (8px) */
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

            div[data-role="editor-toolbar"] {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            }

            .dropdown-menu a {
            cursor: pointer;
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
                <?php
                    $monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                    if(substr($monUrl, 35, 9) == "afficher/")
                    { $route = null; }
                    else
                    { $route = "afficher/"; }
                    $id = 1;
                ?>
                <a class="navbar-brand" href="<?php echo $route.$id ?>">Musique & Co</a>
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
                                    ?> <li><a href="<?php echo $route.$id ?>" title="<?php echo  $nomMenu ?>"><?php echo  $nomMenu ?></a></li> <?php
                                }
                                else
                                {
                                    ?> <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo  $nomMenu ?>
                                        <span class="caret"></span></a>
                                        <ul class="dropdown-menu"> <?php
                                        $lesSousMenus = $this->pdo->getSousMenu($nomMenu);
                                        foreach($lesSousMenus as $leSousMenu)
                                        {
                                            $id = $leSousMenu['id'];
                                            $nomSousMenu = $leSousMenu['nomSousMenu'];
                                            $classement = $leSousMenu['classement'];
                                            ?> <li><a href="<?php echo $route.$id ?>" title="<?php echo  $nomSousMenu ?>"><?php echo  $nomSousMenu ?></a></li> <?php //route paramétrée avec l'id du menu
                                        } ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>
                    <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
                </ul>
                </div>
            </div>
        </nav>
        <?php echo $_SESSION['idAdmin']; ?>