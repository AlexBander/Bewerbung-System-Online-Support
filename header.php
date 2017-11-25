<?php  include 'config.inc.php'; if (true): ?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- Bootstrap -->
        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- for the fucking iE from M$ next -->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <title>
            <?php echo "$firstname $name"; ?>
        </title>
        <link rel="stylesheet" href="css/bootstrap.css"> </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    <div class="hidden-xs "> <a class="navbar-brand" href="index.php"><img src="<?php echo $logo ?>" height="56" alt="<?php echo "$name"?>" /></a> </div>
                    <a class="navbar-brand hidden-lg hidden-md hidden-sm" href="#">
                        <?php echo "$firstname $name" ?>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="defaultNavbar1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="about.php">Über</a></li>
                        <li><a href="contact.php">Kontakt</a></li>
                        <li><a href="impressum.php">Impressum</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="col-lg-4 col-lg-offset-10 col-md-4 col-md-offset-10 col-sm-4 col-sm-offset-9 col-xs-4 col-xs-offset-9">
                <blockquote>
                    <h5 class="block"><img src="https://x4s.it/img/1x1.png" crossorigin="anonymous"/><b><?php echo "$firstname $next $name"?></b></h5>
                    <h6 class="block"><?php echo "''$motto ''" ?></h6>
                </blockquote>
            </div>
        </div>
<?php endif; session_start(); #5?>
