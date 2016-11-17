

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Hooros Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--<li><a href="#">Examples</a></li>-->
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/admin/dist/img/avatar.png" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $name.' '.$surname?></h3>

              <p class="text-muted text-center"><?php echo $profile->fl_title?></p>
<!--to do list SIJ calculate the average rating project completion and unique clients-->
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Average Rating</b> <a class="pull-right">N/A</a>
                </li>
                <li class="list-group-item">
                  <b>Projects Completed</b> <a class="pull-right"><?php echo $completed?></a>
                </li>
                <li class="list-group-item">
                  <b>Clients</b> <a class="pull-right"><?php echo $client_count?></a>
                </li>
              </ul>

              <!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Brief About Me</strong>

              <p class="text-muted">
               <?php echo $profile->fl_brief?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php $profile->fl_location?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                   <?php $count = 0;
                foreach($my_skills as $row){
                    $count =  rand(0, 5);
                    
                    if ($count == 0 ){
                        $label = 'danger';
                    }
                    else if($count==1){
                        $label = 'success';
                    }
                    else if($count==2){
                        $label = 'success';
                    }
                    else if($count==3){
                        $label = 'info';
                    }
                    else if($count==4){
                        $label = 'warning';
                    }
                    else{
                        $label = 'primary';
                    }
                                        
                    echo ' <span class="label label-'.$label.'">'
                    .$row['skill_name'].'
                    </span>';
                    if($count==5){
                        
                        $count = 0;
                    }
                }
                ?>       
                  
              </p>

              <hr>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Projects</a></li>
              <!--<li><a href="#timeline" data-toggle="tab">Timeline</a></li>-->
              <li><a href="#settings" data-toggle="tab">Profile</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                 <!-- Widget: user widget style 1 -->
                 
                 <?php  foreach($project as $ap){?>
                 
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img src="" id="img1" class="glyphicon glyphicon-asterisk">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $ap['project_title']?></h3>
              <h5 class="widget-user-desc"><?php echo $ap['project_start_date']?></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a>Start Date <span class="pull-right badge bg-red"><?php echo $ap['project_start_date']?></span></a></li>
                <li><a>Freelancers Required <span class="pull-right badge bg-aqua"><?php echo $ap['number_of_freelancers']?></span></a></li>
                <li><a>Completion Date <span class="pull-right badge bg-blue"><?php echo $ap['project_completion_date']?></span></a></li>                
                <li><form method="post" action="accept_project"><a><span> <button type="submit" class="btn btn-success"><b>I'm interested!</b></button>
                </span></a>
                 <input type="hidden" name="project" value="<?php echo $ap['project_id']?>">
                
                </form>
                </li>
               
              </ul>
            </div>
          </div>
                                            
                                     <?php
                 
                                        }
                                        ?>
          <!-- /.widget-user -->
                <!-- /.post -->

                <!-- Post -->
                 <!-- Widget: user widget style 1 -->
<!--          <div class="box box-widget widget-user-2">
             Add the bg color to the header using any of the bg-* classes 
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
               /.widget-user-image 
              <h3 class="widget-user-username">Nadia Carmichael</h3>
              <h5 class="widget-user-desc">Lead Developer</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
                <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
              </ul>
            </div>
          </div>-->
          <!-- /.widget-user -->
                <!-- /.post -->

                <!-- Post -->
                 <!-- Widget: user widget style 1 -->
<!--          <div class="box box-widget widget-user-2">
             Add the bg color to the header using any of the bg-* classes 
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
               /.widget-user-image 
              <h3 class="widget-user-username">Nadia Carmichael</h3>
              <h5 class="widget-user-desc">Lead Developer</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
                <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
              </ul>
            </div>
          </div>-->
          <!-- /.widget-user -->
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
<!--              <div class="tab-pane" id="timeline">
                 The timeline 
                <ul class="timeline timeline-inverse">
                   timeline time label 
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                   /.timeline-label 
                   timeline item 
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                   END timeline item 
                   timeline item 
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                   END timeline item 
                   timeline item 
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                   END timeline item 
                   timeline time label 
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                   /.timeline-label 
                   timeline item 
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                   END timeline item 
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>-->
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                  <form class="form-horizontal" method="post" action="update">
                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>"/>
                  <div class="form-group">
                      <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                        <input type="name" class="form-control" name="name" id="inputName" required=""  value="<?php echo $name?>">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="inputSurname" class="col-sm-2 control-label">Surname</label>

                    <div class="col-sm-10">
                        <input type="text" name="surname" class="form-control" id="inputSurname" required=""  value="<?php echo $surname?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail" required="" placeholder="Email" value="<?php echo $profile->fl_email?>">
                    </div>
                  </div>
                    
                    
                  <div class="form-group">
                    <label for="skypeID" class="col-sm-2 control-label">Skype</label>

                    <div class="col-sm-10">
                        <input type="text" name="skype" class="form-control" id="skypeID" required="" value="<?php echo $profile->fl_skype_id?>">
                    </div>
                  </div>
                      <div class="form-group">
                    <label for="location" class="col-sm-2 control-label">Location</label>

                    <div class="col-sm-10">
                        <input type="text" name="location" class="form-control" id="location" required="" value="<?php echo $profile->fl_location?>">
                    </div>
                  </div>
                    <!--Rate-->
                    <div class="form-group">
                    <label for="rate" class="col-sm-2 control-label">Rate (ZAR)</label>

                    <div class="col-sm-10">
                        <input type="number" name="rate" class="form-control" required="" id="rate" value="<?php echo $profile->fl_rate?>">
                    </div>
                  </div>
                    
                    <div class="form-group">
                    <label for="skillList" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                        <select aria-hidden="true" tabindex="-1" class="form-control select2 select2-hidden-accessible" name="skills[]" multiple="" data-placeholder="Select a Skill" style="width: 100%;">
                  <?php 
                foreach($skill_list as $row){
                    echo '<option value="'.$row['skill_id'].'">'.$row['skill_name'].'</option>';
                }
                ?>
                </select>
                
                    </div>
                  </div>
                 <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Brief</label>

                    <div class="col-sm-10">
                        <textarea class="form-control" name="brief" id="inputExperience" placeholder="About me"><?php echo $profile->fl_brief?></textarea>
                    </div>
                  </div>

                
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                            <input type="checkbox" required=""> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1.0
    </div>
      <strong>Copyright &copy; <?php echo date('Y')?> Hooros.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

