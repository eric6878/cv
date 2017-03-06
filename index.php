<!DOCTYPE html>
<?php require 'connexion/connexion.php'; ?>

<?php 
    $sql = $pdoCV -> query(" SELECT * FROM competences ");
    $competence = $sql -> fetchAll(); 
    $sql = $pdoCV -> query(" SELECT * FROM experiences ");
     $experience = $sql -> fetchAll();
    $sql = $pdoCV -> query(" SELECT * FROM formations ");
    $formation = $sql -> fetchAll(); 
    $sql = $pdoCV -> query(" SELECT * FROM loisirs ");
    $loisir = $sql -> fetchAll(); 
     $sql = $pdoCV -> query(" SELECT * FROM portfolio ");
    $portfolio = $sql -> fetchAll(); 
    $sql = $pdoCV -> query(" SELECT * FROM titres ");
    $titre = $sql -> fetchAll(); 
    $sql = $pdoCV -> query(" SELECT * FROM utilisateurs ");
    $utilisateur = $sql -> fetchAll(); 

      ?>

<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Site web CV d'intégrateur développeur  éric coudert">
    <meta name="author" content="Curriculum Vitae éric coudert intégrateur développeur">

    <title>Site CV Éric coudert</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="cssfront/printstyle.css" media="print" />
    <link href="cssfrontbootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="cssfrontbootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="cssfrontbootstrap/css/grayscale.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="cssfront/myfrontstyle.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->  

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" class="dont-break">


    <!-- Intro Header -->
   
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top hidden-print" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>

                <a href="#btnConnexionAdmin"><i class="fa fa-play-circle btnAdmin" data-toggle="collapse" href="#btnConnexionAdmin" aria-expanded="false" aria-controls="linkConnexionAdmin"></i></a> <span class="light">Admin</span>
                <div class="collapse" id="btnConnexionAdmin">
                    <div class="card card-block">
                      <a id="linkConnexionAdmin" href="admin/authentification.php" target="blank">Connexion</a>  
                    </div>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul id="navCenter" class="nav navbar-nav navbar-text-right">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a id="linkHome" class="page-scroll active" href="#">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#xpNum">Numérique</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="CvInDesign.pdf" target="_blank">CV à télécharger</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">À propos</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <header id="headerBackground" class="intro">
    <?php $sql = $pdoCV -> query("SELECT * FROM utilisateurs");
          $resultat = $sql -> fetch(); ?>
        <div id="titleBlock" class="intro-body">
            <div id="titleContainer" class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2"> 
                        <div class="row">
                            <div id="titleCenter" class="col-lg-12 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                                <h1>
                                    <?= $resultat['prenom'] . ' ' . $resultat['nom']; ?>
                                </h1>
                                <div id="title">
                                    <div class="titleContent1">
                                      <div class="black"><p>I</p></div>
                                      <div class="black">N</div>
                                      <div class="black">T</div>
                                      <div class="black">E</div>
                                      <div class="black">G</div>
                                      <div class="black">R</div>
                                      <div class="black">A</div>
                                      <div class="black">T</div>
                                      <div class="black">E</div>
                                      <div class="black">U</div>
                                      <div class="black">R</div>
                                    </div>
                                    <div class="titleContent2">
                                        <div id="black" class="phantom"><p>D</p></div>
                                        <div class="black">E</div>
                                        <div class="black">V</div>
                                        <div class="black">E</div>
                                        <div class="black">L</div>
                                        <div class="black">O</div>
                                        <div class="black">P</div>
                                        <div class="black">P</div>
                                        <div class="black">E</div>
                                        <div class="black">U</div>
                                        <div class="black">R</div>
                                    </div>
                                    <div class="titleContent2">
                                        <div id="white" class="phantom"></div>
                                        <div class="blackOut"></div>
                                        <div class="blackOut"></div>
                                        <div class="blackOut"></div>
                                        <div class="black">W</div>
                                        <div class="black">E</div>
                                        <div class="black">B</div>
                                        <div class="blackOut"></div>
                                        <div class="blackOut"></div>
                                        <div class="blackOut"></div>
                                        <div class="blackOut"></div>
                                    </div>
                                </div>

                                <div id="titleXs" class="hidden-print">Intégrateur développeur web</div>
                                
                                <div class="junior">Junior</div>
                                    <a href="#xpNum" id="pictoCircle" class="btn btn-circle page-scroll hidden-print">
                                        <i id="btnFleche" class="fa fa-angle-double-down animated"></i>
                                    </a>
                                </div>       
                            </div>
                        </div>
                    </div>
                </div>
                <?php date_default_timezone_set('Europe/Paris');?>
				
				<?php if(date_default_timezone_get()):?>
			
                <div id="blockIcone" class="row hidden-print">
                    <div class="col-lg-1">
                        <a href="http://lepoles.org/ma6tvacoder-lecole-du-web-des-quartiers-populaires/">Ma6TvaCoder</a>
                    </div>  

                    <div class="col-lg-2 col-lg-offset-4 col-sm-3 col-sm-offset-4 col-md-3 col-md-offset-4 col-xs-12">
                        <a href="#"><img src="img/pictoGitHub.png" alt="Icone GitHub" /></a>     

                        <a href="#"><img src="img/pictoFacebook.png" alt="Icone Facebook" /></a>
       
                        <a href="#"><img src="img/pictoInstagram.png" alt="Icone Instagram" /></a>
                    </div>

                    <div id="blockDateTime" class="col-lg-1 col-lg-offset-4 col-sm-2 col-sm-offset-3 col-md-2 col-md-offset-3 col-xs-12 hidden-print">
                        <?php 
                        $date = date('d-m-Y');
                        $heure = date("H:i A");
                        date_default_timezone_set('Europe/Paris');
                        echo 'Le ' .  $date . '<br />'; 
                        echo $heure; 
                        ?>
                    </div>
                </div>
           		<?php endif; ?>
            </div>
        </div>
    </header>
    
     
    <!-- Compétences numériques Section -->
    <section id="xpNum" class="content-section text-center hidden-print">
        <div id="imgParallax" class="download-section container parallax-window" data-parallax="scroll" data-image-src="img/imgBackgroundRocks11.jpg">        
            
            <div class="imgRoots" class="col-lg-12">
                <!-- imgBackgroundRootsUnderEarth --> <!-- <img src="img/imgBackgroundUnderEarth.jpg" alt="#" /> -->  
            </div>
            
            <div class="row">
                <h2>Numérique</h2>
                <div class="col-lg-12">
                    <div class="service-item">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                            <i class="fa fa-info-circle fa-stack-1x text-primary pictoCv"></i>
                        </span>
                        
                        <h3>Formation</h3>                       
                        <p>2016- 2017<p>                        
                        <p>
                            <span id="titreFormation">
                                Certification d'intégrateur développeur web
                            </span>
                        </p>                   
                        <p>Le PoleS, Grande École du Numérique</p>
                        <p>Formation de 10 mois</p>
                        <p>Villeneuve-la-Garenne</p>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                                    <i class="fa fa-connectdevelop fa-stack-1x text-primary pictoCv"></i>
                                </span>
                                
                                <h3>Intégration &amp; développement</h3>
                                
                                <p>HTML5 <i class="fa fa-star fa2 pictoStar"></i>
                                         <i class="fa fa-star fa2 pictoStar"></i>
                                         <i class="fa fa-star fa2 pictoStar"></i>
                                         <i class="fa fa-star-half-empty fa2 pictoStar"></i>
                                         <i class="fa fa-star-o fa2 pictoStar"></i>
                                </p>
                                
                                <p>CSS3 <i class="fa fa-star fa2 pictoStar"></i>
                                        <i class="fa fa-star fa2 pictoStar"></i>
                                        <i class="fa fa-star-half-empty fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                </p>

                                <p>JavaScript <i class="fa fa-star-half-empty fa2 pictoStar"></i>
                                              <i class="fa fa-star-o fa2 pictoStar"></i>
                                              <i class="fa fa-star-o fa2 pictoStar"></i>
                                              <i class="fa fa-star-o fa2 pictoStar"></i>
                                              <i class="fa fa-star-o fa2 pictoStar"></i>
                                </p>

                                <p>MySQL <i class="fa fa-star fa2 pictoStar"></i>
                                         <i class="fa fa-star fa2 pictoStar"></i>
                                         <i class="fa fa-star-o fa2 pictoStar"></i>
                                         <i class="fa fa-star-o fa2 pictoStar"></i>
                                         <i class="fa fa-star-o fa2 pictoStar"></i>
                                 </p>
                            

                                <p>PHP5 <i class="fa fa-star fa2 pictoStar"></i>
                                        <i class="fa fa-star fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                </p>
                                
                                <p>Git / Linux <i class="fa fa-star fa2 pictoStar"></i>
                                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                </p>
                            </div>
                        </div>

                        <div id="pictoFramework" class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                                    <i class="fa fa-laptop fa-stack-1x text-primary pictoCv"></i>
                                </span>
                                
                                <h3>Frameworks &amp; <acronym title="Système de gestion de contenu">CMS</acronym></h3>
                                
                                <p>Bootstrap 3 <i class="fa fa-star fa2 pictoStar"></i>
                                               <i class="fa fa-star fa2 pictoStar"></i>
                                               <i class="fa fa-star-half-empty fa2 pictoStar"></i>
                                               <i class="fa fa-star-o fa2 pictoStar"></i>
                                               <i class="fa fa-star-o fa2 pictoStar"></i>
                                </p>
                                
                                <p>Wordpress <i class="fa fa-star fa2 pictoStar"></i>
                                        <i class="fa fa-star-half-empty fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                </p>
                                
                                <p>Framework W <i class="fa fa-star fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                                    <i class="fa fa-envira fa-stack-1x text-primary pictoCv"></i>
                                </span>
                                
                                <h3>Web Design</h3>
                                
                                <p>InDesign <i class="fa fa-star fa2 pictoStar"></i>
                                            <i class="fa fa-star fa2 pictoStar"></i>
                                            <i class="fa fa-star-o fa2 pictoStar"></i>
                                            <i class="fa fa-star-o fa2 pictoStar"></i>
                                            <i class="fa fa-star-o fa2 pictoStar"></i>
                                </p>
                                
                                <p>Photoshop CC <i class="fa fa-star fa2 pictoStar"></i>
                                                <i class="fa fa-star-half-empty fa2 pictoStar"></i>
                                                <i class="fa fa-star-o fa2 pictoStar"></i>
                                                <i class="fa fa-star-o fa2 pictoStar"></i>
                                                <i class="fa fa-star-o fa2 pictoStar"></i>
                                </p>

                                
                                <p>Gimp <i class="fa fa-star fa2 pictoStar"></i>
                                        <i class="fa fa-star fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                        <i class="fa fa-star-o fa2 pictoStar"></i>
                                </p>

                                <p>Krita <i class="fa fa-star fa2 pictoStar"></i>
                                         <i class="fa fa-star fa2 pictoStar"></i>
                                         <i class="fa fa-star-o fa2 pictoStar"></i>
                                         <i class="fa fa-star-o fa2 pictoStar"></i>
                                         <i class="fa fa-star-o fa2 pictoStar"></i>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                                    <i class="fa fa-eye fa-stack-1x text-primary pictoCv"></i>
                                </span>
                               
                                <h3>Veille technologique</h3>
                                
                                <p>Symfony</p>
                                <p>Bootstrap 4</p>
                                <p>PHP7</p>
                            </div>
                        </div>
                    </div>        
                </div> 
            </div>

            <div class="imgRoots2 hidden-print" class="col-lg-12">
                <!-- imgBackgroundRootsUnderEarth --> <!-- <img src="img/imgBackgroundUnderEarth.jpg" alt="#" /> -->  
            </div>
        </div>
    </section>


    <section id="xxx" class="content-section text-center numerique">
        
        <!-- DEBUT visible-print-block formation -->
        <div class="row visible-print-block">
            <h2>Numérique</h2>
            <div class="col-xs-12">
                <div class="service-item">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                        <i class="fa fa-info-circle fa-stack-1x text-primary pictoCv"></i>
                    </span>
                    
                    <h3>Formation</h3>
                    
                    <p>2016 - 2017<p>
                    
                    <p>
                        <span id="titreFormation">
                            Certification d'intégrateur développeur web
                        </span>
                    </p>
                    
                    <p>Le PoleS, Grande École du Numérique</p>
                    <p>Formation de 10 mois</p>
                    <p>Villeneuve-la-Garenne</p>
                </div>
            </div>
        </div>
        <!-- FIN visible-print-block formation num -->


        <!-- DEBUT visible-print-block compétences num -->

        <div id="xxx" class="row visible-print-block">    
            <div class="col-xs-3">
                <div class="service-item">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                        <i class="fa fa-connectdevelop fa-stack-1x text-primary pictoCv"></i>
                    </span>
                    
                    <h3>Intégration &amp; développement</h3>
                    
                    <p>HTML5 <i class="fa fa-star fa2 pictoStar"></i>
                             <i class="fa fa-star fa2 pictoStar"></i>
                             <i class="fa fa-star fa2 pictoStar"></i>
                             <i class="fa fa-star-half-empty fa2 pictoStar"></i>
                             <i class="fa fa-star-o fa2 pictostar"></i>
                    </p>
                    
                    <p>CSS3 <i class="fa fa-star fa2 pictoStar"></i>
                            <i class="fa fa-star fa2 pictoStar"></i>
                            <i class="fa fa-star-half-empty fa2 pictoStar"></i>
                            <i class="fa fa-star-o fa2"></i>
                            <i class="fa fa-star-o fa2"></i>
                    </p>

                    <p>JavaScript <i class="fa fa-star fa2 pictoStar"></i>
                                  <i class="fa fa-star-o fa2 "></i>
                                  <i class="fa fa-star-o fa2"></i>
                                  <i class="fa fa-star-o fa2"></i>
                                  <i class="fa fa-star-o fa2"></i>
                    </p>

                    <p>MySQL <i class="fa fa-star fa2 pictoStar"></i>
                             <i class="fa fa-star fa2 pictoStar"></i>
                             <i class="fa fa-star-half-empty fa2 pictoStar"></i>
                             <i class="fa fa-star-o fa2"></i>
                             <i class="fa fa-star-o fa2"></i>
                     </p>
                

                    <p>PHP5 <i class="fa fa-star fa2 pictoStar"></i>
                            <i class="fa fa-star fa2 pictoStar"></i>
                            <i class="fa fa-star-half-empty fa2 pictoStar"></i>
                            <i class="fa fa-star-o fa2"></i>
                            <i class="fa fa-star-o fa2"></i>
                    </p>
                    
                    <p>Git / Linux <i class="fa fa-star fa2 pictoStar"></i>
                                            <i class="fa fa-star-o fa2"></i>
                                            <i class="fa fa-star-o fa2"></i>
                                            <i class="fa fa-star-o fa2"></i>
                                            <i class="fa fa-star-o fa2"></i>
                    </p>
                </div>
            </div>

            <div id="pictoFramework" class="col-xs-3">
                <div class="service-item">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                        <i class="fa fa-laptop fa-stack-1x text-primary pictoCv"></i>
                    </span>
                    
                    <h3>Frameworks &amp; <acronym title="Système de gestion de contenu">CMS</acronym></h3>
                    
                    <p>Bootstrap 3 <i class="fa fa-star fa2 pictoStar"></i>
                                   <i class="fa fa-star fa2 pictoStar"></i>
                                   <i class="fa fa-star-half-empty fa2 pictoStar"></i>
                                   <i class="fa fa-star-o fa2"></i>
                                   <i class="fa fa-star-o fa2"></i>
                    </p>
                    
                    <p>Wordpress <i class="fa fa-star fa2 pictoStar"></i>
                            <i class="fa fa-star-half-empty fa2 pictoStar"></i>
                            <i class="fa fa-star-o fa2"></i>
                            <i class="fa fa-star-o fa2"></i>
                            <i class="fa fa-star-o fa2"></i>
                    </p>
                    
                    <p>Framework W <i class="fa fa-star fa2 pictoStar"></i>
                            <i class="fa fa-star-o fa2"></i>
                            <i class="fa fa-star-o fa2"></i>
                            <i class="fa fa-star-o fa2"></i>
                            <i class="fa fa-star-o fa2"></i>
                    </p>
                </div>
            </div>

            <div class="col-xs-3">
                <div class="service-item">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                        <i class="fa fa-envira fa-stack-1x text-primary pictoCv"></i>
                    </span>
                    
                    <h3>Web Design</h3>
                    
                    <p>InDesign <i class="fa fa-star fa2 pictoStar"></i>
                                <i class="fa fa-star fa2 pictoStar"></i>
                                <i class="fa fa-star-o fa2"></i>
                                <i class="fa fa-star-o fa2"></i>
                                <i class="fa fa-star-o fa2"></i>
                    </p>
                    
                    <p>Photoshop CC <i class="fa fa-star fa2 pictoStar"></i>
                                    <i class="fa fa-star-half-empty fa2 pictoStar"></i>
                                    <i class="fa fa-star-o fa2"></i>
                                    <i class="fa fa-star-o fa2"></i>
                                    <i class="fa fa-star-o fa2"></i>
                    </p>

                    
                    <p>Gimp <i class="fa fa-star fa2 pictoStar"></i>
                            <i class="fa fa-star fa2 pictoStar"></i>
                            <i class="fa fa-star-o fa2"></i>
                            <i class="fa fa-star-o fa2"></i>
                            <i class="fa fa-star-o fa2"></i>
                    </p>

                    <p>Krita <i class="fa fa-star fa2 pictoStar"></i>
                             <i class="fa fa-star fa2 pictoStar"></i>
                             <i class="fa fa-star-o fa2"></i>
                             <i class="fa fa-star-o fa2"></i>
                             <i class="fa fa-star-o fa2"></i>
                    </p>
                </div>
            </div>

            <div class="col-xs-3">
                <div class="service-item">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                        <i class="fa fa-eye fa-stack-1x text-primary pictoCv"></i>
                    </span>
                   
                    <h3>Veille technologique</h3>
                    
                    <p>Symfony</p>
                    <p>Bootstrap 4</p>
                    <p>PHP7</p>
                </div>
            </div>
        </div>        
    <!-- FIN visible-print-block -->
    </section>
    

    <!-- Portfolio Section -->
    <section id="portfolio" class="content-section text-center parallax-window" data-parallax="scroll" data-image-src="img/rockBackground.jpg">
        <div class="imgRoots" class="col-lg-12">
            <!-- imgBackgroundRootsUnderEarth --> <!-- <img src="img/imgBackgroundUnderEarth.jpg" alt="#" /> -->  
        </div>
        
        <div id="portfolioRow" class="row hidden-print">

            <h2>Portfolio</h2>
            
            <div class="col-lg-6 col-sm-6 col-xs-12 portfolio">
                <h3><a href="#">Site CV web</a></h3>
                <div class="imgPortfolio1 hidden-print"></div>
            </div>
            
            <div class="col-lg-6 col-sm-6 col-xs-12 portfolio">
                <h3><a href="#">Site web Musi'Col</a></h3>
                <div class="imgPortfolio2 hidden-print"></div> 
            </div>
        </div>

        <!-- DEBUT visible-print-block portfolio -->
        <div id="portfolioRow" class="row visible-print-block">

            <h2>Portfolio</h2>
            
            <div class="col-xs-6 portfolio">
                <h3><a href="#">Site CV web</a></h3>
                <div class="imgPortfolio1 hidden-print"></div>
            </div>
            
            <div class="col-xs-6 portfolio">
                <h3><a href="#">Site web Musi'Col</a></h3>
                <div class="imgPortfolio2 hidden-print"></div> 
            </div>
        </div>

        <div class="imgRoots2 hidden-print" class="col-lg-12">
            <!-- imgBackgroundRootsUnderEarth --> <!-- <img src="img/imgBackgroundUnderEarth.jpg" alt="#" /> -->  
        </div>

        <!-- FIN visible-print-block portfolio-->
    
    </section>

     <!-- About Section -->
    <section id="about" class="container-fluid content-section text-center parallax-window" data-parallax="scroll" data-image-src="img/imgBackgroundRocks11.jpg">
        
        <div class="imgRoots" class="col-lg-12">
            <!-- imgBackgroundRootsUnderEarth --> <!-- <img src="img/imgBackgroundUnderEarth.jpg" alt="#" /> -->  
        </div>

        <div id="slideshowspace">
           <div id="slideshow">
               <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                   <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                   <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                   <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                 </ol>

                 <div class="carousel-inner" role="listbox">
                   <div class="item active">
                     <img class="slideimg" src="img/1pudong.JPG" alt="img/1pudong.JPG">
                     <div class="carousel-caption">
                     </div>
                   </div>
                   <div class="item">
                     <img class="slideimg" src="img/1skull.JPG" alt="img/1skull.JPG">
                     <div class="carousel-caption">
                     </div>
                   </div>
                   <div class="item">
                     <img class="slideimg" src="img/1portrait.JPG" alt="img/1portrait.JPG">
                     <div class="carousel-caption">
                     </div>
                   </div>
                 </div>

                 <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                   <span class="glyphicon glyphicon-chevron-left fa fa-arrow-circle-o-left" aria-hidden="true"></span>
                   <span class="sr-only">Previous</span>
                 </a>
                 <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                   <span class="glyphicon glyphicon-chevron-right fa fa-arrow-circle-o-right" aria-hidden="true"></span>
                   <span class="sr-only">Next</span>
                 </a>
               </div>
           </div>
       </div>
        
        <div id="blockPassions" class="row">
            <h4>Passions &amp; inspirations</h4>
            <div id="blockImgs" class="col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 hidden-print">
                <div id="img1" class="blockImage"></div>
                <div id="img2" class="blockImage"></div>
                <div id="img3" class="blockImage"></div>
                <div id="img4" class="blockImage"></div>
                <div id="img5" class="blockImage"></div>
                <div id="img6" class="blockImage"></div>
                <div id="img7" class="blockImage"></div>
                <div id="img8" class="blockImage"></div>
                <div id="img9" class="blockImage"></div>
                <div id="img10" class="blockImage"></div>
                <div id="img11" class="blockImage"></div>
                <div id="img12" class="blockImage"></div>
                <div id="img13" class="blockImage"></div>
                <div id="img14" class="blockImage"></div>
                <div id="img15" class="blockImage"></div>
                <div id="img16" class="blockImage"></div>
                <div id="img17" class="blockImage"></div>
                <div id="img18" class="blockImage"></div>
                <div id="img19" class="blockImage"></div>
                <div id="img20" class="blockImage"></div>
                <div id="img21" class="blockImage"></div>
                <div id="img22" class="blockImage"></div>
                <div id="img23" class="blockImage"></div>
                <div id="img24" class="blockImage"></div>
                <div id="img25" class="blockImage"></div>
                <div id="img26" class="blockImage"></div>
                <div id="img27" class="blockImage"></div>   
            </div>
            
            <!-- DEBUT visible-print-block passions et inspirations-->
            <div class="row rowPrint2">
                
                <div class="col-xs-3 visible-print-block">
                <h6>Sports</h6>
                    <ul>
                        <li>Ski,</li>
                        <li>Running,</li>
                        <li>Basket,</li>
                        <li>Tennis</li>
                    </ul>        
                </div>
                
                <div class="col-xs-3 visible-print-block">
                <h6>Arts &amp; culture</h6>
                    <ul>
                        <li>Musée,</li>
                        <li>Street Art</li>
                        <li></li>
                        <li></li>
                    </ul>      
                </div>

                <div class="col-xs-3 visible-print-block">
                <h6>Voyages</h6>
                    <ul>
                        <li>Asie du sud-est,</li>
                        <li>Europe du nord</li>
                    </ul>      
                </div>

                <div class="col-xs-3 visible-print-block">
                <h6>Divertissements</h6>
                    <ul>
                        <li>Échecs,</li>
                        <li>Rubik's cube,</li>
                        <li>Puzzle</li>
                    </ul>      
                </div>

            </div>
            <!-- FIN visible-print-block passions et inspirations-->

        </div>

        <div id="blockAbout" class="row hidden-print">
            <div id="aboutRow" class="col-lg-12 col-xs-12">
                
                <h2>À propos de moi...</h2>
            
                <p>Agé de 38 ans, autonome, polyvalent et curieux, j’ai démarré cette activité comme un hobby en 2016,</p>
                <p>puis ai décidé d'en faire mon métier par passion.</p>

                <p>Actuellement en formation au métier d'intégrateur développeur, j'apprends à concevoir des sites de type "frameworks / <acronym title="Système de Gestion des Contenus">CMS</acronym>",</p>
                <p>et fais en sorte que mon code soit optimisé le plus souvent possible.</p>

                <p>Passionné du web,</p>
                <P>je mets à disposition mon sens créatif et artistique au service de vos futurs projets numériques,</p>
                <p>convaincu que <a href="#">"l'avenir s'écrit en lignes de code..."</a></p>
           
            </div>
        </div>
        <div class="imgRoots2 hidden-print" class="col-lg-12">
                <!-- imgBackgroundRootsUnderEarth --> <!-- <img src="img/imgBackgroundUnderEarth.jpg" alt="#" /> -->  
            </div>
    </section>

    <br />

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center dont-break">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-xs-12">
                <h2>Contact</h2>
                <p><?php echo $resultat['prenom'] . ' ' . $resultat['nom']; ?></p>
                <p><i class="fa fa-map-marker fa2 pictoContact"></i> <?php echo $resultat['adresse']; ?></p>
                <p><?php echo $resultat['ville'] . ' ' . $resultat['code_postal']; ?></p>
                <p><i class="fa fa-globe fa2 pictoContact"></i> FRANCE</p>
                <p><i class="fa fa-envelope-o fa2 pictoContact"></i> <a href="mailto:feedback@startbootstrap.com"><?php echo $resultat['email'] ?></a></p>
                <p><i class="fa fa-phone fa2 pictoContact"></i> <?php echo $resultat['telephone'] ?></a></p>
                <form  method="POST" class="hidden-print">
                    <label>Votre email</label>
                    <input class="form form-control" type="email" />
                    <label>Votre message</label>
                    <input class="form form-control" type="text" /><br />
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <br />

                <ul class="list-inline banner-social-buttons hidden-print">
                    <li>
                        <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-instagram fa-fw"></i> <span class="network-name">Instagram</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

   
    <!-- Map Section -->
    <div id="map" class="hidden-print"></div>

   
    <!-- Footer -->
    <footer class="hidden-print">
        <div class="container-fluid text-center">           
            <div class="row">
                <div id="footerLinks" class="col-lg-4 col-xs-12">
                    <ul>
                        <li><a href="#linkConnexionAdmin">Home</a></li>
                        <li><a href="#xpNum">Numérique</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#">CV à télécharger</a></li>
                        <li><a href="#about">À propos</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                    <div id="footerCopyright" class="col-lg-4 col-xs-12">
                        <p>Copyright&copy;2017 Site CV éric coudert</p>
                    </div>
                <div id="footerPictos" class="col-lg-4 col-xs-12">
                    <a href="#"><img src="img/pictoGitHub.png" alt="Icone GitHub" /></a>     

                    <a href="#"><img src="img/pictoFacebook.png" alt="Icone Facebook" /></a>
       
                    <a href="#"><img src="img/pictoInstagram.png" alt="Icone Instagram" /></a>
                </div>          
            </div>           
        </div>
    </footer>

    <!-- Parallax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="parallax/parallax.js"></script>

  
    

	<script src="vendor/jquery/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
    <script src="cssfrontbootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Theme JavaScript -->
    <script src="cssfrontbootstrap/js/grayscale.min.js"></script>

</body>

</html>

