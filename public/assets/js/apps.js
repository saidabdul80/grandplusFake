$(document).ready(function(){
	$("#login" ).click(function( event ) {  
		 // event.preventDefault();  

	   login();
	}); 
	 
	 
	

	$("#selected_applicants_to_admission_list_form" ).submit(function( event ) {
			alert();
		 event.preventDefault(); 
	   
	});
	
	$("#new_admission_batch" ).submit(function( event ) { 
		new_admission_batch();
		 event.preventDefault(); 
	   
	});
	
	

	
	$("#manage_admission" ).click(function( event ) {  
		manage_admission();
	  event.preventDefault();  
	});
	
	
	$("#manage_session" ).click(function( event ) {  
		manage_session();
	  event.preventDefault();  
	});
	
	$("#load_application_setup" ).click(function( event ) {  
		load_application_setup();
	  event.preventDefault();  
	});
	
	$("#load_applicants" ).click(function( event ) {  
		load_applicants();
	  event.preventDefault();  
	});
	
	$("#load_applicants_payment" ).click(function( event ) {  
		load_applicants_payment();
	  event.preventDefault();  
	});

	

	
	

});


function loading(id,text){
  $('#'+id).html('<div class="text-center"><img src="../img/ajax-loader.gif" style="width:70px;height:70px" ><br/><span style="color:red">'+text+'</span></div>');
}
function loading_text(id,text){
  $('#'+id).html('<div class="text-center"><span style="color:red">'+text+'</span></div>');
}

///////////////////////////////////////////////////// Admission Admission

function submit_new_admission_form(){
	
	
	if($('#admission_title').val() == ''){
		$('#admission_title').focus();
	}else{
		loading('new_admission_form_feedback', 'Loading, please wait...');
		$.ajax({
			url:"js_http.php",
				data:$('#new_admission_form_').serialize(),
				method:"POST"
		}).done(function(data){
			if(data =='1'){
				data = '<div class="alert alert-success">Admission List Created </div>';
				$('#admission_title').val
				$('#myModal').modal('hide');
				manage_admission();
			}
			$('#new_admission_form_feedback').html(data);		
		});
	}
	
}

function load_new_admission_form(){
	$('#myModal').modal('show');
	$('#myModalTitle').html('New Admission List Form');
	$('#myModalFooter').html('');
	loading('myModalBody', 'Loading, please wait...');

	$.ajax({
		url:"js_http.php",
			data:'action=load_new_admission_form',
			method:"POST"
	}).done(function(data){
			$('#myModalBody').html(data);		
	});
}

function load_all_applicant_ready_for_admission(token){
	var programme_id = $('#programme_id').val();
	loading('all_applicant_ready_for_admission', 'Loading, please wait...');
	if(programme_id ==''){
		alert('Select Programme');
	}else{
		$.ajax({
		url:"js_http.php",
				data:'action=load_all_applicant_ready_for_admission&token='+token+'&programme='+programme_id,
				method:"POST"
		}).done(function(data){
				$('#all_applicant_ready_for_admission').html(data);
				$('#table_id').DataTable();			
		});
	}
	
}

function publish_admission(token,admission_id){
	if(confirm('Do you want to proceed')){
		loading_text('action_td_'+token, 'Publishing...');
		$.ajax({
		url:"js_http.php",
			data: 'action=publish_admission&token='+token+'&admission_id='+admission_id,
			method:"POST"
		}).done(function(data){
			$('#action_td_'+token).html(data);
			
		});
	}
	 
}

function applicant_to_admission_list(token,admission_id,programme_id){
	alert(programme_id)
	$.ajax({
			url:"js_http.php",
				data: 'action=applicant_to_admission_list&token='+token+'&programme_id='+programme_id+'&admission_id='+admission_id,
				method:"POST"
			}).done(function(data){
				if(data==200 || data=='200'){
					$("#app_tr_"+token).hide('slow');
					$('#myModal-lg').modal('hide');
				}else{
					alert(data)
				}
				
			});
}

