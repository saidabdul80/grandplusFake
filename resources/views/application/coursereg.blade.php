<style>
	.portalBtn{
		padding: 0px;
		border-radius: 5px;
		box-shadow: 1px 1px 2px #aaa;
		display: inline-block;
		}
	.portalBtn li{
		color:#555;
		display: inline-block;		
		padding: 4px 14px;
		margin: 0px -2px;
		background: #f5f5f5;
		background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
		cursor: pointer;
	}
	.portalBtn li:first-child{
		border-radius: 5px 0px 0px 5px;
	}
	.portalBtn li:last-child{
		border-radius: 0px 5px 5px 0px;
	}
	.portalBtn-active{
		background-image: none !important;
		background: #aaa;
		box-shadow: 1px 2px 7px inset #999;
	}
	.portal-nav{
		margin-bottom: 4px;
		padding: 9px 0px;
		
	}
	.portal-nav a{
		cursor: pointer;
	}
	.portal-nav ul{
		display:none;
		padding-left: 0px;
	}
	.portal-nav ul li{
		list-style: none;
	}
	.portal-nav ul li:last-child{
		margin-bottom: 8px;
	}
	.line{
		clear: left;
	}
</style>
<div>
	<div>
		<ul class="portalBtn">
			<li onclick="window.location.href = '{{route("portal",["sect"=>"studentdata"])}}'">My Personal Data </li>
			<li class="portalBtn-active" onclick="window.location.href = '{{route("portal",["sect"=>"courseedit"])}}'">Course Registration </li>
			<li>My Result </li>
		</ul>
	</div>
	<div>
		<ul class="portalBtn">
			<li>View</li>
			<li>Edit</li>
		</ul>
	</div>
	<br>
	<div style="display: flex;">
		<img src="{{asset('img/reg.jpg')}}" width="50px" height="55px">
		<a style="margin-top: 37px;" href="#">Click the LINKS below to select or update your course registration.</a>
	</div>
	<br><br><br>
	<div>
		<div class="portal-nav">
			<a><span class="fa fa-caret-right  text-primary1 pr-2"></span>ShowBasic Course Reg. Information</a>						
			<ul>
				<li>
					<div class="fieldset-wrapper" style="display: block;">
						<div style="float:left;margin-right:10px;">
							<div class="form-item form-type-select form-item-session">
						  		<label for="edit-session">Active Session <span class="form-required" title="This field is required.">*</span></label>
						 		<select id="edit-session" name="session" class="form-select required">
						 			<option value="0">2019/2020</option>
						 		</select>
							</div>
						</div>
							<div style="float:left;margin-right:10px;">
								<div class="form-item form-type-select form-item-level">
					  				<label for="edit-level">Your Current Level <span class="form-required" title="This field is required.">*</span></label>
					 				<select id="edit-level" name="level" class="form-select required">
					 					<option value="0">100</option>
					 					<option value="1">200</option>
					 					<option value="2">300</option>
					 					<option value="3" selected="selected">400</option>
					 					<option value="4">500</option>
					 				</select>
								</div>
							</div>
						</div>
				</li>	
				<br><br><br>			
			</ul>
		
		</div>
		<div class="line" ></div>
		

		<div class="portal-nav" style="clear: left;">
			<a  ><span class="fa fa-caret-right  text-primary1 pr-2"></span>Show First Semester Courses</a>			
			<ul>
				<li>
					<div class="fieldset-wrapper" style="width: 100%;">
						<div style=" margin-right:10px;">
							<div class="form-item form-type-select form-item-gec-scode">
  								<label for="edit-gec-scode">Select First Semester Course Code: </label>
 								<select id="edit-gec-fcode" name="gec_scode" class="form-select" style="width: 200px;">
 									<option value="" selected="selected">- Select -</option>
 								</select>
  								<button class="btn btn-primary">Register Selected Course - First Semester</button>
 							</div>
 							<br>
 							<table class="table" style="width: 100%;">
 								<thead>
 									<th>code</th>
 									<th>Title</th>
 									<th>Unit</th>
 									<th>Semester</th>
 								</thead>
 								<tbody>
 									<tr></tr>
 								</tbody>
 							</table>
 						</div>
 					</div>
 				</li>
				<br><br><br>
			</ul>
		</div>

		<div class="line"></div>
		
		<div class="portal-nav" style="clear: left;">
			<a ><span class="fa fa-caret-right  text-primary1 pr-2"></span>Show Second Semester Courses</a>
			<ul>
				<li>
					<div class="fieldset-wrapper" style="width: 100%;">
						<div style=" margin-right:10px;">
							<div class="form-item form-type-select form-item-gec-scode">
  								<label for="edit-gec-scode">Select Second Semester Course Code: </label>
  								<select id="edit-gec-scode" name="gec_scode" class="form-select" style="width: 200px;">
 									<option value="" selected="selected">- Select -</option>
 								</select>
  								<button class="btn btn-primary">Register Selected Course - First Semester</button>
 							</div>
 							<br>
 							<table class="table" style="width: 100%;">
 								<thead>
 									<th>code</th>
 									<th>Title</th>
 									<th>Unit</th>
 									<th>Semester</th>
 								</thead>
 								<tbody>
 									<tr></tr>
 								</tbody>
 							</table>
 						</div>
 					</div>
				</li>
				<li>sdlk</li>
				<li>sdlk</li>
				<br><br><br>
			</ul>
		</div>

	</div>
</div>
<script type="text/javascript">
	$('.portalBtn li').on('click', function(){
		$(this).parent().find('li').removeClass('portalBtn-active');
		$(this).addClass('portalBtn-active');
	});
	$('.portal-nav a').on('click', function(){
		if($(this).find('span').hasClass('fa-caret-right')){
			$(this).find('span').removeClass('fa-caret-right');
			$(this).find('span').addClass('fa-caret-down');
		}else{
			$(this).find('span').removeClass('fa-caret-down');
			$(this).find('span').addClass('fa-caret-right');
		}
		$(this).parent().find('>ul').slideToggle(200);		
	});
</script>