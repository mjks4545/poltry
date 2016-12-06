<!-- for controller -->
<div ng-controller = "studentController">
	<!-- navigation start-->

	<nav class="navbar navbar-default affix-top" role="navigation">
		<div class="container-fluid">
			<div class="container nav-container">

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".js-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<div id="menu-menu" class="nav navbar-nav js-navbar-collapse collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown mega-dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">subjects <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>

							<ul class="dropdown-menu mega-dropdown-menu row">
								<li class="col-sm-3">
									<ul>
										<li class="dropdown-header">New in Stores</li>                            
										<div id="myCarousel" class="carousel slide" data-ride="carousel">
											<div class="carousel-inner">
												<div class="item active">
													<a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
													<h4><small>Summer dress floral prints</small></h4>                                        
													<button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>       
												</div><!-- End Item -->
												<div class="item">
													<a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
													<h4><small>Gold sandals with shiny touch</small></h4>                                        
													<button class="btn btn-primary" type="button">9,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>        
												</div><!-- End Item -->
												<div class="item">
													<a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
													<h4><small>Denin jacket stamped</small></h4>                                        
													<button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>      
												</div><!-- End Item -->                                
											</div><!-- End Carousel Inner -->
										</div><!-- /.carousel -->
										<li class="divider"></li>
										<li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
									</ul>
								</li>
								<li class="col-sm-3">
									<ul>
										<li class="dropdown-header">Maths</li>
										<li><a href="#">Algebra</a></li>
										<li><a href="#">Calculus</a></li>
										<li><a href="#">Trignometry</a></li>
										<li><a href="#">Geometry</a></li>
										<li><a href="#">Four columns</a></li>
										<li class="divider"></li>
										<li class="dropdown-header">Tops</li>
										<li><a href="#">Good Typography</a></li>
									</ul>
								</li>
								<li class="col-sm-3">
									<ul>
										<li class="dropdown-header">computer science</li>
										<li><a href="#">Easy to customize</a></li>
										<li><a href="#">Glyphicons</a></li>
										<li><a href="#">Pull Right Elements</a></li>
										<li class="divider"></li>
										<li class="dropdown-header">Pants</li>
										<li><a href="#">Coloured Headers</a></li>
										<li><a href="#">Primary Buttons & Default</a></li>
										<li><a href="#">Calls to action</a></li>
									</ul>
								</li>
								<li class="col-sm-3">
									<ul>
										<li class="dropdown-header">Medical Sciences</li>
										<li><a href="#">Default Navbar</a></li>
										<li><a href="#">Lovely Fonts</a></li>
										<li><a href="#">Responsive Dropdown </a></li>							
										<li class="divider"></li>
										<li class="dropdown-header">Newsletter</li>
										<form class="form" role="form">
											<div class="form-group">
												<label class="sr-only" for="email">Email address</label>
												<input type="email" class="form-control" id="email" placeholder="Enter email">                                                              
											</div>
											<button type="submit" class="btn btn-primary btn-block">Sign in</button>
										</form>                                                       
									</ul>
								</li>
							</ul>

						</li>
					</ul>

				</div><!-- /.nav-collapse i.e subject detail area end -->


				<ul class="nav navbar-nav navbar-right nav-pills" ng-init="getAllStudents()" ng-cloak>
					<?php if(!$this->session->userdata('loged_in_hay')) {?>
					<li class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

							hello
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" ng-repeat="student in students" >
							<li><a class="dropdown-toggle" href="<?php echo base_url('index.php/student/logout');?>">logout</a>
							</li>
							<li><a href="<?php echo base_url('index.php/student/getImage/{{student.student_id}}');?>">Profile</a>
							</li>
						</ul>
					</li>

					<?php }?>

					<?php if(!$this->session->userdata('loged_in_hay')) {?>
					<li class="menu-item"> <!-- Button trigger modal -->
						<a href="#loginModal" ng-click=editStudent('new')  data-toggle="modal"> Login? signup
						</a></li><?php }?>


 				 <!-- for future use
 				<li class="li-form">
 					<!--  SEARCH 
 					<form role="search" id="search-nav" method="get" action="#">
 						<input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Rechercher :">

 						<button type="reset">
 							<span class="fa fa-close">
 								<span class="sr-only">Close</span>
 							</span>
 						</button>
 						<button type="submit" class="search-submit">
 							<span class="fa fa-search">
 								<span class="sr-only">Rechercher</span>
 							</span>
 						</button>
 					</form>               
 				</li>-->
 			</ul>
 		</div>
 	</div>
 </nav><!-- main navigation end-->
  
 <!-- login modal pop up-->
 <div class="col-sm-8 col-sm-offset-2">


 	<!-- -Login Modal -->
 	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
 		<div class="modal-dialog">
 			<div class="modal-content login-modal">
 				<div class="modal-header login-modal-header">
 					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 					<h4 class="modal-title text-center" id="loginModalLabel">USER AUTHENTICATION</h4>
 				</div>
 				<div class="modal-body">
 					<div class="text-center">
 						<div role="tabpanel" class="login-tab">
 							<!-- Nav tabs -->
 							<ul class="nav nav-tabs" role="tablist">
 								<li role="presentation" class="active"><a id="signin-taba" href="#home" aria-controls="home" role="tab" data-toggle="tab">Sign In</a></li>
 								<li role="presentation"><a id="signup-taba" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Sign Up</a></li>
 								<li role="presentation"><a id="forgetpass-taba" href="#forget_password" aria-controls="forget_password" role="tab" data-toggle="tab">Forget Password</a></li>
 							</ul>

 							<!-- Tab panes -->
 							<div class="tab-content">
 								<div role="tabpanel" class="tab-pane active text-center" id="home">
 									&nbsp;&nbsp;
 									<span id="login_fail" class="response_error" style="display: none;">Loggin failed, please try again.</span>
 									<div class="clearfix"></div>
 									<form name="loginForm" method="post" action="<?php echo base_url('student/login_success');?>" >
 										<div class="form-group">
 											<div class="input-group">
 												<div class="input-group-addon"><i class="fa fa-user"></i></div>
 												<input type="text" class="form-control" id="login_username" placeholder="Username" name="email">
 											</div>
 											<span class="help-block has-error" id="email-error"></span>
 										</div>
 										<div class="form-group">
 											<div class="input-group">
 												<div class="input-group-addon"><i class="fa fa-lock"></i></div>
 												<input type="password" class="form-control" id="password" placeholder="Password" name="password">
 											</div>
 											<span class="help-block has-error" id="password-error"></span>
 										</div>
 										<button type="submit" id="login_btn" class="btn btn-block bt-login" data-loading-text="Signing In...." >Login</button>
 										<div class="clearfix"></div>
 										<div class="login-modal-footer">
 											<div class="row">
 												<div class="col-xs-8 col-sm-8 col-md-8">
 													<i class="fa fa-lock"></i>
 													<a href="javascript:;" class="forgetpass-tab"> Forgot password? </a>

 												</div>

 												<div class="col-xs-4 col-sm-4 col-md-4">
 													<i class="fa fa-check"></i>
 													<a href="javascript:;" class="signup-tab"> Sign Up </a>
 												</div>
 											</div>
 										</div>
 									</form>
 								</div>
 								<div role="tabpanel" class="tab-pane" id="profile">
 									&nbsp;&nbsp;
 									<span id="registration_fail" class="response_error" style="display: none;">Registration failed, please try again.</span>
 									<div class="clearfix"></div>

 									<!-- sign up content goes here -->

 									<form  name="studentForm" method="post" novalidate >

 										<div class="form-group">
 											<label for="firstName">First name</label>
 											<input name = "firstname" class="form-control" type = "text" ng-model = "firstname" required >
 											<span style = "color:red" ng-show = "studentForm.firstname.$dirty && studentForm.firstname.$invalid">
 												<span style = "color:red" ng-show = "studentForm.firstname.$error.required">First Name is required.</span>
 											</span>

 										</div>

 										<div class="form-group">
 											<label for="lastName">Last name</label>
 											<input name = "lastname" class="form-control"  type = "text" ng-model = "lastname" required>
 											<span style = "color:red" ng-show = "studentForm.lastname.$dirty && studentForm.lastname.$invalid">
 												<span style = "color:red" ng-show = "studentForm.lastname.$error.required">Last Name is required.</span>
 											</span>

 										</div>

 										<div class="form-group">
 											<label for="dateOfBirth">Date of birth</label>
 											<input type="date" class="form-control"  id="exampleInput" name="date" ng-model="date_birth"   >

 											<span style = "color:red" ng-show = "studentForm.date.$dirty && studentForm.date.$invalid">
 												<span style = "color:red;" ng-show="myForm.date.$error.required">
 												</span> Date of Birth Required
 												<span style = "color:red;" ng-show="myForm.date.$error.date">
 													Not a valid date!
 												</span>

 											</div>
 											<div class="form-group">
 												<label for="instituite">instituite</label>
 												<input type="text" class="form-control" maxlength="40" ng-model="institution">
 											</div>
 											<div class="form-group">
 												<label for="lastName">grade</label>
 												<input type="text" class="form-control" maxlength="4" ng-model="grade" >
 											</div>
 											<div class="form-group">
 												<label for="contact">contact</label>
 												<input type="number" class="form-control" name="phone" min="0"   ng-maxlength="14" ng-model="phone"  >
 												<span style = "color:red" ng-show = "studentForm.phone.$dirty && studentForm.phone.$invalid">
 													<span ng-show = "studentForm.phone.$error.required">contact No is required.</span>

 													<span style = "color:red;" ng-show="studentForm.phone.$error.number">
 														Not valid number!</span>

 													</div>
 													<div class="form-group">
 														<label for="email">email address</label>
 														<input name = "email" class="form-control" type = "email" ng-model = "email" length = "100" required>
 														<span style = "color:red" ng-show = "studentForm.email.$dirty && studentForm.email.$invalid">
 															<span ng-show = "studentForm.email.$error.required">Email is required.</span>
 															<span ng-show = "studentForm.email.$error.email">Invalid email address.</span>
 														</span>

 													</div>
 													<div class="form-group">
 														<label for="email">Password</label>
 														<input name = "password" class="form-control" type = "password" ng-model = "password"  required>
 														<span style = "color:red" ng-show = "studentForm.password.$dirty && studentForm.password.$invalid">
 															<span ng-show = "studentForm.password.$error.required">Password is required.</span>
 															<span ng-show = "studentForm.password.$error.password">Invalid password .</span>
 														</span>

 													</div>
 													<div class="form-group">
 														<label for="email">Re-type Password</label>
 														<input name = "confirm_password" class="form-control" type = "password" ng-model = "confirm_password"  required>
 														<span style = "color:red" ng-show = "studentForm.confirm_password.$dirty && studentForm.confirm_password.$invalid">
 															<span ng-show = "studentForm.confirm_password.$error.required">Password is required.</span>
 															<span ng-show = "studentForm.confirm_password.$error.password">Invalid password address.</span>
 														</span>

 													</div>
 													<div class="form-group">
 														<label for="lastName">Favourite subject</label>
 														<input type="text" class="form-control" maxlength="20" ng-model="favourite_subject" >
 													</div>
 													<div class="form-group">
 														<label for="dateOfBirth">Intersting</label>
 														<input type="text" class="form-control" maxlength="30" ng-model="interest" >
 													</div>
 													<div class="form-group">
 														<label for="firstName">Achivements</label>
 														<input type="text" class="form-control" maxlength="100" ng-model="achivements">
 													</div>
 													<div class="form-group">
 														<label for="firstName">About Yourself</label>
 														<textarea class="form-control" maxlength="500" ng-model="about_yourself"></textarea>
 													</div>

 													<div class="modal-footer">
 														<div class="btn-group btn-group-justified" role="group" aria-label="group button">
 															<div class="btn-group" role="group" >
 																<button   type="button"  class="btn btn-default btn-hover-green" data-action="save" role="button" data-dismiss="modal"  ng-click="createStudent('new')"  >Save</button>
 															</div>

 															<div class="btn-group" role="group">
 																<button type="button" class="btn btn-default" ng-click="clearForm()"   role="button">Reset</button>
 															</div>
 															<div class="btn-group" role="group">
 																<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
 															</div>


 														</div>
 													</div>
 													<div class="clearfix"></div>
 													<div class="login-modal-footer">
 														<div class="row">
 															<div class="col-xs-8 col-sm-8 col-md-8">
 																<i class="fa fa-lock"></i>
 																<a href="javascript:;" class="forgetpass-tab"> Forgot password? </a>

 															</div>

 															<div class="col-xs-4 col-sm-4 col-md-4">
 																<i class="fa fa-check"></i>
 																<a href="javascript:;" class="signin-tab"> Sign In </a>
 															</div>
 														</div>
 													</div> 
 												</form><!-- sign up form end-->


 											</div>
 											<div role="tabpanel" class="tab-pane text-center" id="forget_password">
 												&nbsp;&nbsp;
 												<span id="reset_fail" class="response_error" style="display: none;"></span>
 												<div class="clearfix"></div>
 												<form name="forgetPassword" method="post" action="<?php ?>">
 													<div class="form-group">
 														<div class="input-group">
 															<div class="input-group-addon"><i class="fa fa-user"></i></div>
 															<input type="text" class="form-control" id="femail" placeholder="Email">
 														</div>
 														<span class="help-block has-error" data-error='0' id="femail-error"></span>
 													</div>

 													<button type="button" id="reset_btn" class="btn btn-block bt-login" data-loading-text="Please wait....">Forget Password</button>
 													<div class="clearfix"></div>
 													<div class="login-modal-footer">
 														<div class="row">
 															<div class="col-xs-6 col-sm-6 col-md-6">
 																<i class="fa fa-lock"></i>
 																<a href="javascript:;" class="signin-tab"> Sign In </a>

 															</div>

 															<div class="col-xs-6 col-sm-6 col-md-6">
 																<i class="fa fa-check"></i>
 																<a href="#" class="signup-tab"> Sign Up </a>
 															</div>
 														</div>
 													</div>
 												</form>
 											</div>
 										</div>
 									</div>

 								</div>
 							</div>

 						</div>
 					</div>
 				</div><!-- - Login Model Ends Here -->
 			</div><!-- colsm offset 2 -->


 			 
 		</div><!-- controller div end -->











