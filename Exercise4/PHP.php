<html>
<head>
<title>Exercise 4</title>

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
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>


</body>
</html>