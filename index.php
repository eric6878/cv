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

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Site web CV d'intégrateur développeur  éric coudert">
    <meta name="author" content="Curriculum Vitae éric coudert intégrateur développeur">

    <title>Eric Coudert site CV</title>

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

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">


    <!-- Intro Header -->
   
    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    Menu <i class="fa fa-bars"></i>
                </button>

                <a href="#btnConnexionAdmin"><i class="fa fa-play-circle btnAdmin" data-toggle="collapse" href="#btnConnexionAdmin" aria-expanded="false" aria-controls="linkConnexionAdmin"></i></a> <span class="light">Admin</span>
                <div class="collapse" id="btnConnexionAdmin">
                    <div class="card card-block">
                      <a id="linkConnexionAdmin" href="admin/authentification.php">Connexion</a>  
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
                        <a class="page-scroll active" href="#">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#xpNum">Numérique</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">À propos</a>
                    </li>
                    <!-- <li>
                        <a class="page-scroll" href="#">CV à télécharger</a>
                    </li> -->
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

                                <div id="titleXs">Intégrateur développeur web</div>
                                
                                <div class="junior">Junior</div>
                                <a href="#xpNum" id="pictoCircle" class="btn btn-circle page-scroll">
                                    <i id="btnFleche" class="fa fa-angle-double-down animated"></i>
                                </a>
                                </div>       
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="blockIcone" class="row">
                    <div class="col-lg-2 col-lg-offset-5">
                        <a href="#"><img src="img/pictoGitHub.ico" alt="Icone GitHub" /></a>     

                        <a href="#"><img src="img/pictoFacebook.png" alt="Icone Facebook" /></a>
       
                        <a href="#"><img src="img/pictoInstagram.png" alt="Icone Instagram" /></a>
                    </div>
                </div>
                <div id="blockDate" class="row">
                    <div class="col-lg-1 col-lg-offset-11 col-xs-12">
                        <?php 
                        $date = date("d-m-Y"); 
                        echo 'le ' . $date; 
                        ?>
                    </div>
                </div>

                <div id="blockHeure" class="row">
                    <div class="col-lg-1 col-lg-offset-11 col-xs-12">
                        <?php  
                        $heure = date("H:i A");
                        echo $heure; 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Compétences numériques Section -->
    <section id="xpNum" class="content-section text-center">
        <div id="imgParallax" class="download-section container parallax-window" data-parallax="scroll" data-image-src="img/imgParallax7.jpg">

            <div class="row">
            <h2>Numérique</h2>
                <div class="col-lg-12">
                    <div id="blockFormation" class="container">   
                        <div class="row">          
                            <div class="col-lg-4 col-lg-offset-4 formation">
                                <div class="service-item">
                                    <span class="fa-stack fa-4x">
                                        <i class="fa fa-circle-thin fa-stack-2x"></i>
                                        <i class="fa fa-info-circle fa-stack-1x text-primary pictoCv"></i>
                                    </span>
                                    
                                    <h3>Formation</h3>
                                    
                                    <p>2016- 2017<p>
                                    
                                    <p>
                                        <span id="titreFormation">
                                            <?php 
                                                $i = 0;
                                                while($i < count($formation)){
                                                    if($i > 0){
                                                        echo ' / ';
                                                    }
                                                    echo $formation[$i]['titre_formation'];
                                                    $i++;
                                                }
                                            ?>
                                        </span>
                                    </p>
                                    
                                    <p>Le PoleS, Grande École du Numérique</p>
                                    <p>Formation de 10 mois</p>
                                    <p>Villeneuve-la-Garenne</p>
                                </div>
                            </div>                                                
                        </div> 
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

                        <div class="col-md-3 col-sm-6">
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

                        <div class="col-md-3 col-sm-6">
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
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio">

        <!-- <div class="col-lg-6 formation">
            <div class="service-item">
                <span class="fa-stack fa-4x">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    <i class="fa fa-briefcase fa-stack-1x text-primary pictoCv"></i>
                </span>
            
                <h3>Projets</h3>
                
                <p>Intrégration d'un site CV dynamique</p>
                <p><a href="#">exemple site 1</a></p>
                <p>Intrégration d'un site Worpress</p>
                <p><a href="#">exemple site 2</a></p>
            </div>
        </div> -->


        <!-- carousel -->

        <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="img/imgPetronasTowers.jpg" alt="First slide">
                </div>
               
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="..." alt="Second slide">
                </div>
                
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="..." alt="Third slide">
                </div>    
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div> -->

    </section>

     <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div id="blockAbout" class="row">
            <div id="aboutRow" class="col-lg-12">
                
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

        <div id="blockPassions" class="row">
            <h3>Passions &amp; inspirations</h3>
            <div class="col-lg-12">
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
                <div id="img28" class="blockImage"></div>
                <div id="img29" class="blockImage"></div>
                <div id="img30" class="blockImage"></div>
                <div id="img31" class="blockImage"></div>
                <div id="img32" class="blockImage"></div>      
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact</h2>
                <p><?php echo $resultat['prenom'] . ' ' . $resultat['nom']; ?></a></p>
                <p><i class="fa fa-map-marker fa2 pictoContact"></i> <?php echo $resultat['adresse']; ?></p>
                <p><?php echo $resultat['ville'] . ' ' . $resultat['code_postal']; ?></p>
                <p><i class="fa fa-globe fa2 pictoContact"></i> FRANCE</p>
                <p><i class="fa fa-envelope-o fa2 pictoContact"></i> <a href="mailto:feedback@startbootstrap.com"><?php echo $resultat['email'] ?></a></p>
                <p><i class="fa fa-phone fa2 pictoContact"></i> <?php echo $resultat['telephone'] ?></a></p>
                <form  method="POST">
                    <label>Votre email</label>
                    <input class="form form-control" type="email" />
                    <label>Votre message</label>
                    <input class="form form-control" type="text" /><br />
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <br />
                <br />
                <br />
                <ul class="list-inline banner-social-buttons">
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
    <div id="map"></div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">           
            <p>Copyright&copy;2017 Site CV éric coudert</p>           
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
    <!-- <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div id="xxx" class="row container-fluid">
            <div class="col-lg-1 col-xs-2">
                <a id="btnAdmin" class="btn btn-primary" data-toggle="collapse" href="#linkConnexionAdmin" aria-expanded="false" aria-controls="collapseExample">
                Admin
                </a>
                <div class="collapse" id="linkConnexionAdmin">
                    <a href="admin/authentification.php">Connexion</a>
                </div>
            </div>

            <div class="col-lg-offset-5 col-lg-6 col-xs-offset-10 col-xs-1"> -->
               
                <!-- Collect the nav links, forms, and other content for toggling -->
               
                <!-- <div id="navCenter" class="collapse navbar-collapse navbar-main-collapse">
                    <ul class="nav navbar-nav"> -->
                        
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        
                        <!-- <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a id="linkHome" class="page-scroll" href="#">Home</a>
                        </li>
                        <li>
                            <a id="linkXpNum" class="page-scroll linkNav" href="#xpNum">XP numérique</a>
                        </li>
                        <li>
                            <a id="linkPortfolio" class="page-scroll linkNav" href="#">Portfolio</a>
                        </li>
                        <li>
                            <a id="linkDownloadCv" class="page-scroll linkNav" href="#downloadCv">CV à télécharger</a>
                        </li>
                        <li>
                            <a id="linkAbout" class="page-scroll linkNav" href="#about">À propos</a>
                        </li>
                        <li>
                            <a id="linkContact" class="page-scroll linkNav" href="#contact">Contact</a>
                        </li>
                    </ul> 
                </div>
            </div> --> <!-- /.navbar-collapse -->

            <!-- <div class="input-group col-lg-2">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div> -->
        
        <!-- </div> -->

        <!-- /.container -->

   <!--  </nav> -->
