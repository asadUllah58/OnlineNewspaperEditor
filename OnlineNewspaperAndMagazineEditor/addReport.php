<?php
	
	include'include/dbConnect.php';
	date_default_timezone_set('Asia/Karachi');
	$date = date('l, jS, F');
	$time = date('h:iA');
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
                        <h3>Fill the following</h3>
                        <hr class="intro-divider">
						<form method="post" enctype="multipart/form-data">
                        <ul class="list-inline intro-social-buttons">
                            <li>
								<div class="form-group">
									<label for="usr"><h3>Heading:</h3></label>
									<input type="text" class="form-control" name="heading">
								</div>
                            </li><br/>
                            <li>
                                <div class="form-group">
									<label for="usr"><h3>Subheading:</h3></label>
									<input type="text" class="form-control" name="subHeading">
								</div>
                            </li><br/>
                            <li>
                                <div class="form-group">
									<label for="usr"><h3>Type news here:</h3></label>
									<textarea class="form-control" rows="5" name="text"></textarea>
								</div>
                            </li><br/>
							<li>
                                <select name="type" style="color:black">
									<option value="">-Select News Type</option>
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
								<a id = "addImageButton" onclick="showElements()" style="padding: 10px; color: white; background-color:blue; ">Add Images</a>
								<input id="img1" style="visibility: hidden;" type = "file" name = "image1"/>
								<input id="img2" style="visibility: hidden;" type = "file" name = "image2"/>
								<input id="img3" style="visibility: hidden;" type = "file" name = "image3"/>
								<input id="img4" style="visibility: hidden;" type = "file" name = "image4"/>
								<input id="img5" style="visibility: hidden;" type = "file" name = "image5"/>
								<input id="img6" style="visibility: hidden;" type = "file" name = "image6"/>
								<input id="img7" style="visibility: hidden;" type = "file" name = "image7"/>
								<input id="img8" style="visibility: hidden;" type = "file" name = "image8"/>
								<input id="img9" style="visibility: hidden;" type = "file" name = "image9"/>
								<input id="img10" style="visibility: hidden;" type = "file" name = "image10"/>
								<script>
									function showElements(){
										document.getElementById("addImageButton").innerHTML = "";
										document.getElementById("addImageButton").style.padding = "0px";
										//$("img1").show();
										document.getElementById("img1").style.visibility = "visible";
										document.getElementById("img2").style.visibility = "visible";
										document.getElementById("img3").style.visibility = "visible";
										document.getElementById("img4").style.visibility = "visible";
										document.getElementById("img5").style.visibility = "visible";
										document.getElementById("img6").style.visibility = "visible";
										document.getElementById("img7").style.visibility = "visible";
										document.getElementById("img8").style.visibility = "visible";
										document.getElementById("img9").style.visibility = "visible";
										document.getElementById("img10").style.visibility = "visible";
									}
								</script>
							</li>
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
							
							$query="INSERT INTO `newstext` (`id`, `heading`, `subheading`, `text`, `date`, `time`, `status`, `catagory`) VALUES (NULL, '$heading', '$subHeading', '$text', '$date', '$time', 'pending', '$type');";
							$result = mysql_query($query);
							if($result){
								$id = mysql_insert_id();
								
								$image1 = addslashes($_FILES['image1']['tmp_name']);
								$image1 = file_get_contents($image1);
								$image1 = base64_encode($image1);
									
								$image2 = addslashes($_FILES['image2']['tmp_name']);
								$image2 = file_get_contents($image2);
								$image2 = base64_encode($image2);
								
								$image3 = addslashes($_FILES['image3']['tmp_name']);
								$image3 = file_get_contents($image3);
								$image3 = base64_encode($image3);
									
								$image4 = addslashes($_FILES['image4']['tmp_name']);
								$image4 = file_get_contents($image4);
								$image4 = base64_encode($image4);
								
								$image5 = addslashes($_FILES['image5']['tmp_name']);
								$image5 = file_get_contents($image5);
								$image5 = base64_encode($image5);
									
								$image6 = addslashes($_FILES['image6']['tmp_name']);
								$image6 = file_get_contents($image6);
								$image6 = base64_encode($image6);
									
								$image7 = addslashes($_FILES['image7']['tmp_name']);
								$image7 = file_get_contents($image7);
								$image7 = base64_encode($image7);
								
								$image8 = addslashes($_FILES['image8']['tmp_name']);
								$image8 = file_get_contents($image8);
								$image8 = base64_encode($image8);
								
								$image9 = addslashes($_FILES['image9']['tmp_name']);
								$image9 = file_get_contents($image9);
								$image9 = base64_encode($image9);
								
								$image10 = addslashes($_FILES['image10']['tmp_name']);
								$image10 = file_get_contents($image10);
								$image10 = base64_encode($image10);

								$q = "INSERT INTO `images` (`id`, `reportid`, `image1`, `image2`, `image3`, `iamge4`, `image5`, `image6`, `image7`, `image8`, `image9`, `image10`) VALUES (NULL, '$id', '$image1', '$image2', '$image3', '$image4', NULL, NULL, NULL, NULL, NULL, NULL)";
								$res = mysql_query($q);
								if($res){
									?><script>alert("Images uploaded successfully");</script><?php
								}else{
									?><script>alert("<?php echo mysql_error();?>");</script><?php
								}
								
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
                    <p class="copyright text-muted small">Copyright &copy; All Rights Reserved</p>
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
