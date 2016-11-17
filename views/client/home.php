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
        
           <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
              <a href="#" data-toggle="modal" data-target="#uploadProfile"><span class="info-box-icon bg-aqua"><i class="ion ion-ios-compose"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Project</span>
              
            </div></a>
            <!-- /.info-box-content -->
          </div>
            
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
<!--        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
             /.info-box-content 
          </div>
           /.info-box 
        </div>-->
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-cash"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Money Spent</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Freelancers</span>
              <span class="info-box-number"><?php echo $my_freelancers?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/profile_picture/default.jpg" alt="User profile picture">
              <a href="#"  data-toggle="modal" data-target="#uploadProfile" class="btn btn-block btn-primary btn-sm">Upload Image</a>

              <h3 class="profile-username text-center"><?php echo $name.' '.$surname?></h3>

              <!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <!--<li ><a href="#statistics" data-toggle="tab">Statistics</a></li>-->  
              <li class="active"><a href="#projects" data-toggle="tab">Projects</a></li>
              <li><a href="#company" data-toggle="tab">Company</a></li>
              <li><a href="#settings" data-toggle="tab">Profile</a></li>
            </ul>
            <div class="tab-content">
<!--                <div class="active tab-pane" id="statistics">
                  
              </div>-->
              <!-- /.tab-pane -->
                
              <div class="active tab-pane" id="projects">
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
                <li><a>Completion Date <span class="pull-right badge bg-blue"><?php echo $ap['project_completion_date']?></span></a></li> 
                <li><a>Freelancers Required <span class="pull-right badge bg-aqua"><?php echo $ap['number_of_freelancers']?></span></a></li>
               
              </ul>
            </div>
       
          </div>
                                            
            <?php  }  ?>
      
              </div>

              <div class="tab-pane" id="settings">
                  <form class="form-horizontal" method="post" action="update">
                      
                  <div class="form-group">
                      
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
                        <input type="email" name="email" class="form-control" id="inputEmail" required="" placeholder="Email" value="<?php echo $email?>">
                    </div>
                  </div>
                                       
 		  <div class="form-group">
                    <label for="skypeID" class="col-sm-2 control-label">Skype</label>

                    <div class="col-sm-10">
                        <input type="text" name="skype" class="form-control" id="skypeID" required="" placeholder= "SkypeID" value="">
                    </div>
                  </div>

                
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                            <input type="checkbox" required=""> I agree to the <a href="http://hooros.co.za/terms.php">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              
              <!-- tab pane -->
             
              <div class="tab-pane" id="company">
 
                  <form class="form-horizontal" method="post" action="update">
                      
                  <div class="form-group">
                      
                    <label for="inputName" class="col-sm-2 control-label">Company Name</label>

                    <div class="col-sm-10">
                        <input type="name" class="form-control" name="name" id="inputName" required=""  value="<?php echo $company_name?>">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="inputSurname" class="col-sm-2 control-label">Website</label>

                    <div class="col-sm-10">
                        <input type="text" name="website" class="form-control" id="inputSurname" required=""  value="<?php echo $company_website?>">
                    </div>
                  </div>
                      <div class="form-group">
                    <label for="location" class="col-sm-2 control-label">Location</label>

                    <div class="col-sm-10">
                        <input type="text" name="location" class="form-control" id="location" required=""  value="<?php echo $company_location?>">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="brief" class="col-sm-2 control-label">Brief</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="brief" placeholder="Brief..."><?php echo $company_brief?></textarea>
                    </div>
                  </div>

                
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                            <input type="checkbox" required=""> I agree to the <a href="http://hooros.co.za/terms.php">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                  </div>
                </form>
              </div>
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
    
    <!-- Modal -->
                            <div class="modal fade modal-primary" id="uploadProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Upload Profile Picture</h4>
                                        </div>  
                                        <form method="post" action="do_upload" class="form-horizontal">
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>"/>
                                        <div class="modal-body">
                                            
              <!--<fieldset>-->


<!-- Text input-->

 
<div class="form-group">
   
    <div class="col-md-9 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input name="proPic" placeholder="Choose Image" class="form-control" required="" type="file">
    </div>
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    
  </div>
</div>

<!--</fieldset>-->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info" >Upload <span class="	glyphicon glyphicon-thumbs-up"></span></button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
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

  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<script>
  $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply your first name'
                    }
                }
            },
             last_name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply your last name'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Please supply a valid email address'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your phone number'
                    },
                    phone: {
                        country: 'US',
                        message: 'Please supply a vaild phone number with area code'
                    }
                }
            },
            address: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please supply your street address'
                    }
                }
            },
            city: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Please supply your city'
                    }
                }
            },
            state: {
                validators: {
                    notEmpty: {
                        message: 'Please select your state'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your zip code'
                    },
                    zipCode: {
                        country: 'US',
                        message: 'Please supply a vaild zip code'
                    }
                }
            },
            comment: {
                validators: {
                      stringLength: {
                        min: 10,
                        max: 200,
                        message:'Please enter at least 10 characters and no more than 200'
                    },
                    notEmpty: {
                        message: 'Please supply a description of your project'
                    }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
</script>