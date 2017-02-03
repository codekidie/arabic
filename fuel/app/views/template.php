<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css(array('vendors/bootstrap/dist/css/bootstrap.min.css',
						        'vendors/font-awesome/css/font-awesome.min.css',
						        'vendors/nprogress/nprogress.css',
						        'vendors/normalize-css/normalize.css',
						        'vendors/ion.rangeSlider/css/ion.rangeSlider.css',
						        'vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css',
						        'vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css',
						        'vendors/cropper/dist/cropper.min.css',
						        'vendors/iCheck/skins/flat/green.css',
						        'build/css/custom.min.css',
						        )); ?>
</head>
<body class="nav-md">
 <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-ra"></i> <span>SALMONAN ARABIC ISLAMIC INSTITUTE WEB-APPLICATION
</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
              <?php echo Asset::img('user.png', array('class' => 'img-circle profile_img')); ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo Auth::get('fullname'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Navigation Sub</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Navigation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Navigation sub</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Navigation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Navigation Sub</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Navigation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Navigation Sub</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Navigation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Navigation Sub</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Navigation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Navigation Sub</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
             

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              	<?php echo Asset::img('user.png'); ?><?php echo Auth::get('fullname'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><?php echo Html::anchor('frontenduser/logout', '<i class="fa fa-sign-out pull-right"></i> Log Out</a>') ?></li>
         
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><?php echo Asset::img('user.png'); ?></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><?php echo Asset::img('user.png'); ?></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><?php echo Asset::img('user.png'); ?></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><?php echo Asset::img('user.png'); ?></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $title; ?></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
			
            <div class="clearfix"></div>
			<?php if (Session::get_flash('success')): ?>
						<div class="alert alert-success">
							<strong>Success</strong>
							<p>
							<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
							</p>
						</div>
			<?php endif; ?>
			<?php if (Session::get_flash('error')): ?>
						<div class="alert alert-danger">
							<strong>Error</strong>
							<p>
							<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
							</p>
						</div>
			<?php endif; ?>
	
					<?php echo $content; ?>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Quran Quiz  <a href="#">Trivia</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
   	<?php echo Asset::js(array('vendors/jquery/dist/jquery.min.js',
						        'vendors/bootstrap/dist/js/bootstrap.min.js',
						        'vendors/fastclick/lib/fastclick.js',
						        'vendors/nprogress/nprogress.js',
						        'moment.min.js',
						        'daterangepicker.js',
						        'vendors/ion.rangeSlider/js/ion.rangeSlider.min.js',
						        'vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js',
						        'vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js',
						        'vendors/jquery-knob/dist/jquery.knob.min.js',
						        'vendors/cropper/dist/cropper.min.js',
						        'build/js/custom.min.js',
						        'vendors/bootstrap-progressbar/bootstrap-progressbar.min.js'
						        )); ?> 
</body>
</html>
