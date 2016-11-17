<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


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
              
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">                        
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
                            <div class="input-group custom-search-form">
                                <!--<input type="text" class="form-control" placeholder="Search...">-->
                                <span class="input-group-btn">
<!--                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>-->
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="freelancers"><i class="fa fa-users fa-fw"></i>Company Profile</a>
                        </li>
                        <li>
                            <a href="clients"><i class="fa fa-building fa-fw"></i>My Profile</a>
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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-code fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $freelancer_count?></div>
                                    <div>Freelancers</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Freelancers</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $client_count?></div>
                                    <div>Clients</div>
                                </div>
                            </div>
                        </div>
                        <a href="">
                            <div class="panel-footer">
                                <span class="pull-left">View Clients</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                
            </div>
            <!-- /.row -->
                <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h6>Client Requests</h6><br/>
                                                        
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Freelancer</th>
                                            <th>Client</th>
                                            <th>Project</th>
                                            <th>Awaiting Response</th>
                                            
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        
                                        foreach ($client_requests as $fl){
                                            echo '<tr>';
                                            echo '<td>'.$fl['fl_name'].' '.$fl['fl_surname'].'</td>';
                                            echo '<td>'.$fl['client_company_name'].'</td>';
                                            echo '<td>'.$fl['project_title'].'</td>';
                                            echo '<td>Waiting For Freelancer Response</td>';
                                           
                                            echo '</tr>';
                                                                                        
                                        }
                                       
                                            
                                       

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h6>Freelancer Requests</h6><br/>
                                                        
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Freelancer</th>
                                            <th>Client</th>
                                            <th>Project</th>
                                            <th>Awaiting Response</th>
                                            
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        
                                        foreach ($client_requests as $fl){
                                            echo '<tr>';
                                            echo '<td>'.$fl['fl_name'].' '.$fl['fl_surname'].'</td>';
                                            echo '<td>'.$fl['client_company_name'].'</td>';
                                            echo '<td>'.$fl['project_title'].'</td>';
                                            echo '<td>Waiting For Client Response</td>';
                                           
                                            echo '</tr>';
                                                                                        
                                        }
                                       
                                            
                                       

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
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
      
    <!--Freelancer-->
    
    
    <div class="portfolio-modal modal fade" id="projectModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Create Project</h2>
                            <hr class="star-primary">
                            <img src="<?php echo base_url('assets/img/logo.png')?>" class="img-responsive img-centered" alt="">
                            
                            <form method="post" action="create_project">                                                             
                                
                                
                               
                                <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Project Title</label>
                                <input type="text" class="form-control" placeholder="title" id="title" name="title" required data-validation-required-message="Please enter your Name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                                
                                <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Start Date</label>
                                <input type="date" class="form-control" placeholder="Start Date" name="start_date" required data-validation-required-message="When does it start">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                                
                                <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Project Completion Date</label>
                                <input type="date" class="form-control" placeholder="End Date" name="end_date" required data-validation-required-message="When does it start">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                                 
                             
                             <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Project Brief</label>
                                <textarea style="width: 704px; height: 226px;" placeholder="What's the project about?" name="brief" id="txtarea1" cols="50" rows="4" class="form-control1"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                                
                                <div class="row control-group">
                            <!--<div class="form-group col-xs-12 floating-label-form-group controls">-->
                                <label>Skills Required</label>
                         <br/>
                                    <?php 
                
                                    foreach($skill_list as $row){  
                                        echo
                                            
                                            '<label class="checkbox-inline">
                                                <input type="checkbox" name="skills[]"
                                                value="'.$row['skill_id'].'"/>'.$row['skill_name'].
                                            '</label>';
                                            
                                        
                                        
                                                        
                                    }
                
                                    ?>
                                        
                                <p class="help-block text-danger"></p>
                            <!--</div>-->
                        </div>
                                
                                
                                <br/>
                                <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Submit</button>
                            </div>
                        </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Freelancer Modal End-->