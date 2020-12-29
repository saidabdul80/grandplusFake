<?php

		
	function getAge($date_of_birth){
				$current_date = @date('Y-m-d');
				$diff = abs(strtotime($current_date) - strtotime($date_of_birth));
				$one_minute = 60;
				$one_hour = $one_minute * 60;
				$one_day = $one_hour * 24;
				$one_year = $one_day * 365;
				$age = floor($diff / $one_year);
				return $age;
	}
	
	function alert($type,$title,$message){

		    if(strtolower(trim($type))=='error'){
		        $type='danger';
            }
		    return '<div class="alert alert-'.$type.' alert-dismissible  show" role="alert">
          <strong>'.$title.'!</strong> '.$message.'.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
    }
?>