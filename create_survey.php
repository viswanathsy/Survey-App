
<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Survey</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<!-- Custom-Style-Sheet -->
	<link rel="stylesheet" href="form_style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="all">
	<!-- //Custom-Style-Sheet -->

	<?php
	       if (isset($_POST['submit']))
		    {
				header("location: survey.php");
		    }
	?>
</head>
<body>

	<form method="POST" action="">
		<h1 id ="survey-title">Create Survey</h1>

			<div class="containerw3layouts-agileits">

				<!--<h2>Please complete and submit the booking form.</h2>-->

				<div class="w3layoutscontactagileits">
					<form action="#" method="post">

						<div class="wthreename agileinfow3ls">
							<div class="wthreename-lable wthreelable">
								<label>Name</label><span class="colon">:</span>
							</div>
							<div class="wthreename-input wthreeinput">
								<input class="top" type="text" name="Name" placeholder="Name" required="">
							</div>
							<div class="clear"></div>
						</div>
						<?php
							if (isset($_POST['Name']))
							{
	    						$_SESSION['survey_name'] = ($_POST['Name']);
							}
						?>

						<div class="agileemailinfo agileinfow3ls">
							<div class="agileemailinfo-lable wthreelable">
								<label>Survey Category</label><span class="colon">:</span>
							</div>
							<div class="agileemailinfo-input wthreeinput">
								<input class="top" type="text" name="Email" placeholder="Category" required="">
							</div>
							<div class="clear"></div>
						</div>

						<div class="agileemailinfo agileinfow3ls">
							<div class="agileemailinfo-lable wthreelable">
								<label>Description</label><span class="colon">:</span>
							</div>
							<div class="agileemailinfo-input wthreeinput">
								<input class="top" type="text" name="Email" placeholder="Description" required="">
							</div>
							<div class="clear"></div>
						</div>


						<div class="agileinfodeparture agileinfow3ls">
							<div class="agileinfodeparture-lable wthreelable">
								<span class="lable">
									<label>Start Date</label>
								</span>
								<span class="colon">:</span>
							</div>
							<div class="agileinfodeparture-input wthreeinput">
								<input class="date agileits w3layouts" id="datepicker1" type="text" value="Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
							</div>
							<div class="clear"></div>
						</div>

						<div class="agileinforeturn agileinfow3ls">
							<div class="agileinforeturn-lable wthreelable">
								<span class="aitsreturn-lable">
									<label>End Date</label>
								</span>
								<span class="colon">:</span>
							</div>
							<div class="agileinforeturn-input wthreeinput">
								<input class="date agileits w3layouts" id="datepicker2" type="text" value="Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
							</div>
							<div class="clear"></div>
						</div>

						<div class="aitssubmitw3ls">
							<input type="cancel" name="cancel" value="Cancel">
							<input type="submit" name="submit" value="Next">
						</div>

					</form>
				</div>
			</div>
	</form>
</body>
</html>
