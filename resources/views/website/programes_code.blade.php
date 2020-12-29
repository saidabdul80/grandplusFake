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
?>