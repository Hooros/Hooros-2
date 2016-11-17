<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

 <?php
?>


<link href="<?php echo base_url('assets/css/sb-admin-2.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/timeline.css')?>" rel="stylesheet">
<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><?php echo $name.' '.$surname?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
<!--                        <li><a href="project/"><i class="fa fa-building fa-fw"></i> Project</a>
                        </li>-->
                        <li class="divider"></li>
                        <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
<!--                        <li>
                            <a href="project"><i class="fa fa-folder-open fa-fw"></i> Project</a>
                        </li>-->
                        <li>
                            <a href="profile"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        
                       
                        
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                     
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Freelancer Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="container" style="padding-top: 60px;">
  <h1 class="page-header">Edit Profile</h1>
  <div class="row">
      <h3>My Skills</h3>
      <div class="col-md-4 col-sm-6 col-xs-12">
          <?php $count = 0;
                foreach($my_skills as $row){
                    echo '<button class="btn btn-primary btn-xs" type="button">'
                    .$row['skill_name'].'
                    </button>';
                    if($count==5){
                        echo '<br/>';
                        $count = 0;
                    }
                }
                ?>                   
        
    </div>
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
        <form method="post" action="add_skills">
            <label>Skills</label>
            <select name="skillsList" class="form-control">
                <?php 
                foreach($skill_list as $row){
                    echo '<option value="'.$row['skill_id'].'">'.$row['skill_name'].'</option>';
                }
                ?>
            </select>
            <label>Rate yourself out of 3</label>
            <select name="skillLevel" class="form-control">
                <option value="Beginner">1</option>
                <option value="Intermediate">2</option>
                <option value="Expert">3</option>
            </select>
            <label>Years of experience</label>
            <input class="form-control" name="years" type="number" required="required"/><br/>
            <input class="btn btn-primary" value="Add Skill" type="submit">
        </form>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      
      <h3>Personal info</h3>
      <form class="form-horizontal" role="form" method="post" action="update">
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control" name="name" value="<?php echo $profile->fl_name?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
              <input class="form-control" name="surname" value="<?php echo $profile->fl_surname?>" type="text">
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
              <input class="form-control" name="email" value="<?php echo $profile->fl_email?>" type="text">
          </div>
        </div>
          <div class="form-group">
          <label class="col-lg-3 control-label">Skype <i class="fa fa-fw fa-skype"></i>:</label>
          <div class="col-lg-8">
              <input class="form-control" name="skype" value="<?php echo $profile->fl_skype_id?>" type="text">
          </div>
        </div>
          
          <div class="form-group">
          <label class="col-lg-3 control-label">Rate per hour: R</label>
          <div class="col-lg-8">
              <input class="form-control" placeholder="0.00" name="rate" value="<?php echo $profile->fl_rate?>" type="number">
          </div>
        </div>
        
<!--        for password
        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" value="11111122333" type="password">
          </div>
        </div>-->
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="submit">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
       
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/metisMenu/dist/metisMenu.min.js')?>"></script>
    <script src="<?php echo base_url('assets/metisMenu/dist/metisMenu.js')?>"></script>
<!-- MetisMenu CSS -->
    <link href="<?php echo base_url('assets/metisMenu/dist/metisMenu.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/metisMenu/dist/metisMenu.min.css')?>" rel="stylesheet">
  