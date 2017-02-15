<?php
include'include/dbConnect.php';
$id = $_REQUEST['id'];
$query = "select * from newstext where id like '$id'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Newspaper and Magazine Editor</title>

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
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">Online Newspaper and Magazine Editor</a>
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
                        <h1>Reporter</h1>
                        <h3>Select from following</h3>
                        <hr class="intro-divider">
                        <form method="post" enctype="multipart/form-data">
                        <ul class="list-inline intro-social-buttons">
                            <li>
								<div class="form-group">
									<label for="usr"><h3>Heading:</h3></label>
									<input type="text" class="form-control" name="heading" value="<?php echo $row[1]; ?>">
								</div>
                            </li><br/>
                            <li>
                                <div class="form-group">
									<label for="usr"><h3>Subheading:</h3></label>
									<input type="text" class="form-control" name="subHeading" value="<?php echo $row[2]; ?>">
								</div>
                            </li><br/>
                            <li>
                                <div class="form-group">
									<label for="usr"><h3>Type news here:</h3></label>
									<textarea class="form-control" rows="5" name="text"><?php echo $row[3]; ?></textarea>
								</div>
                            </li><br/>
							<li>
                                <select name="type" style="color:black">
									<option value="<?php echo $row[7]; ?>"><?php echo $row[7]; ?></option>
									<option value="Entertainment">Entertainment</option>
									<option value="Sports">Sports</option>
									<option value="Business">Business</option>
									<option value="World">World</option>
									<option value="Politics">Politics</option>
									<option value="Technology">Technology</option>
									<option value="Education">Education</option>
								</select><span style="color:red">*</span>
                            </li><br/><br/>
							<li>
                                <button type="submit" class="btn btn-default" name="sumit">Submit</button>
                            </li><br/>
                        </ul>
						</form>
						
						<?php
						if(isset($_POST['heading'])&&
							isset($_POST['subHeading'])&&
							isset($_POST['type'])&&
							isset($_POST['text']) &&
							isset($_POST['sumit'])
						){
							$heading = $_POST['heading'];
							$subHeading = $_POST['subHeading'];
							$type = $_POST['type'];
							$text = $_POST['text'];
							
							$query="UPDATE `newstext` SET `heading` = '$heading', `subheading` = '$subHeading', `text` = '$text',`catagory` = '$type' WHERE `newstext`.`id` = '$id'";
							$result = mysql_query($query);
							if($result){
								?>
									<script type="text/javascript">
									window.location.href = 'allReports.php';
									</script>
								<?php
							}else{
								?><script>alert("Error uploading data");</script><?php
							}
						}
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
