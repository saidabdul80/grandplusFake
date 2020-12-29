
<?php 
				 $programmes = [
      '0' => [
          'id' => "1",
          'name' => "Community Health",  
          'courses' => [
              ['id' =>'1',
                'name' => 'Name',
                'requirements'=> 'requirements requirements requirements requirements'],             
             ['id' =>'1',
                'name' => 'Name',
                'requirements'=> 'requirements requirements requirements requirements']
                 
          ],
          'about' => 'About About About About About about About about About about About about About about', 
          'duration'=> '4 years'        
      ],
      '1' => [
          'id' => "1",
          'name' => " Environmental Health Sciences",          
          'courses' => [
            ['id' =>'1',
            'name' => 'Name',
                'requirements'=> 'requirements requirements requirements requirements']
          ],
          'about' => 'About About About About About about About about About about About about About about', 
          'duration'=> '4 years'        
      ],
      '2' => [
          'id' => "2",
          'name' => "Health Education",          
          'courses' => [
            ['id' =>'1',
            'name' => 'Name',
                'requirements'=> 'requirements requirements requirements requirements']
          ],'about' => 'About About About About About about About about About about About about About about', 'duration'=> '4 years'        
      ],
      '3' => [
          'id' => "3",
          'name' => "Health Information Managment",          
          'courses' => [
            ['id' =>'1',
            'name' => 'Name',
                'requirements'=> 'requirements requirements requirements requirements']
          ],'about' => 'About About About About About about About about About about About about About about', 'duration'=> '4 years'        
      ],
      '4' => [
          'id' => "4",
          'name' => "Human Nutrition",          
          'courses' => [
            ['id' =>'1',
            'name' => 'Name',
                'requirements'=> 'requirements requirements requirements requirements']
          ],'about' => 'About About About About About about About about About about About about About about', 'duration'=> '4 years'        
      ],
      '5' => [
          'id' => "5",
          'name' => "Medical Laboratory",          
          'courses' => [

            ['id' =>'1',
            'name' => 'Name',
                'requirements'=> 'requirements requirements requirements requirements']
          ],'about' => 'About About About About About about About about About about About about About about', 'duration'=> '4 years'        
      ],
      '6' => [
          'id' => "6",
          'name' => "Dental Health",          
          'courses' => [
            ['id' =>'1',
            'name' => 'Name',
                'requirements'=> 'requirements requirements requirements requirements']
          ],'about' => 'About About About About About about About about About about About about About about', 'duration'=> '4 years'        
      ],
      '7' => [
          'id' => "7",
          'name' => "Pharmacy",          
          'courses' => [
            ['id' =>'1',
            'name' => 'Name',
                'requirements'=> 'requirements requirements requirements requirements']
          ],'about' => 'About About About About About about About about About about About about About about', 'duration'=> '4 years'        
      ],
  ];
  $programmes = json_decode(json_encode($programmes));
  $ids = 0;
?>
@extends('layouts.website')


@section('page-body')


	<div class="row">
		
		 <div class="col-sm-12 col-lg-8 px-5 pt-5" style="">
		 		<h4 class="mt-3 bg-primary1 p-2"><strong class="text-white">Departments</strong></h4>
		 		<section class="border p-3">
		 				@foreach($programmes as $program)
		 				<?php $ids += 1 ;?>
		 					<div class="shadow-sm p-3 text-primary1 mt-3 bars" style="font-weight: bold;" onclick="unveil('{{$ids}}');"><span id="rel{{$ids}}" class="rel fa fa-plus mx-3"></span> {{$program->name}}</div>
		 				@if($loop->first)
		 					<div class="p-3  department-cards" style="background: rgba(200,200,255,.1);" id="{{$ids}}" >
		 					<div><strong> About</strong></div>
			  				<div>{{$program->about}}</div>
			  				<div class="line"></div>
			  				<div><strong> Duration</strong></div>
			  				<div>{{$program->duration}}</div>
			  				<div class="line"></div>

			  				<div><strong> Courses List</strong></div>
			  				<table class="table table-bordered">
			  					<thead class="bg-light">
			  						<th>Course name</th>
			  						<th>Requirements</th>
			  					</thead>
			  					<tbody>  						
			  						@foreach($program->courses as $courses)
				  					<tr>
				  						<td>{{$courses->name}}</td>
				  						<td>{{$courses->requirements}}</td>
				  					</tr>
			  						@endforeach
			  					</tbody>
			  				</table>
			  			</div>
			  			@endif
			  			@if(!$loop->first)
			  			<div class="p-3 department-cards" id="{{$ids}}" style="display: none;background: rgba(200,200,255,.1);">
		 					<div><strong> About</strong></div>
			  				<div>{{$program->about}}</div>
			  				<div class="line"></div>
			  				<div><strong> Duration</strong></div>
			  				<div>{{$program->duration}}</div>
			  				<div class="line"></div>

			  				<div><strong> Courses List</strong></div>
			  				<table class="table table-bordered">
			  					<thead>
			  						<th>Course name</th>
			  						<th>Requirements</th>
			  					</thead>
			  					<tbody>  						
			  						@foreach($program->courses as $courses)
				  					<tr>
				  						<td>{{$courses->name}}</td>
				  						<td>{{$courses->requirements}}</td>
				  					</tr>
			  						@endforeach
			  					</tbody>
			  				</table>
			  			</div>

			  			@endif
		 				@endforeach
		 		</section>
		 </div>
		 <div class="col-sm-12 col-lg-4" style="">
		 		  @include('website.latest-update')
		 </div>
	</div>	
@endsection
@section('js')
@endsection
