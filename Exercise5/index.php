<?php
	include_once 'dbconfig.php';
	if(isset($_POST['submit']))
		{
			//variables for input data
			$name = $_POST['name'];
			$nName = $_POST['nName'];
		    $email = $_POST['email'];
			$hAd = $_POST['hAd'];
			$gender = $_POST['gender'];
			$cNum = $_POST['cNum'];
			$comment = $_POST['comment'];
			//variables for input data
			
			// sql query for inserting data into database			 
			$sql_query = "INSERT INTO users(name,nName,email,hAd,gender,cNum,message) VALUES ('$name','$nName','$email','$hAd','$gender','$cNum','$comment')";
			mysqli_query($con,$sql_query);
			// sql query for inserting data into database
		}
?>

<html>
<head>
<title>HTML Exercise5</title>

</head>
<body bgcolor="#F6B6F8">

<font color="white"><h1><center>Mohammad Darwish T. Mustary</center></h1></font>
<center>(a.k.a. Wish)</center>

<center><img src="jb.jpg" alt="Justin Bieber Evolution" style="width:620px;height:400px;"></center>


<table style="width:100%">
 
  
<tr>
<th>
<p id="hobby">What's my favorite hobby?</p>

<button type="button" onclick="document.getElementById('hobby').innerHTML = 'Eating'">Click Me!</button>



<p id="religion">What is my religion?</p> 

<button type="button" onclick="document.getElementById('religion').innerHTML = 'Islam'">Click Me!</button>



<p id="food">What is my favorite food?</p>

<button type="button" onclick="document.getElementById('food').innerHTML = 'Sushi'">Click Me!</button>



<p id="animal">What is my favorite animal?</p>

<button type="button" onclick="document.getElementById('animal').innerHTML = 'Cats'">Click Me!</button>



<p id="born">When was I born?</p>

<button type="button" onclick="document.getElementById('born').innerHTML = 'March 9, 1998'">Click Me!</button>

</th>
</tr>

<?php
echo "<tr>\n";
echo "<th>\n";
echo "<p id=\"hobby\">What's my favorite hobby?</p>\n";
echo "\n";
echo "<button type=\"button\" onclick=\"document.getElementById('hobby').innerHTML = 'Eating'\">Click Me!</button>\n";
echo "\n";
echo "\n";
echo "\n";
echo "<p id=\"religion\">What is my religion?</p> \n";
echo "\n";
echo "<button type=\"button\" onclick=\"document.getElementById('religion').innerHTML = 'Islam'\">Click Me!</button>\n";
echo "\n";
echo "\n";
echo "\n";
echo "<p id=\"food\">What is my favorite food?</p>\n";
echo "\n";
echo "<button type=\"button\" onclick=\"document.getElementById('food').innerHTML = 'Sushi'\">Click Me!</button>\n";
echo "\n";
echo "\n";
echo "\n";
echo "<p id=\"animal\">What is my favorite animal?</p>\n";
echo "\n";
echo "<button type=\"button\" onclick=\"document.getElementById('animal').innerHTML = 'Cats'\">Click Me!</button>\n";
echo "\n";
echo "\n";
echo "\n";
echo "<p id=\"born\">When was I born?</p>\n";
echo "\n";
echo "<button type=\"button\" onclick=\"document.getElementById('born').innerHTML = 'March 9, 1998'\">Click Me!</button>\n";
?>
<?php
			$nameErr = $nNameErr = $emailErr = $genderErr = $cNumErr = $commentErr = "";
			$name = $nName = $email = $hAd = $gender = $cNum = $comment = "";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (empty($_POST["name"])) {
				$nameErr = "NAME IS REQUIRED ";
			} else {
				$name = test_input($_POST["name"]);
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$nameErr = "ONLY LETTERS ARE ALLOWED DUDE"; 
				}
			}
		  
			if (empty($_POST["nName"])) {
				$nNameErr = "NICKNAME IS REQUIRED ";
			} else {
				$nName = test_input($_POST["nName"]);
				if (!preg_match("/^[a-zA-Z ]*$/",$nName)) {
				$nNameErr = "ONLY LETTERS ARE ALLOWED DUDE"; 
				}
			}
		  
			if (empty($_POST["email"])) {
				$emailErr = "E-MAIL IS REQUIRED MAYNE";
			} else {
				$email = test_input($_POST["email"]);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "INVALID EMAIL FORMAT MAYNE"; 
				}
			}
		  
			if (empty($_POST["hAd"])) {
				$hAd = "";
			} else {
				$hAd = test_input($_POST["hAd"]);
			}
		  
			if (empty($_POST["gender"])) {
				$genderErr = "GENDER IS REQUIRED";
			} else {
				$gender = test_input($_POST["gender"]);
			}
		  
			if (empty($_POST["cNum"])) {
				$cNumErr = "NUMBER IS REQUIRED";
			} else {
				$cNum = test_input($_POST["cNum"]);
				if (!filter_var($cNum, FILTER_VALIDATE_INT) === FALSE) {
				$cNumErr = "NUMBERS ONLY MAYNE"; 
				}
			}
		  
			if (empty($_POST["comment"])) {
				$comment = "";
			} else {
				$comment = test_input($_POST["comment"]);
				}
			}
			function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
			}
		?>

		<h3>WANT TO SEND A MESSAGE? SCROLL DOWN</h3>

		<form method="post" >
			<div class="input">
				<div class="col1">
					NAME:
						<input type="text"  name="name" value="<?php echo $name;?>">
						<span class="error"> <?php echo $nameErr;?></span>
						<br><br>
					NICKNAME:
						<input type="text" name="nName" value="<?php echo $nName;?>">
						<span class="error"> <?php echo $nNameErr;?></span>
						<br><br>
					E-MAIL: 
						<input type="text" name="email" value="<?php echo $email;?>">
						<span class="error"> <?php echo $emailErr;?></span>
						<br><br>
					ADDRESS: 
					<textarea name="hAd" rows="3" cols="35"><?php echo $hAd;?></textarea>
				</div>
				<div class="col2">
					GENDER:
						<input type="radio" name="gender" value="FEMALE"/>FEMALE
						<input type="radio" name="gender" value="MALE"/>MALE
						<span class="error"> <?php echo $genderErr;?></span>					
						<br><br>
					CELLPHONE NUMBER:
						<input type="cNum" name="cNum" value="<?php echo $cNum;?>">
						<span class="error"> <?php echo $cNumErr;?></span>
						<br><br>
					COMMENT:
						<textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
						<br><br>
				</div>
			</div>
			
			<input type="submit" name="submit" value="SUBMIT" 
			style="background-color: white; color: red; border: white; font-family: simplifica; font-size: 35px; ">
			
		</form>
		<a href="messages.php" class=button>MESSAGES ARE HERE DUDE!</a>

</body>
</html>