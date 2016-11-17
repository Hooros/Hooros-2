 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/profile_picture/default.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $name.' '.$surname?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
       <?php if($mail_type!=NULL){?>
          
              <form action="../search" method="post" class="sidebar-form">
            <?php }
            else{
            ?>
              
                  <form action="search" method="post" class="sidebar-form">
            <?php }?>
      <form action="search" method="post" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="searchField" class="form-control" placeholder="Search by Skill...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
            <?php if($mail_type!=NULL){?>
          <a href="../home">
            <?php }
            else{
            ?>
              <a href="home">
            <?php }?>
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
           
          </a>
          
        </li>
        <li>
          <?php if($mail_type!=NULL){?>
          <a href="inbox">
            <?php }
            else{
            ?>
              <a href="mail/inbox">
            <?php }?>
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">

              <small class="label pull-right bg-green"><?php echo $mail_count?></small>
            </span>
          </a>
        </li>
        <li>
         <?php if($mail_type!=NULL){?>
          <a href="../projects">
            <?php }
            else{
            ?>
              <a href="projects">
            <?php }?>
            <i class="fa fa-folder-open"></i> <span>My Projects</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><?php echo $project_count?></small>
            </span>
          </a>
              
              <ul class="treeview-menu">
            <li><a href="projects"><i class="fa fa-folder-open"></i> View Projects</a></li>
           <?php if($this->session->userdata('user_type')=='client'){?>
            <li><a href="#" data-toggle="modal" data-target="#newProject"><i class="fa fa-plus"></i> New Project</a></li>
          <?php }?>
      
          </ul>
        </li>
        <li>
            <?php if($mail_type!=NULL){?>
          <a href="../freelancers">
            <?php }
            else{
            ?>
              <a href="freelancers">
            <?php }?>
            <i class="fa fa-users"></i> <span>Freelancers </span>
           
          </a>
              <ul class="treeview-menu">
            <li><a href="home"><i class="fa fa-code"></i> View Freelancers</a></li>
            <li><a href="my_freelancers"><i class="fa fa-codepen"></i> My Freelancers</a></li>
            
          </ul>
              
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
    
  

  </aside>
 
   <!-- Modal -->
                            <div class="modal fade modal-primary" id="newProject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">New Project</h4>
                                        </div>  
                                        <form class="form-horizontal">
                                        <div class="modal-body">
                                            
              <fieldset>


<!-- Text input-->


<!-- Text input-->
      
<div class="form-group"> 
  <label class="col-md-4 control-label">Location</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
        <select name="state" class="form-control selectpicker" required="">
      <option value="">Please select your location</option>
      <option  value="ZA">South Africa</option>
      <option  value="AU">Australia</option>
       <option value="BW">Botswana</option>
       <option value="BR">Brazil</option>
       <option value="CA">Canada</option>
       <option value="FR">France</option>
       <option value="DE">Germany</option>
       <option value="IT">Italy</option>
       <option value="NZ">New Zealand</option>
       <option value="NG">Nigeria</option>
      <option value="UK"> United Kingdom</option>
       <option value="US">United States of America</option>
       <option value="ZM">Zambia</option>
       <option value="ZW">Zimbabwe</option>
       <option value="Other">Other</option>
    </select>
  </div>
</div>
</div>
<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-4 control-label">City</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
        <input name="city" placeholder="city" class="form-control" required="" type="text">
    </div>
  </div>
</div>

<!-- Select Basic -->
   


<!-- Skill Set-->
<div class="form-group"> 
  <label class="col-md-4 control-label">What skillset are you looking for
  ?</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-plus-sign"></i></span>
        <select name="state" class="form-control selectpicker" required="">
      <option value="" >Skillset</option>
      <option value="Front End Developer">Front End Developer</option>
      <option value="Back End Developer">Back End Developer</option>
      <option value="Full Stack Developer">Full Stack Developer</option>
      <option value="Database Assistant">Database Assistant</option>
      <option value="Graphic Designer">Graphic Designer</option>
      <option value="Content Copywriter">Content Copywriter</option>
      <option value="Technical Copywriter">Technical Copywriter</option>
      <option value="I'm not sure">I'm not sure</option>
    </select>
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Company Website</label>  
   <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
  <input name="website" placeholder="Website or domain name" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- radio checks -->
 <div class="form-group">
                        <label class="col-md-4 control-label">Would you like to talk to a Hooros representative?</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="representative" value="yes" /> Yes
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="representative" value="no" /> No
                                </label>
                            </div>
                        </div>
                    </div>

<!-- Text area -->
  
<div class="form-group">
  <label class="col-md-4 control-label">Tell us more about your project</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
        <textarea class="form-control" name="comment" placeholder="Project Description" rows="10" ></textarea>
  </div>
  </div>
</div>

<!-- Success -->
<!--<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for posting a project, we will verify your project and respond as soon as possible.</div>-->

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    
  </div>
</div>

</fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning" >Post <span class="	glyphicon glyphicon-thumbs-up"></span></button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->