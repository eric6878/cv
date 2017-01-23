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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eric coudert site CV</title>

    <!-- Bootstrap Core CSS -->
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
    <![endif]--> <section>  

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" data-toggle="collapse" href="#btnConnexionAdmin">
                    <i class="fa fa-play-circle"></i>
                    <span class="light">Admin</span>
                    <div >
                        <a href="admin/authentification.php" >Connexion</a>
                    </div>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll active" href="#">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">Inspirations</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">À propos</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#downloadCv">CV à télécharger</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <form method="POST" action="#" class="form-inline">
                        <input type="search" value="search..." class="form-control" />
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form> 
                    </li>

                </ul> 
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
    <?php $sql = $pdoCV -> query("SELECT * FROM utilisateurs");
          $resultat = $sql -> fetch(); ?>
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">ID web<br /></h1>
                        <address><a href="#"><?= $resultat['email']; ?></a></address>
                        <h2 class="intro-text">
                        <br>
                        Intégrateur
                        <br />
                        développeur
                        <br />
                        web
                        <br>
                        junior
                        </h2>
                        <a href="#cv" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Download Section -->
    <section id="cv" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Curriculum Vitae</h2>
                    
                    <br />

                    <h3>Formation</h3>

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

                    <br /><br /><br />

                    <h3>Compétences numériques</h3>

                    <?php 
                        $i = 0;
                        while($i < count($competence)){
                            if($i > 0){
                                echo ' / ';
                            }
                            echo $competence[$i]['competence'];
                            $i++;
                        }
                    ?>

                    <br /><br /><br />

                    <h3>Expériences</h3>

                    <p>Intrégration d'un site CV dynamique<br />
                    <a href="#">exemple site 1</a></p>
                    <p>Intrégration d'un site web type Worpress<br />
                    <a href="#">exemple site 2</a></p>

                    <?php 
                        /*$i = 0;
                        while($i < count($experience)){
                            if($i > 0){
                                echo ' / ';
                            }
                            echo $experience[$i]['titre_xp'];
                            $i++;
                        }*/
                    ?>
                    <br />
                    
                    <a href="http://startbootstrap.com/template-overviews/grayscale/" class="btn btn-default btn-lg">CV à télécharger</a>
                </div>
            </div>
        </div>
    </section>

     <!-- About Section -->
    <section class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                
                <h2>À mon propos</h2>
                
                <p>Agé de 38 ans, autonome, polyvalent et curieux,<br />
                j’ai démarré cette activité comme un hobby il y a 1 an,<br />
                puis ai décidé d'en faire mon métier par passion.</p>
                    <!--  <p>En effet, après plusieurs années passées dans les domaines de la restauration, de la livraison et du service, il m'a parut nécessaire de prendre un virage professionnel dans une ère numérique qui me semble incontournable aujourd'hui.
                     </p> -->
                <p>Concepteur de sites de A à Z ou bien de "frameworks",<br />
                je fais en sorte que mon code soit propre et optimisé le plus souvent possible.</p>

                <p>Passionné du web,<br /> je mets à contribution mon sens créatif et artistique à votre service,<br /> dans un domaine qui m'enthousiasme au plus haut point,<br /> convaincu que <a href="#">l' avenir s'écrit en lignes de code</a>..."</p>
           
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contactez-moi</h2>
                <p><a href="mailto:feedback@startbootstrap.com"><?php echo $resultat['email'] ?></a></p>
                <p><a href="mailto:feedback@startbootstrap.com"><?php echo $resultat['telephone'] ?></a></p>
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
            <p>Copyright&copy; Site CV éric coudert 2017</p>           
        </div>
    </footer>

    <!-- jQuery -->
    <script src="cssfrontbootstrap/vendor/jquery/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="cssfrontbootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Theme JavaScript -->
    <script src="cssfrontbootstrap/js/grayscale.min.js"></script>

</body>

</html>
