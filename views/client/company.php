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
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    
                </li>
            
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        
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
                        <li class="sidebar-search">
<!--                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>-->
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="company"><i class="fa fa-building fa-fw"></i>Company Profile</a>
                        </li>
                        <li>
                            <a href="profile"><i class="fa fa-user fa-fw"></i>My Profile</a>
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
                    <h1 class="page-header">Company Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="container" style="padding-top: 60px;">
  
  <div class="row">
    
    
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      
      
      <form class="form-horizontal" role="form" method="post" action="update_company">
        <div class="form-group">
          <label class="col-lg-3 control-label">Company name:</label>
          <div class="col-lg-8">
              <input class="form-control" name="name" value="<?php echo $profile->client_company_name?>" type="text" required="required">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Website</label>
          <div class="col-lg-8">
              <input class="form-control" name="website" value="<?php echo $profile->company_website?>" type="text" required="">
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-lg-3 control-label">Company Brief:</label>
          <div class="col-lg-8">
              <textarea class="form-control" name="brief" required=""><?php echo $profile->client_brief?></textarea>
          </div>
        </div>
          
          

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
  