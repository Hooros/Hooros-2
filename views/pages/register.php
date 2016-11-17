<style>
.body
{
    /*background: url('http://farm3.staticflickr.com/2832/12303719364_c25cecdc28_b.jpg') fixed;*/
    background-color: lightblue;
    background-size: cover;
    padding: 0;
    margin: 0;
    opacity: 20%
}
</style>
<body class= body>
<div class="register-box">
  <div class="register-logo">
      <a href="home"><img src ="http://hooros.co.za/assets/boxify/img/hooros2.png" alt=""></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
    
    <?php 
if($email_exists==true){
    ?>
        
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Registration Failed</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              A user exists with the same email address
            </div>
            <!-- /.box-body -->
          </div>
      <?php
}
else{
    
}

?>

    <form action="submit_registration" method="post">
      <div class="form-group has-feedback">
          <input type="text" class="form-control" name="first_name" placeholder="Name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="surname" placeholder="Surname">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" name="skype" placeholder="Skype ID">
        <span class="glyphicon glyphicon-icon-skype form-control-feedback"></span>
      </div>
        
        <div class="form-group has-feedback">
        <!-- select -->
                
                  <label>Account Type</label>
                  <select class="form-control" name="type">
                      <option value="freelancer">Freelancer</option>
                      <option value="client">Client</option>                   
                  </select>
                
        <span class="glyphicon glyphicon-star form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password_check" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
                <input required="" type="checkbox"> I agree to the <a href="http://hooros.co.za/terms.php">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

<!--    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-linkedin btn-flat"><i class="fa fa-linkedin"></i> Sign up using
        LinkedIn</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>
-->

    <a href="login" class="text-center">I already have a membership</a>
  <br>
  <small><font color="grey">By signing into Hooros you accept to be legally bound by our terms of use and any subsequent agreements you may enter into with Hooros, or any third party duly authorized to act on behalf of Hooros.</font></small>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
<!-- Start of Async Drift Code -->
<script>
!function() {
  var t;
  if (t = window.driftt = window.drift = window.driftt || [], !t.init) return t.invoked ? void (window.console && console.error && console.error("Drift snippet included twice.")) : (t.invoked = !0, 
  t.methods = [ "identify", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
  t.factory = function(e) {
    return function() {
      var n;
      return n = Array.prototype.slice.call(arguments), n.unshift(e), t.push(n), t;
    };
  }, t.methods.forEach(function(e) {
    t[e] = t.factory(e);
  }), t.load = function(t) {
    var e, n, o, r;
    e = 3e5, r = Math.ceil(new Date() / e) * e, o = document.createElement("script"), 
    o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + r + "/" + t + ".js", 
    n = document.getElementsByTagName("script")[0], n.parentNode.insertBefore(o, n);
  });
}();
drift.SNIPPET_VERSION = '0.2.0'
drift.load('xbifeh5v5579')
</script>
<!-- End of Async Drift Code -->


<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
