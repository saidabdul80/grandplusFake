<?php
use App\tbl_applicants;	
$applicants = tbl_applicants::find(session('id'));
$passport_dd1 = "/img/applicants/".$applicants->passport;
//dd($applicants);
?>
@extends('layouts.portals')


@section('page-body')
<div class="row pl-0 pt-0">
  <div class=" pl-4 col-12 p-0" style="height: 40px;">
  	<a href="" class="bg-light" class="p-3"><span class="fa fa-home text-dark" style="font-size: 1.3em;"></span></a>
  	@if($sect == 'courseedit') <span class="fa fa-angle-double-right"></span><a href="">Course Registration</a> @endif
  </div>
  <div class="col-sm-12 pl-0 col-lg-3 pt-4">
  	<div class="pl-4 "><img src="<?= $passport_dd1;?>" width="150px" style="height: 150px;" class="img img-thumbnail"></div>
  	<!-- <div class="line my-4 w-75 float-left" ></div> -->
  	<hr class="lined">
  	<div style="clear: left;" class="pl-4">
  		<label class="m-0 text-primary1">Name:</label>
  		<p class="m-0">{{$applicants->first_name . ' '.$applicants->surname}}</p>
  		<label class="m-0 text-primary1">Matric No:</label>
  		<p class="m-0">{{$applicants->application_number}}</p>
  		<hr class="line-dashed">  		
  			<table>
  				<tr>
  					<td><span class="fa fa-user text-primary1 pr-2"></td>
  					<td><a href="{{route('portal',['sect'=>'studentdata'])}}"  class="text-primary">My Personal Data</a></td>  					
  				</tr>
  				<tr>
  					<td><span class="fa fa-user text-primary1 pr-2"></td>
  					<td><a  href="#" class="text-primary">Counselling Data</a></td>  					
  				</tr>
  				<tr>
  					<td><span class="fa fa-list text-primary1 pr-2"></td>
  					<td><a  href="{{route('portal',['sect'=>'courseedit'])}}" class="text-primary">Course Registeration</a></td>  					
  				</tr>  
  				<tr>
  					<td><span class="fa fa-file text-primary1 pr-2"></td>
  					<td><a  href="#" class="text-primary">My Result</a></td>  					
  				</tr>				
  			</table>  		  	
  		<hr class="line-dashed">
  		<table>
  				<tr>
  					<td><span class="fa fa-lock text-primary1 pr-2"></td>
  					<td><a  href="#" class="text-primary">Password/Email Resest</a></td>  					
  				</tr>
  				<tr>
  					<td><span class="fa fa-power-off text-primary1 pr-2"></td>
  					<td><a  href="#" class="text-primary">Logout</a></td>  					
  				</tr>
  			</table>  
  	</div>
  	<hr class="lined">
  	<br><br><br>
  </div>
  <div class="col-sm-12 col-lg-9">
  	
   @if($sect == 'home')
   		@include('application.instruction')
   @elseif($sect == 'courseedit')
   		@include('application.coursereg')
  @elseif($sect == 'studentdata')
      @include('application.studentdata')  
   @else
   	<?php
        return redirect()->route('portal', ['sect'=>'home']);               	
   	?>
   @endif


  </div>
</div>
<style type="text/css">
	.lined{
		border-top:1px solid #ccc;
	}
	.line-dashed{				
		border-top:1px dashed #217;
	}
	li{
		margin-top: 10px;
	}
</style>
@endsection


@section('scripts')
@endsection