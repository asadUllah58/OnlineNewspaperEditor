<html>

	<head>
	
		<link rel="stylesheet" href="main.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<link rel="stylesheet" type="text/css" href="jquery-ui.css">
		
		<!-- jQuery library -->	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="jquery-ui.js"></script>
		<!-- Latest compiled JavaScript -->	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script>
			var x_axis = 0; y_axis = 0;
		$(document).ready(function(){
			//
			//$("#innerUl").css("visibility", "hidden");
			$("#menubutton").click(function(){
				$("#innerUl").animate({height: 'toggle'},"slow");
			});
			
			$("#menubutton").mouseover(function(){
				$("#menubutton").css("cursor","pointer");
			});
			
			$("#box").mouseover(function(){
				$("#box").css("cursor","pointer");
				$("#boxDiv").css("visibility","visible");
				$("#boxDiv").css("width","100px");
				$("#boxDiv").css("height","100px");
			});
			
			$("#boxDiv").mouseover(function(){
				$("#boxDiv").css("visibility","visible");
			});
			
			$("#boxDiv").mouseleave(function(){
				$("#boxDiv").css("visibility","hidden");
				$("#boxDiv").css("width","0px");
				$("#boxDiv").css("height","0px");
			});
				
			var id = 0;
			// To add a new div in the main section
			$("#menubutton").click(function(){
					//alert("itemDropped!!");
					$("#mainSection").append("<div id='"+(id++)+"' class='newDiv' style='border:2px solid red; width:100px; height:100px; background-color:green; position:absolute; left:"+(x_axis - 245)+"px; top:"+(y_axis - 75)+"px;'></div>");
					$(".newDiv").draggable({
						containment : 'parent',
						opacity: 0.5
					});
					$(".newDiv").resizable();
			});
			
			// To change the properties of added div
			$(".newDiv").click(function(){
				var divId = $(this).attr("id");
				alert(divId);
			});
			// grid in the main section
			//$("#draggableDiv").draggable();
			$("#grid").click(function(){
				$("#grid1").toggle();
				$("#grid2").toggle();
				$("#grid3").toggle();
				$("#grid4").toggle();
			});
			
			
			//adding drag to the box in the box button
			$("#newDiv").draggable({helper:'clone'});
			$("#newDiv").resizable();
			
			//To get the mouse position
			$("#mainSection").mousemove(function(event){
				x_axis = event.pageX;
				y_axis = event.pageY;
				
			});
			//to change the background
			$("#backgroundButton").click(function(){
				$("#backgroundSub").animate({height: 'toggle'},"slow");
			});
			
			$("#red").draggable({
				helper:'clone', 
				opacity:0.3
			});
			$("#blue").draggable({
				helper:'clone', 
				opacity:0.3
			});
			
			$("#mainSection").droppable({
				
				drop: function(ev,ui){
					var id = ui.draggable.attr("id");
					if(id == "red" || id == "blue"){
						$("#mainSection").css("background-color",id);
					}
				}
			});
			
			$("#textButton").click(function(){
				$(".newDiv").text("something");
			});
		});
		</script>
	</head>
	
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Newspaper Editor</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#" id="grid">Grid</a></li>
					<li><a href="#">?</a></li>
					<li><a href="#">?</a></li>
				</ul>
			</div>
		</nav>
		
		<div class="container-fluid">
		
			<div class="row">
				<div class="col-md-2">
					<div class="button" >
						<span id="textButton" class="buttonStyle">Add text</span>
					</div><br/><br/>
					<div class="butto
					<div class="button" >
						<span id="menubutton" class="buttonStyle">Add Box</span>
					</div><br/><br/>
					<div class="button" >
						<span id="backgroundButton" class="buttonStyle">Backgrounds</span>
					</div><br/><br/>
					<div id="backgroundSub" style="height:0px; border:1px solid black;">
						<ul style="list-style-type:none; border:1px solid black">
							<li style="padding-bottom:10px;">
								<div id="red" style="width:100px; height:100px; border:1px solid black; background-color:red;">
								</div>
							</li>
							<li>
								<div id="blue" style="width:100px; height:100px; border:1px solid black; background-color:blue;">
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-10" id="mainSection">
					<div id="draggableDiv" style="position: absolute; left:0px; top:0px; z-index:2;">
					</div>
					<div style="border:1px solid black; height:400px; position:relative;">
						<div class="dottedGrid" id="grid1"></div>
						<div class="dottedGrid" id="grid2"></div>
						<div class="dottedGrid" id="grid3"></div>
						<div class="dottedGrid" id="grid4"></div>
					</div>
				</div>
			</div>
		</div>
	
	</body>

</html>