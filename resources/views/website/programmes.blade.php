<?php


/*
  $departmentmes = [
      '0' => [
          'id' => "1",
          'departmentme_name' => "Community Health",  
          'courses' => [
	          ['id' =>'1',
	          	'departmentme_name' => 'departmentme_name',
	          	'requirements'=> 'requirements requirements requirements requirements'],	         
	         ['id' =>'1',
	          	'departmentme_name' => 'departmentme_name',
	          	'requirements'=> 'requirements requirements requirements requirements']
	             
          ]     
      ],
      '1' => [
          'id' => "1",
          'departmentme_name' => " Environmental Health Sciences",          
          'courses' => [
          	['id' =>'1',
          	'departmentme_name' => 'departmentme_name',
          	'requirements'=> 'requirements requirements requirements requirements']
          ]        
      ],
      '2' => [
          'id' => "2",
          'departmentme_name' => "Health Education",          
          'courses' => [
          	['id' =>'1',
          	'departmentme_name' => 'departmentme_name',
          	'requirements'=> 'requirements requirements requirements requirements']
          ]        
      ],
      '3' => [
          'id' => "3",
          'departmentme_name' => "Health Information Managment",          
          'courses' => [
          	['id' =>'1',
          	'departmentme_name' => 'departmentme_name',
          	'requirements'=> 'requirements requirements requirements requirements']
          ]        
      ],
      '4' => [
          'id' => "4",
          'departmentme_name' => "Human Nutrition",          
          'courses' => [
          	['id' =>'1',
          	'departmentme_name' => 'departmentme_name',
          	'requirements'=> 'requirements requirements requirements requirements']
          ]        
      ],
      '5' => [
          'id' => "5",
          'departmentme_name' => "Medical Laboratory",          
          'courses' => [

          	['id' =>'1',
          	'departmentme_name' => 'departmentme_name',
          	'requirements'=> 'requirements requirements requirements requirements']
          ]        
      ],
      '6' => [
          'id' => "6",
          'departmentme_name' => "Dental Health",          
          'courses' => [
          	['id' =>'1',
          	'departmentme_name' => 'departmentme_name',
          	'requirements'=> 'requirements requirements requirements requirements']
          ]        
      ],
      '7' => [
          'id' => "7",
          'departmentme_name' => "Pharmacy",          
          'courses' => [
          	['id' =>'1',
          	'departmentme_name' => 'departmentme_name',
          	'requirements'=> 'requirements requirements requirements requirements']
          ]        
      ],
  ];
  //dd($departmentmes);
  */
 //dd($departmentmes);
$sn =1; 
$lid = 0;
$firstLoop = 0;
$count = 0;
?>
@extends('layouts.website')


@section('page-body')
  <div class="col-sm-12 col-lg-8" style="">
    @if(isset($error_msg))
    <div class="alert alert-danger"> {{$error-msg}} </div>
    @endif
  	<div class="mt-5 pt-1">
  		<h4>
  			<strong class="text-danger1"><span class="fa fa-th-large"></span> INSTRUCTIONS/GUIDLINES FOR ALL APPLICANTS!</strong></p>  			
  		</h4>
        <p> All applicants must read the following instructions :</p>
		 <ol class="ml-3">
			<li> <strong><a href="#">Courses and their requirements</a></strong>. Ensure you meet all the requirement for the course you're applying for.</li>
			<li>Application form must be filled and submitted online before the closing date. Provide your email address and password. <a href="#">Click here to begin you online application.</a> </li>
			
			<li>Print your payment summary slip and take the slip to bank to make payment</li>
			<li>Please note that your application will not be considered untill your payment has been verified.</li>
			<li>Log onto the portal to check if your payment has been verified. or <a href="#">Click here to begin you online registration.</a> .</li>
			
		</ol>
		<p>All enquiries, complains and suggestion should be directed to the Portal administrator or any staff of the ICT/Computer centre Or you can send a message using the contact form on the College's main website contact page</p>
                                    												
  	</div>
  	<div class="line my-5"></div>
  	<table class="table my-3 table-bordered">
  		<thead>  			
  			<th>S/N</th>
  			<th>departmentME <NAV></NAV>ame</th>
  			<th>COURSES</th>
  			<th>REQUIRMENTS</th>
  		</thead>
  		<body>
        @foreach($departments as $department)
        {{$department->department_name}}
          <?php          
          $firstLoop =0;
            $lid = $department->id;    
            $count =0;        
                foreach ($programmes as $p) {                
                  if($p->department_id == $lid){
                    $count+=1;
                  }
                }                                
          ?>  			
            <tr>
                <td rowspan="{{$count}}" style="width: 20px;" >{{ $sn++ }}</td>
                 <td class="w-25" rowspan="{{$count}}">{{ $department->department_name}}</td>  
    
          @foreach($programmes as $program)
            @if($program->department_id == $lid)
      					  				  		
              @if($count > 1 )
                <?php
                $firstLoop++;
                ?>
  		  	      @if($firstLoop == 1)
    				  		 <td>{{$program->programme_name}}</td>			  		
    				  		 <td> {{$program->requirements}}</td>
    				  	  </tr>				  
                @else  
                  <tr>                
      				  		<td>{{$program->programme_name}}</td>           
                    <td> {{$program->requirements}}</td>				  			  	
      		  		  </tr>
                @endif

    				  @else              			  		                              
                  <td>{{$program->programme_name}}</td>           
                  <td> {{$program->requirements}}</td>
                </tr>
      				@endif  	
            @endif			  			
          @endforeach
  			@endforeach

  		</body>
  	</table>
  		<center><a class="btn p-3 shadow-sm text-info my-3 w-100" href="{{route('apply')}}">Begin Application</a></center>
  </div>
  <div class="col-sm-12 col-lg-4" style="">
  	@include('website.latest-update')
  </div>
  

@endsection


@section('scripts')
<style scoped>
	ol li{
		text-align: justify !important;
	}
	h1{
		
	}

</style>
<!--    
<script>

     
     var app = new Vue({
    el: "#app",
    data:{no: 1},
    methods:{
         
            printt(){
              this.no = 5;
             }
        
     },
     
    vuetify: new Vuetify()
   });
    
 function printt() {
     app.printt()
     
 }

    
</script> -->
@endsection