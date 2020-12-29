

function loading(id,text){
  $('#'+id).html('<div class="text-center"><img src="../img/ajax-loader.gif" style="width:70px;height:70px"><br/>'+text+'</div>');
  
}

function load_lga(token){
	$('#lga_id').html('');
	alert('here');
	 $.ajax({
		url:"js_http.php",
			data:'action=load_lga&token='+token,
			method:"POST"
		}).done(function(res){

			$('#lga_id').html(res);
		});
}


function add_result(exam_type,exam_year){
	var subject = $('#subject').val();
	var grade = $('#grade').val();
	if(subject=='' || grade==''){
		alert('Select subject and the grade obtained');
	}else{
		loading('feedback','Saving, please wait...');
		$.ajax({
			url:"js_http.php",
			data:'action=add_result&exam_type='+exam_type+'&exam_year='+exam_year+'&subject='+subject+'&grade='+grade,
			method:"POST"
		}).done(function(response){
			$('#feedback').html('');
			if(response=='0'){
				alert('You already added result for the selected subject..');
			}else{
				$('#result_rows').html(response);
			}
			$('#table_id').DataTable();
		});
	}
	
}


function remove_result(id){
	
	loading('remove_result','Loading, please wait...');
	$.ajax({
		url:"js_http.php",
			data:'action=remove_result&id='+id,
		method:"POST"
	}).done(function(response){
		if(response=='1'){
			$('#tr'+id).fadeOut('slow');
		}else{
				alert(response);
		}
		 $('#table_id').DataTable();
	});
}


function load_add_result(one,two){
	$('#result_cat_table').fadeOut('slow');
	loading('add_result_','Loading, please wait...');
	$.ajax({
		url:"js_http.php",
			data:'action=load_add_result&one='+one+'&two='+two,
		method:"POST"
	}).done(function(response){
		$('#add_result_').html(response);
		 $('#table_id').DataTable();
	});
}

function submit_application(){
	loading('submit_application_feedback','Submitting, please wait...');
}


function sweetalertFire(type,title,text,confirmButtonText){
		Swal.fire({
			  title: title,
			  text: text,
			  type: type,
			  confirmButtonText: confirmButtonText
			})
}

if(validate_error_msg === 'success' || validate_error_msg === 'error'){
	sweetalertFire(validate_error_msg,validate_error_msg,validate_error_msg_text,'OK');
}


function printDiv(DivIdToPrint)
{

  var divToPrint=document.getElementById(DivIdToPrint);
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
  setTimeout(function(){newWin.close();},10);
 
}
