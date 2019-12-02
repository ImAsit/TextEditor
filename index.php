<link rel="stylesheet" href="textEditor/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<script src="textEditor/jquery-3.4.1.min.js"></script>
<script src="textEditor/bootstrap.min.js"></script>
<?php include('textEditor/editor.php') ?>
<?php
$link = mysqli_connect("localhost","root","","demo");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
<?php
if(isset($_REQUEST['Sendbutton'])){
	$fname = $_REQUEST['fname'];
	$myText1 = $_REQUEST['myText1'];
	$myText2 = $_REQUEST['myText2'];
	$res = mysqli_query($link, "INSERT INTO editor_example SET f_name='$fname', text_one='$myText1', text_two='$myText2'");
	if($res){
		echo "Done";
	}else{
		echo "Failed";
	}
}
?>
<div>
	<form method="post">
		<div>
			<label>Full Name</label>
			<input type="text" name="fname">
		</div>
		<div>
			<textarea name="myText1" id="textarea1" class="htmlTextEditor"></textarea>
		</div>
		<br>		<br>		<br>		<br>
		<div>
			<textarea name="myText2" id="textarea2" class="htmlTextEditor"></textarea>
		</div>
		<input type="submit" name="Sendbutton" value="Send">
	</form>
</div>