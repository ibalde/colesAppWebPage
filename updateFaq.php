
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Kennesaw State University - Coles College of Business</title>
    <meta content="" name="keywords" />
    <meta content="" name="description">
    <meta content="KSU MadLab" name="author">
    
    <meta content='True' name='HandheldFriendly' />
    <meta content='width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;' name='viewport' />
    <meta name="viewport" content="width=device-width">
    
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" >

function checkBlank(){
	if(document.myForm.question.value == ""){
		alert("Please enter a value for the question!");
		document.myForm.question.focus();
		return false;
	}
	if(document.myForm.answer.value == ""){
		alert("Please enter a value for the answer!");
		document.myForm.answer.focus();
		return false;
	}
}
function confirmAction(){
	if(confirm("Are you sure you want to proceed?")){
		return true;
	}
	else return false;
}
</script>

</head>
<body>
    <header>
        <div id="logo" class="constrain">
            <!-- background added in the css -->
            <img src="images/layout/logo.png" alt="Kennesaw State University - Coles College of Business" />
        </div>
        <nav>
            <ul class="constrain">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Manual Intervention</a></li>
                <li><a href="updateFaq.php">PHP-Update</a></li>
                <li><a href="#">Site Navigation </a></li>
                <li><a href="#">Specific Details</a></li>
            </ul>
        </nav>
    </header>
    <div id="content" class="constrain">
        <h1>ADD, DELETE, & UPDATE FAQs</h1>
        <p>
            <?php
require_once 'myAdminLogin.php';
//This function updates the timestamp table each time an FAQ is added, deleted, or updated
if(isset($_POST['addFaq']) || isset($_POST['deleteUpdate'])){
		date_default_timezone_set('America/New_York');
		$timestamp = time();
		$anotherQuery = "UPDATE `test`.`updateData` SET `timestamp`='$timestamp' WHERE `key`= 1";
		$execute5 = mysql_query($anotherQuery);
		if(!$execute5) die ("Failed to update timestamp: ".mysql_error());
}

//This function adds an FAQ to the FAQ table
if (isset($_POST['question']) &&
isset($_POST['answer']))
{
	$question = get_post('question');
	$answer = get_post('answer');

	$query2 = "INSERT INTO `test`.`faq` (`question`, `answer`) VALUES ('$question', '$answer')";
	$execute2 = mysql_query($query2);
	if(!$execute2) die ("Failed to execute second query ".mysql_error()."<br />");

}

//This function deletes or updates an FAQ in in the table
if(isset($_POST['deleteUpdate'])){
	$action = $_POST['submit'];
	$id = get_post('erase');
	$question1 = get_post('question1');
	$answer1= get_post('answer1');
	if($action=="DELETE FAQ"){
		$query = "DELETE FROM `test`.`faq` WHERE id ='$id'";
		$execute = mysql_query($query);
		if(!$execute) die ("Failed to execute Query: ".mysql_error()."<br />");
	}
	else{
		$queryEdit = "UPDATE faq SET question = '$question1', answer='$answer1' WHERE id='$id'";
		$executeEdit = mysql_query($queryEdit);
		if(!$executeEdit) die("Failed to edit FAQ: ".mysql_error());
	}

}
//This code displays the first form for the user to add a new faq to the table
echo <<<_END
<a href='/ws/index.php'>Return to index page</a>
<h3><i>Add a new FAQ to the database</i></h3>
<form  action='updateFaq.php' method='post' name='myForm' onsubmit="return checkBlank();"><pre>
<table><tr><td>Question: </td><td><input type="text" name="question" style="width:470px; height:30px;"/></td></tr>
<tr><td>Answer: </td><td><textarea name="answer" cols="58" rows="5"></textarea></td></tr></table>
<input type="hidden" name="addFaq" value="yes" />
<input type="submit" value="ADD FAQ" /></pre>
<br />
</form>

<h3><i>List of FAQs currently in Database</i></h3>
<br />
_END;

//This code displays the form allowing the user to either delete or update and FAQ
$query3 = "SELECT * FROM faq";
$execute3 = mysql_query($query3);
if(!$execute3) die ("Failed to execute third query: ".mysql_error());
$rows = mysql_num_rows($execute3);
for($i=0; $i<$rows; ++$i){
	$row = mysql_fetch_row($execute3);
	echo <<<_END
	<form action="updateFaq.php" method="post" onsubmit="return confirmAction();">
	<pre><table>
	<tr><td>Question: </td><td><input type="text" name="question1" style="width:470px; height:30px;" value="$row[1]"/></td></tr>
	<tr><td>Answer: </td><td><textarea name="answer1" cols="58" rows="5">$row[2]</textarea></td></tr>
	</table></pre>
	<input type="hidden" name="deleteUpdate" value="yes" />
	<input type="hidden" name="erase" value='$row[0]' />
	<input type="submit" name="submit" value="DELETE FAQ" />
	<input type="submit" name="submit" value="UPDATE FAQ" />
	</form><br />
_END;
}

//This function checks the validity of the input by the user
function get_post($var){
	return mysql_real_escape_string($_POST[$var]);
}

?>
        </p>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
 
