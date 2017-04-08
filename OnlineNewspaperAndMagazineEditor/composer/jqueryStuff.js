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
			
			$("#addBox").draggable({helper:'clone'});
			
			
			$("#mainSection").droppable({
				//accept:"#addBlock",
				
				drop: function(ev, ui){
					//console.log(ev);
					var droppedItem = $(ui.draggable({helper:'clone'}));
					$("#draggableDiv").append(droppedItem).css("left",(x_axis - 244)).css("top",(y_axis - 73));
					$("#draggableDiv").draggable();
					
					alert("item dropped!!");
				}
				
			});
			
			// grid in the main section
			$("#draggableDiv").draggable();
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
			//To get the mouse position
			
			
		});