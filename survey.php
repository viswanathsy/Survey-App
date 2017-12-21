<?php

?>
<!DOCTYPE html>

<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="survey_css.css">

<title>
	<?php
		if (isset($_SESSION['survey_name']))
    		echo $_SESSION['survey_name'];

    ?>
</title>



<script>
        $(document).ready(
        function()
        {
        		var num = 1;
        		$('#checkbox').click(function(e)
        		{
        			e.preventDefault();
        			jQuery("#modal-checkbox").modal();
        		});

        		opt_count = 1;
        		$("#add_checkbox").click(function()
        		{
					var $ctrl = $('<br/><input/>').attr({ type: 'checkbox', name:'check_box_option_names[]'}).addClass("chk");
					var $ctrl1 = $('<input/>').attr({ type: 'text', name:'text', placeholder:'text' ,contenteditable:'true'}).addClass("text");


					var $new="<div id='div"+opt_count+"'><input type='checkbox'></input><input type = 'text'/><button onclick=foo('"+opt_count+"')>Remove</button></div>";
					$("#checkbox_options").append($new);
					opt_count++;

				});


				$("#checkbox_add_question").click(function()
        		{
					var $question = $('#checkbox_text_area').clone();
					$question.attr('id','added_question'+num)
					$question.appendTo($('#article'));

					var $opts = $('#checkbox_options').clone();
					$opts.attr('id','added_options');
					$opts.appendTo($('#article'));

					jQuery("#modal-checkbox").modal('hide');
					num++;
				});

				$("#checkbox_cancel").click(function()
        		{
        			jQuery("#modal-checkbox").modal('hide');
        		});

				$('#checkbox_add_question').click(function()
				{
					var leng = $('check_box_option_names').length;
					alert(leng);
				});

        });
        function foo(which)
        {
 			 $("#div"+which).remove();
		}
</script>
</head>
<body>
	<header>
		<div>
			<?php
				echo $_SESSION['survey_name'];
			?>
		</div>
	</header>


    <div id ="nav">
    	<label name = "checkbox" id = "checkbox">Checkbox</label>
    	<br/>
    	<label name = "radio" id = "radio">Radio</label>
    </div>

    <div id ="article"></div>

    <div class="modal fade" id="modal-radio" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
    <form id ="rad_modal_form">
    	<div id = "rad_modal">
	    	<hr align="center" size="1" width="100%" noshade color="#D4D0C8" />
				<ol  style="list-style: none;">
					<li>
						<textarea rows="4" cols="70" placeholder="Enter the Question">
						</textarea>
					</li>
					<div class="rad-opts" id = "rad-opts">
					</div>
				</ol>
			</div>
			<br/><br/>
			<div align="center" class="modal-footer">
				<br /><input type="button" id="rad" value="Add Option" style="" />
				<input type="submit" name="add_rad_but" id = "add_rad_but" style="float: left;" value="Add Question">
				<input type="button" id="cancel_rad_but" value="cancel">
			</div>
	</form>
	</div>
	</div>
    </div>

    <div class="modal fade" id="modal-checkbox" role="dialog">
    	<div class="modal-dialog">
    		<div class="modal-content" >
    		<form method="post" action="survey.php">
    			<div id ="sample_checkbox">
					<ol>
						<div id ="checkbox_question">
					    	<li style="list-style: none;">
								<textarea rows="4" cols="70" placeholder="Enter the Question" id = "checkbox_text_area">
								</textarea>
							</li>
						</div>
						<div id = "checkbox_options">
							<br /><input type="checkbox" name="check_box_option_names[]" contenteditable="true">Option 1
						</div>
					</ol>
					<br/>
					<br/>
					<div id = "checkbox_buttons">
						<input type="button" id="add_checkbox" value="Add Option" style="float: left;margin: 5px;" />
						<input type="button"  id ="checkbox_add_question" style="float: left;margin: 5px;" value="Add Question">
						<input type="button" id="checkbox_cancel" value="cancel" style="margin: 5px">
					</div>
				</div>
			</form>
			</div>
    	</div>
    </div>


</body>
</html>
