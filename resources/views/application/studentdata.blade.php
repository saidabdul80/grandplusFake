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
		<li class="portalBtn-active" onclick="window.location.href = '{{route("portal",["sect"=>"studentdata"])}}'">My Personal Data </li>
			<li onclick="window.location.href = '{{route("portal",["sect"=>"courseedit"])}}'">Course Registration </li>
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
		<div class="portal-nav" style="clear: left;">
			<a class="text-primary1" ><span class="fa fa-caret-right  text-primary1 pr-2"></span>ShowStudent Biodata</a>			
			<ul>
				<li>
						<!-- content -->

				</li>
				<br><br><br>
			</ul>
		</div>

		<div class="line"></div>
		
		<div class="portal-nav" style="clear: left;">
			<a class="text-primary1" ><span class="fa fa-caret-right  text-primary1 pr-2"></span>Show Passport Photograph</a>			
			<ul>
				<li>
						<!-- content -->

				</li>
				<br><br><br>
			</ul>
		</div>

		<div class="line"></div>

		<div class="portal-nav" style="clear: left;">
			<a class="text-primary1" ><span class="fa fa-caret-right  text-primary1 pr-2"></span>Show Contact Information</a>			
			<ul>
				<li>
						<!-- content -->

				</li>
				<br><br><br>
			</ul>
		</div>

		<div class="line"></div>
		<div class="portal-nav" style="clear: left;">
			<a  class="text-primary1"><span class="fa fa-caret-right  text-primary1 pr-2"></span>Show Academic Information</a>			
			<ul>
				<li>
						<!-- content -->

				</li>
				<br><br><br>
			</ul>
		</div>

		<div class="line"></div>

		<div class="portal-nav" style="clear: left;">
			<a  class="text-primary1"><span class="fa fa-caret-right  text-primary1 pr-2"></span>Show Health Information</a>			
			<ul>
				<li>
						<!-- content -->

				</li>
				<br><br><br>
			</ul>
		</div>

		<div class="line"></div>


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