function load_add_selected_applicants_to_admission_list(token,admission_id,programme_id){
	//var programme_id = $("#programme_id").val();
	
if(programme_id =='' || programme_id==0){
		alert('Select Programme');
	}else{
		$('#myModal-lg').modal('show');
		$('#myModalTitle-lg').html('Preview Applicant detail before adding to list');
		$('#myModalFooter-lg').html('');
		loading('myModalBody-lg', 'Loading, please wait...');
		$.ajax({
			url:"js_http.php",
				data: 'action=load_add_selected_applicants_to_admission_list&token='+token+'&programme_id='+programme_id+'&admission_id='+admission_id,
				method:"POST"
			}).done(function(data){
				$('#myModalBody-lg').html(data);	
			});
	}
	
}
function add_applicant_to_admission_list(token){
	
	loading('content_area', 'Loading, please wait...');
	$.ajax({
		url:"js_http.php",
			data:'action=add_applicant_to_admission_list&token='+token,
			method:"POST"
	}).done(function(data){
			$('#content_area').html(data);
			$('#table_id').DataTable();			
	});
}

function load_view_admission_list_by_programme(token,programme){
	
	loading('admission_list', 'Loading, please wait...');
	$.ajax({
		url:"js_http.php",
			data:'action=load_view_admission_list_by_programme&token='+token+'&programme='+programme,
			method:"POST"
	}).done(function(data){
			$('#admission_list').html(data);
			$('#table_id').DataTable();			
	});
}

function load_view_admission_list(token){
		var name = $('#adm_name_'+token).html();
	  loading('content_area', 'Loading, please wait...');
	$('#content_area_title_text').html(name);

	$.ajax({
		url:"js_http.php",
			data:'action=load_view_admission_list&token='+token,
			method:"POST"
	}).done(function(data){
			$('#content_area').html(data);
			$('#table_id').DataTable();			
	}); 
}

function manage_admission(){
	loading('content_area', 'Loading, please wait...');
	$('#content_area_title_text').html('Manage Admission');

	$.ajax({
		url:"js_http.php",
			data:'action=manage_admission',
			method:"POST"
	}).done(function(data){
			$('#content_area').html(data);
			$('#table_id').DataTable();			
	});
}



///////////////////////////////////////////////////// APPLICATION
function initiate_application_payment(token){
	var amount = $('#amount_'+token).val();
	if(amount ==''){
		alert('App fee cannot be 0');
	}else{
		$.ajax({
			url:"js_http.php",
				data:'action=initiate_application_payment&token='+token+'&amount='+amount,
				method:"POST"
		}).done(function(data){alert(data); load_applicants_payment()});
	}
}

function clear_applicant_payment(token){
	
	var clear_status = $('#clear_status_'+token).val();
	var con = confirm("Do you want to proceed??");
	if(con){
		$.ajax({
			url:"js_http.php",
				data:'action=clear_applicant_payment&token='+token+'&clear_status='+clear_status,
				method:"POST"
		}).done(function(data){alert(data);});
	}
		
	
}

function load_applicants_payment(){
	loading('content_area', 'Loading, please wait...');
	$('#content_area_title_text').html('Manage Applicants Payments');

	$.ajax({
		url:"js_http.php",
			data:'action=load_applicants_payment',
			method:"POST"
	}).done(function(data){
			$('#content_area').html(data);
			$('#table_id').DataTable();			
	});
}

function clear_reject_selection(token){
	//var proceed = true;
	if(token=='2'){
		$('#is_not_cleared_reason_wrap').show('slow');
		//if($('#is_not_cleared_reason').val()==''){}
	}else{
		$('#is_not_cleared_reason_wrap').hide('slow');
		$('#is_not_cleared_reason').val('');
	}
	
}



function clear_reject_applicant(token){
	
	var is_not_cleared_reason = $('#is_not_cleared_reason').val();
	var clear_status = $('#clear_status').val();
	var proceed = true;
	
	if(clear_status == ''){
		alert('select either to reject or clear from the list');
	}else{
		if(clear_status=='2'){
			if($('#is_not_cleared_reason').val()==''){
				proceed = false;
				alert('Please give reasons why you reject this application..');
			}
		}
		
		if(proceed==true){
			var con = confirm("Do you want to proceed??");
			if(con){
				$.ajax({
					url:"js_http.php",
						data:'action=clear_reject_applicant&token='+token+'&clear_status='+clear_status+'&is_not_cleared_reason='+is_not_cleared_reason,
						method:"POST"
				}).done(function(data){alert(data);});
			}
		}
	}
	
	
	
}

