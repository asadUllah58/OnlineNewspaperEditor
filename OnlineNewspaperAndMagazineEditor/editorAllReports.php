<?php
	include'include/dbConnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View All Reports</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">Online Newspaper & Magazine</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="#">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Editor</h1>
                        <h3>List of reports</h3>
						
						<?php  
						
						$query = "select * from newstext";
						$result = mysql_query($query);
						while($row = mysql_fetch_array($result)){
						?>
                        <div class="row" style = "background-color: white;border: 1px solid black">
							<div class="col-md-2" style="color:black;">
								<p class="post-meta"> <?php echo $row[4]; ?> </p>
								<p class="post-meta"> <?php echo $row[5]; ?> </p>
							</div>
							<div class="col-md-4">
								<a href="viewReport.php?id=<?php echo $row[0]; ?>" class = "pull-left">
									<h2 class="post-title">
										<?php echo $row[1]; ?>
									</h2>
									<h3 class="post-subtitle">
										<?php echo $row[2]; ?>
									</h3>
									<p class="post-meta"> <?php echo $row[6]; ?> </p>
								</a>
								
							</div>
							<div class="col-md-6">
								<ul class="list-inline intro-social-buttons">
									<li class="pull-right" style="padding-top:20px;padding:10px">
										<a href="editReport.php?id=<?php echo $row[0];?>" class="btn btn-default btn-md"><i class="glyphicon glyphicon-pencil"></i> <span class="network-name">Edit</span></a>
									</li>
									<li class = "pull-right" style="padding:10px" >
										<a href="#" class="btn btn-default btn-md"><i class="glyphicon glyphicon-trash"></i> <span class="network-name">Delete</span></a>
									</li>
									<li class = "pull-right" style="padding:10px" >
										<a href="" class="btn btn-default btn-md" onclick="select();"><i class="glyphicon glyphicon-trash"></i> <span class="network-name">Select</span></a>
									
									</li>
									
								</ul>
								<script>
							function select(){
							<?php
								$quer = "UPDATE `newstext` SET `status` = 'selected' WHERE `newstext`.`id` = '$row[0]'";
								$res = mysql_query($quer);
							?>
							}
							
						</script>
							</div>
						</div>
											
						
									
						<?php } 
						
						?>
						
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
