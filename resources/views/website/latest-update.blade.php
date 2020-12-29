<?php
$news = [
      '0' => [
          'title' => "2018/2019 NCE/PRE-NCE APPLICATION FOR ADMISSION!",
          'body' => "This is to inform the general Public that 2018/2019 NCE/PRE-NCE Admission Application Form is now available.",
          'datetime'=> "August 03, 2018, 03:015:",
      ],
      '1' => [
          'title' => "2018/2019 NCE/PRE-NCE APPLICATION FOR ADMISSION!",
          'body' => "This is to inform the general Public that 2018/2019 NCE/PRE-NCE Admission Application Form is now available.",
          'datetime'=> "August 03, 2018, 03:015:",
      ]

  ];
   $news = json_decode(json_encode($news));
  $current_session = "2019/2020";




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
 ?>
    <div class="line my-5"></div>
    <div class="panel-heading mySideTab mb-5 bg-primary1 text-size py-2" role="tab" id="heading1">
      Latest Updates  <i id="chevron_1" style="float:right;margin-right:10px" class="fa fa-chevron-down"></i>      
    </div>
    
    <div class="Font8g shadow-sm py-3 px-4 update-card">
      <div class="w-100 d-flex" style="fe"><span class="title-strong mt-md-3 mt-lg-1 mt-sm-3 text-info">NEWS</span> <img src="{{asset('/img/stripe-line.png')}}" width="87%"></div>
      @foreach($news as $aNews)
          <div class="py-3 m-0" data-aos="zoom-in">            
            <p><strong class="title-strong" style="">{{ $aNews->title }}</strong></p>
            <p class="mb-1" style="font-size: 1em;">{{ $aNews->body }}<br></p>
            <p class="p-0 my-0"><strong style=" color: #999">Posted at {{ $aNews->datetime }} </strong></p>
          </div>
          <div class="line my-1"></div>
      @endforeach
      <br>
      <p class="p-0 mt-3">
        <b class="w-100 d-block text-center text-danger1">Read more</b>
        <a href="#">          
            <span class="d-block text-center text-size-1"  >{{ $current_session }} Admission Advert </span>          
        </a>
      </p>
    </div>    
    <div class="shadow-sm py-3 px-4 update-card my-5">
      <div class="w-100 d-flex mt-2 mb-3" style="fe"><span class="title-strong mt-md-3 mt-lg-1 mt-sm-3 text-info">PROGRAMMES</span> <img src="{{asset('/img/stripe-line.png')}}" width="70%"></div>
        <p class="title-strong caps text-left">Our Accredited Programmes</p>
      <ul>
        @foreach($programmes as $programme)
          <li>{{$programme->name}}</li>
        @endforeach
      </ul>
      <center>      
        <a class="btn py-3 px-5 btn-success rounded text-size shadow my-3 w-100" href="{{route('programmes')}}">Apply Now</a>
      </center>
    </div>