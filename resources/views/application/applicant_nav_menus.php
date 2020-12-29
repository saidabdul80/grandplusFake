<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

	<div class="panel panel-">
		<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
		  
		  <div class="panel-heading mySideTab" role="tab" id="heading2" >
			Application Data  <i id="chevron_1" style="float:right;margin-right:10px" class="fa fa-chevron-down"></i>
			
			</h4>
		  </div>
		  </a>
		<div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
		  <div class="panel-body" style="margin:0;padding:0">
			<div class="list-group">
			  <a href="biodata.php" class="list-group-item"><i id="chevron_1" style="float:left;margin-right:10px" class="fa fa-user"></i> Bio-data</a>
			  <?php 
				if($biodata_status =='1'){
					?>
						<a href="result.php" class="list-group-item"><i id="chevron_1" style="float:left;margin-right:10px" class="fa fa-file"></i> Results</a>
					<?php
				}
			  ?>
			  
			  <a href="attachment.php" class="list-group-item"><i id="chevron_1" style="float:left;margin-right:10px" class="fa fa-upload"></i> Attachments & Uploads</a>
			  
			  <?php 
				 $number_applicant_result = number_applicant_result($db,$session_applicant_id);
				if($biodata_status =='1' && $number_applicant_result>=5 ){
				?>
					  <a href="acknowledgment.php" class="list-group-item" target="_BLANK"><strong style="color:green"><i id="chevron_1" style="float:left;margin-right:10px" class="fa fa-print"></i><strong style="color:green"> Prints Acknownledge Slip</span></a>
			
				<?php
				}
			  ?>
			</div>
			<hr class="hr1">
					

		  </div>
		</div>
	</div>
	
	<div class="panel panel-">
		<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
		  
		  <div class="panel-heading mySideTab" role="tab" id="heading3" >
			Contact  Us<i id="chevron_1" style="float:right;margin-right:10px" class="fa fa-chevron-right"></i>
			
			</h4>
		  </div>
		  </a>
		<div id="collapse3" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading3">
		  <div class="panel-body" style="margin:0;padding:0">
		<div class="list-group">
			  <a href="#" class="list-group-item">Help Desk</a>
			</div>
			<hr class="hr1">
		  </div>
		</div>
	</div>
	
	
</div>



 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">

                <div class="panel-heading mySideTab" role="tab" id="heading2" >
                    Application Data  <i id="chevron_1" style="float:right;margin-right:10px" class="fa fa-chevron-down"></i>

                    </h4>
                </div>
            </a>
            <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading2">
                <div class="panel-body" style="margin:0;padding:0">
                    <div class="list-group">
                        <a href="biodata.php" class="list-group-item"><i id="chevron_1" style="float:left;margin-right:10px" class="fa fa-user"></i> Bio-data</a>

                    </div>
                    <hr class="hr1">


                </div>
            </div>
        </div>
      </div>