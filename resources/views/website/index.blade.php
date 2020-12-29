<?php 
    $about_college = '<p>  <span id="content"></span></p>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
  <p>The college offers several courses leading to the award of Nigeria certificate in Education, Certificate. Diploma and Degree.</p>
  <p>The college offers several courses leading to the award of Nigeria certificate in Education, Certificate. Diploma and Degree.</p>';
 $vision ='<p><strong>Vision Statement</strong></p>
  <p><span id="vision" style="color:#212529;font-weight:normal;" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>  </p>
  ';
 $mission ='<p><strong>Mission Statement</strong></p>  <p><span id="mission" style="color:#212529; font-weight:normal;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>  </p>';

 ?>
  @include('website.programes_code')
@extends('layouts.website')


@section('page-body')

  
  <div class="col-sm-12 col-lg-8" style="width: 100%; border-right: 1px solid #2064a8;">
    <div id="wowslider-container0" style="">
      <div class="ws_images"><ul>
          <li><img src="{{asset('data0/images/lab2.jpg')}}" alt="Our students in the Laboratory" title="Our students in the Laboratory" id="wows0_0"/>Our students in the Laboratory</li>
          <li><img src="{{asset('data0/images/lab3.png')}}" alt="Students have direct access to tools and Equipments" title="Students have direct access to tools and Equipments" id="wows0_1"/>Students have direct access to tools and Equipments</li>
          <li><a href="http://wowslider.net"><img src="{{asset('data0/images/68d7be6cb35a7b76c675d92c249469b9..jpg')}}" alt="css slideshow" title="Our Proud students" id="wows0_2"/></a></li>
          <li><img src="{{asset('data0/images/lab1.jpg')}}" alt="Students have direct access to tools and Equipments" title="Students have direct access to tools and Equipments" id="wows0_3"/>Students have direct access to tools and Equipments</li>
        </ul>
      </div>
      <div class="ws_bullets">
        <div>
          <a href="#" title="Our students in the Laboratory" class="text-danger1"><span><img src="{{asset('data0/tooltips/lab2.jpg')}}" alt="Our students in the Laboratory"/>1</span></a>
          <a href="#" title="Students have direct access to tools and Equipments"><span><img src="{{asset('data0/tooltips/lab3.png')}}" alt="Students have direct access to tools and Equipments"/>2</span></a>
          <a href="#" title="Our Proud students"><span><img src="{{asset('data0/tooltips/68d7be6cb35a7b76c675d92c249469b9..jpg')}}" alt="Our Proud students"/>3</span></a>
          <a href="#" title="Students have direct access to tools and Equipments"><span><img src="{{asset('data0/tooltips/lab1.jpg')}}" alt="Students have direct access to tools and Equipments"/>4</span></a>
        </div>
      </div>
      <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">jquery carousel</a> by WOWSlider.com v8.8</div>
      <div class="ws_shadow"></div>
    </div>  
    <script type="text/javascript" src="{{ asset('engine0/wowslider.js') }}"></script>
      <script type="text/javascript" src="{{ asset('engine0/script.js') }}"></script>
    <div class="line"></div>
    <p style="font-size: 26px;" data-aos='zoom-in' data-aos-delay="50"><strong class="text-danger1">About the College!</strong></p>
      <div class="p-0 m-0" data-aos='zoom-in' data-aos-delay="100">        
        {!! $about_college !!}
      </div>
      <div class="p-0 m-0" data-aos='zoom-in' data-aos-delay="200">        
        {!! $vision !!}
      </div>
      <div class="p-0 m-0" data-aos='zoom-in' data-aos-delay="300">        
        {!! $mission !!}
      </div>
 
                   
  </div>
  <div class="col-sm-12 col-lg-4" style="">
    @include('website.latest-update')
  </div>

     


@endsection


@section('scripts')
<style scoped="">

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