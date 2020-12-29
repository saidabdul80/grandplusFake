$(document).ready(function(){

	function load_add_result1(type,year,num) {
  		$.ajax({
		    type: 'POST',
		    url:  "{{route('add_result')}}",
		    dataType:"html",
		    aync:false,
		    cache:false,
		    data: {num:num, year:year, type:type, id:"{{session('id')}}", _token:'{{ csrf_token() }}' },
	   		success:function(data){	
	   			alert();
	   			$('#add_result_').html(data);
	   		}
		})
  	}


});