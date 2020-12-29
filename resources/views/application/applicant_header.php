<?php 
	
	$application_before_app_payment = [
					[
						'title' => 'College Home',
						'link' => HOME_PATH,
						'icon' => ''
					],
					[
						'title' => 'Application Home',
						'link' => './',
						'icon' => ''
					],
					[
						'title' => 'Contact  Us',
						'link' => '../contact.php',
						'icon' => ''
					],
					[
						'title' => 'Logout',
						'link' => 'logout.php',
						'icon' => ''
					]
				];
			$application_after_app_payment = [
					[
						'title' => 'College Home',
						'link' => HOME_PATH,
						'icon' => ''
					],
					[
						'title' => 'Application Home',
						'link' => './',
						'icon' => ''
					],
					[
						'title' => 'Contact  Us',
						'link' => '../contact.php',
						'icon' => ''
					],
					[
						'title' => 'Logout',
						'link' => 'logout.php',
						'icon' => ''
					]
				];
?>

<div class="fixed-top" style="margin:0">
		<table width="100%" align="center" cellpadding="0" cellspacing="0" style="border-left:1px solid #121212; border-right: 1px solid #121212">
			<tr  style="background-image:url(.../img/top_bg.png); background-repeat: no-repeat;background-size: 100% 100px;">
				<td height="59"  valign="top"  style="border-bottom:1px solid #74b141">
					<table>
						<tr>
							<td width="85" valign="top" align="center" height="60"><img src="../img/logo.jpg" width="60px" height="60px" style="position:absolute" /></td>
							<td width="35"></td>
							<td width="788"><strong style="color:#2064a8; text-shadow:1px 0px 1px #67b1e6; padding:5pt; font-size: 17pt"><?= SCHOOL_NAME;?></strong><br />
							<span><strong>&nbsp;&nbsp;&nbsp;...<?= SCHOOL_MOTTO;?></strong></span></td>
						</tr>
					</table>
				</td>
			</tr>
			
			<?php 
				if($form_fee == '0'){
					$menu_list = $application_before_app_payment;
				}else{
					$menu_list = $application_after_app_payment;
				}
			?>
			
			<tr>
				<td height="26" bgcolor="#2064a8" align="center" style="border-top:1px solid #2064a8; border-bottom:1px solid #2064a8;color:#fff">
				<div class="col-md-12 col-lg-12 hidden-sm hidden-xs">
				<TABLE cellpadding="0" cellspacing="0" >
				<TR>
				<td width="150" height="26" class="linkbar linkbar_active" align="center" style="border-left:1px solid #fff"><strong><a href="../<?= HOME_PATH;?>">College Home</a></strong></td>
				<td width="150" height="26" class="linkbar" align="center" ><strong><a href="./">Application Home</a></strong></td>
				<td width="120" class="linkbar" align="center"><strong><a href="<?= DEPARTMENTS_PATH;?>">Contact Us</a></strong></td>
				<td width="120" class="linkbar" align="center"><strong><a href="logout.php">Logout</a></strong></td>
				</TR>
				</TABLE>
				</div>
						<nav class="navbar col-sm-12 col-xs-12 hidden-md hidden-lg" id="top-navbar" style="margin:0;padding:0" >
							  <div class="container-fluid">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
								  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								  </button>
								  <a class="navbar-brand" href="#">@APP Portal</a>
								</div>

								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								  <ul class="nav navbar-nav">
									<li class="active nav-li" ><a href="#">Link <span class="sr-only">(current)</span></a></li>
									<li class="nav-li"><a href="#">Link</a></li>
									
								  </ul>
								  
								  <ul class="nav navbar-nav navbar-right">
									<li><a href="#">Link</a></li>
									
								  </ul>
								</div><!-- /.navbar-collapse -->
							  </div><!-- /.container-fluid -->
</nav>
				</td>
			</tr>
			<?php
			
			?>
		</table>
	</div>