function back_applicants_list(token){
	$('#applicants_list_wrap').fadeIn('slow');
	$('#applicant_details_preview_wrap').fadeOut('slow');
	$('#applicant_details_preview_wrap').html('');
	load_applicants();
}

function applicant_details_preview(token){
	$('#applicants_list_wrap').fadeOut('slow');
	$('#applicant_details_preview_wrap').fadeIn('slow');
	$('#applicants_list_wrap').fadeIn('slow');
	$('#applicants_list_wrap').fadeOut('slow');
	loading('applicant_details_preview_wrap', 'Loading, please wait...');
	$.ajax({
		url:"js_http.php",
			data:'action=applicant_details_preview&token='+token,
			method:"POST"
	}).done(function(data){
			$('#applicant_details_preview_wrap').html(data);
			$('#table_id').DataTable();			
	});
}

function load_applicants(){
	loading('content_area', 'Loading, please wait...');
	$('#content_area_title_text').html('Manage Applicant\'s Application');
	$.ajax({
		url:"js_http.php",
			data:'action=load_applicants',
			method:"POST"
	}).done(function(data){
			$('#content_area').html(data);
			$('#table_id').DataTable();			
	});
}
function load_application_setup(){
	loading('content_area', 'Loading, please wait...');
	$('#content_area_title_text').html('Manage Application');
	$.ajax({
		url:"js_http.php",
			data:'action=load_application_setup',
			method:"POST"
	}).done(function(data){
			$('#content_area').html(data);
			$('#table_id').DataTable();			
	});
}


///////////////////////////////////////////////////// SESSION


function all_session_table(){
	$.ajax({
		url:"js_http.php",
			data:'action=all_session_table',
			method:"POST"
	}).done(function(data){
			$('#existing_sessions').html(data);
			$('#table_id').DataTable();			
	});
}

function new_session_form_submit(){
	var session_name = $('#session_name').val();
	if(session_name != ''){
		if(session_name.length >=4){
			$.ajax({
				url:"js_http.php",
					data:'action=new_session_form_submit&session='+session_name,
					method:"POST"
			}).done(function(data){
					$('#new_session_feedback').html(data);
			all_session_table();	
				$('#table_id').DataTable();	
			});
		}else{
			alert('Cannot not be less than 4 digits');
		}
	}
}

function set_session_active(session_name){
	var con = confirm('If you are sure to make as active session, click OK to Proceed ');
	if(con){
		$.ajax({
		url:"js_http.php",
			data:'action=set_session_active&session='+session_name,
			method:"POST"
	}).done(function(data){
			alert(data);	
all_session_table();			
	});
	}
}

function manage_session(){
	loading('content_area', 'Loading, please wait...');
	$('#content_area_title_text').html('Manage System Session');

	$.ajax({
		url:"js_http.php",
			data:'action=manage_session',
			method:"POST"
	}).done(function(data){
			$('#content_area').html(data);
			$('#table_id').DataTable();			
	});
	
	
	
}

function login(){
	
	
	if($('#staffid').val() !='' && $('#password').val() !=''){
		loading('feedback', 'Signin, please wait...');
		$.ajax({
		url:"js_http.php",
			data:$("#login-form" ).serialize(),
			method:"POST"
		}).done(function(data){

			if(data==200 || data == '200'){
				
				window.location.href="desktop.php";
			}else{
					$('#feedback').html(data);
			}
				
		});
	}else{
		$('#staffid').focus();
	}
	 
}




function sweetalertFire(type,title,text,confirmButtonText){
		Swal.fire({
			  title: title,
			  text: text,
			  type: type,
			  confirmButtonText: confirmButtonText
			})
}


 function preview_passport() {

    var filesSelected = document.getElementById("passport_file").files;
    if (filesSelected.length > 0) {
      var fileToLoad = filesSelected[0];

      var fileReader = new FileReader();

      fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <--- data: base64

        var newImage = document.createElement('img');
        newImage.src = srcData;

        document.getElementById("passport_wrap").innerHTML = newImage.outerHTML;
       // alert("Converted Base64 version is " + document.getElementById("passport_wrap").innerHTML);
        //console.log("Converted Base64 version is " + document.getElementById("passport_wrap").innerHTML);
		//document.getElementById("passport_file").value ='';
		
      }
      fileReader.readAsDataURL(fileToLoad);
    }
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
