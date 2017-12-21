<form name="survey" action="#">
	<input  id="create" name="create" value="Add record" style="text-align: center;cursor: pointer;" />

	<div class="modal fade" id="myModal" role="dialog">
    	<div class="modal-dialog">       
    		<div class="modal-content">
    			<div class="modal-header" style="padding:35px 50px;">
                    <label for="ques_type" >Question Type</label>
                    <select id="ques_type" name = "ques_type">        
                    <option selected="true" disabled="true">Select Question Type</option>           
                    <?php 
					$result = mysqli_query($connection, "SELECT * FROM M_QUESTION_TYPES");
					while ($row = mysqli_fetch_assoc($result))
						{
							echo "<option value=".$row['QUESTION_TYPE_ID'].">" .$row['QUESTION_TYPE_NAME'] . "</option>";
						}
						?>
                    </select>                    

                    <select id="opt_grps" name = "opt_grps">        
                    <option selected="true" disabled="true">Select Option group</option>           
                    <?php 
					$result = mysqli_query($connection, "SELECT * FROM m_option_groups");
					while ($row = mysqli_fetch_assoc($result))
						{
							echo "<option value=".$row['option_group_ID'].">" .$row['option_group_name'] . "</option>";
						}
						?>
                    </select>       
                <br/>
           		</div>       
           	</div>
		</div> 	    	
    </div>