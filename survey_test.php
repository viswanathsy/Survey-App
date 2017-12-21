<!DOCTYPE html>
<!--?php
	include_once 'db_config.php';
?-->
<html>
<head>
	<title>Attempt Survey</title>
	</script>
</head>

<body>
<div id = "survey_div">

<ul>
<li>1) Which buildings do you want access to?<br />
<input type="checkbox" name="formDoor[1][]" value="A" />Acorn Building<br />
<input type="checkbox" name="formDoor[1][]" value="B" />Brown Hall<br />
<input type="checkbox" name="formDoor[1][]" value="C" />Carnegie Complex<br />
<input type="checkbox" name="formDoor[1][]" value="D" />Drake Commons<br />
<input type="checkbox" name="formDoor[1][]" value="E" />Elliot House <br/>
<textarea name="formDoor[4][]"></textarea>
</li>

<li>2) Which buildings do you want access to?<br />
<input type="radio" name="formDoor[2][]" value="A" />Acorn Building<br />
<input type="radio" name="formDoor[2][]" value="B" />Brown Hall<br />
<input type="radio" name="formDoor[2][]" value="C" />Carnegie Complex<br />
<input type="radio" name="formDoor[2][]" value="D" />Drake Commons<br />
<input type="radio" name="formDoor[2][]" value="E" />Elliot House <br/>
<textarea name="formDoor[4][]"></textarea>
</li>

<li>3) Which buildings do you want access to?<br />
<select>
<option name="formDoor[3][]" value="A"> Acorn Building </option>
<option name="formDoor[3][]" value="B"> Brown Hall</option>
<option name="formDoor[3][]" value="C">Carnegie Complex</option>
<option name="formDoor[3][]" value="D" >Drake Commons</option>
<option name="formDoor[3][]" value="E" >Elliot House </option>
</select>
<br/>
<textarea name="formDoor[3][]"></textarea>
</li>

<li>3) Which buildings do you want access to?<br />
<textarea name="formDoor[4][]"></textarea>
</li>

</ul>
<input type="submit" name="formSubmit" value="Submit" />

<!--?php
	if(isset($_POST['formSubmit']))
		{
		  $aDoor = $_POST['formDoor'][1];
		  if(empty($aDoor)) 
		  {
		    echo("You didn't select any buildings.");
		  } 
		  else 
		  {
		    $N = count($aDoor);

		    echo("You selected $N door(s): ");
		    for($i=0; $i < $N; $i++)
		    {
		      echo($aDoor[$i] . " ");
		      echo '<script>console.log('.$aDoor[$i].')</script>';
		    }
		  }
		}
?-->


</div>
</body>
</html>
