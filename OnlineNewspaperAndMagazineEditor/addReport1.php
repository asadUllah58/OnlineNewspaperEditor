<?php
	include'include/dbConnect.php';
?>

<html>

	<body>
		<form method="POST" enctype = "multipart/form-data">
			heading: <input type="text" name="heading" /><span style="color:red">*</span><br/><br/>
			Sub-heading: <input type="text" name="sHeading" /><span style="color:red">*</span><br/><br/>
			
			<select name="type">
				<option value="">-Select News Type</option>
				<option value="Entertainment">Entertainment</option>
				<option value="Sports">Sports</option>
				<option value="Business">Business</option>
				<option value="World">World</option>
				<option value="Politics">Politics</option>
				<option value="Technology">Technology</option>
				<option value="Education">Education</option>
			</select><span style="color:red">*</span><br/><br/>
			Enter report: <br/><textarea rows="10" cols="50" name="text" > </textarea><span style="color:red">*</span><br/><br/>
			<input type = "file" name = "image1"/><br/><br/>
			<input type = "file" name = "image2"/><br/><br/>
			<input type = "file" name = "image3"/><br/><br/>
			<input type = "file" name = "image4"/><br/><br/>
			<input type = "file" name = "image5"/><br/><br/>
			<input type = "submit" name = "sumit" value = "Upload"/>
		</form>
		
		<?php
			if(isset($_POST['heading'])&&
				isset($_POST['sHeading'])&&
				isset($_POST['type'])&&
				isset($_POST['text']) &&
				isset($_POST['sumit'])
			){
				$heading = $_POST['heading'];
				$subHeading = $_POST['sHeading'];
				$type = $_POST['type'];
				$text = $_POST['text'];
				
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
				
				date_default_timezone_set('Asia/Karachi');
				$date = date('l, jS, F');
				$time = date('h:iA');
				$query = "insert into reports(heading, subheading, type, text, date, time, image1, image2, image3, image4, image5) values('$heading', '$subHeading', '$type', '$text', '$date', '$time', '$image1', '$image2', '$image3', '$image4', '$image5')";
				$result = mysql_query($query);
				if($result){
					header("Location:reports.php");
				}else{
					echo "Failure: ".$result.mysql_error();
				}
				
				
				unset($_POST['heading']);
				unset($_POST['sHeading']);
				unset($_POST['type']);
				unset($_POST['text']);
				unset($_POST['image1']);
				unset($_POST['image2']);
				unset($_POST['image3']);
				unset($_POST['image4']);
				unset($_POST['image5']);
				unset($_POST['sumit']);
				
			}
		?>
	</body>

</html>