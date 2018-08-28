<?php require_once("includes/connection.php") ?>
<?php session_start(); ?>

<?php 
  if(isset($_POST['submit'])){
    $errors = array();

    $user = mysqli_real_escape_string($connection,$_POST['email']);
    $pass = mysqli_real_escape_string($connection,$_POST['password']);

      if(trim($pass)<1){
        $errors = array();
        $errors[] = "Username or password not valid!";

      }else{
        $pass = sha1($pass);
        $query = "SELECT * FROM admin WHERE username='{$user}' AND password='{$pass}'";
        $result = mysqli_query($connection,$query);
          if($result){
              if(mysqli_num_rows($result)==1){

                 $log_user = mysqli_fetch_assoc($result);

                 // $_SESSION = array();

                  $_SESSION['user_id']   = $log_user['admin_id'];
                  $_SESSION['user_name'] = $log_user['username'];
                  $_SESSION['usertype']  = $log_user['admin_type'];
                     
                  $usertype = $log_user['admin_type'];
                  $recod_id = $log_user['admin_id'];
                  $recod_name = $log_user['username'];
                  $query = "INSERT INTO log_records (user_id,name_initial,in_date,in_time,user_type) VALUES('$recod_id','$recod_name',NOW(),NOW(),'$usertype')";
                 $res = mysqli_query($connection,$query);

                 if($res){
                  

                    if($usertype=="Operator"){
                      header("location:oparater/mark_attendance.php");
                    }elseif($usertype=="Admin"){
                      header("location:admin/admin.php");
                    }


                 }else{
                  $errors[]="Log recods not updated!";
                 }

                  
                 

              }else{
                $errors = array();
                $errors[] = "Invalide username or password!";
              }
          }else{
          $errors = array();
          $errors[] = "Query Error!";
          }
      }

  }

 ?>


<?php require_once("includes/header1.php") ?>
<?php  require_once("includes/header2.php") ?>


<!--Write here-->
<div class="container-fluid padding;" style="padding-top: 60px; padding-bottom: 50px">

  <div class="row padding">
    <div class="col-sm-4"></div>
    <div class="col-sm-4" style="background-color: #044279;height: 100px;margin: 0;border-top-right-radius: 10px;border-top-left-radius: 10px">
      <!-------------------THIS IS FORM HEADINGAREA [COLOR]----------------->
      <h2 class="text-center" style="color: white;padding: 20px">ADMINISTRATOR</h2>
    </div>
    <div class="col-sm-4"></div>
  </div>
  
  <div class="row  padding">
    <div class="col-sm-4">
      
    
    </div>
    <div class="col-sm-4"  style="border-radius:0px; padding: 50px;padding-top: 60px; border: ridge;border-color: #044279;">

      <form action="ad_login.php" method="post">
        
<!-------------------------------------------------------------------------------------------->

            <?php if (isset($errors)): ?>
            <?php if(count($errors) > 0): ?>

              <div class="error" style="background-color: #FFCECF;border-radius: 3px;padding: 5px">

                  <?php foreach ($errors as $error):?>

                    <?php echo $error; ?>
                    <?php echo '<br>' ?>
                    <?php endforeach ?>

                  <?php endif ?>

              </div>

                  <?php echo '<br>'; ?>

            <?php endif ?>
  <!-------------------------------------------------------------------------------------------->
            <script>
              function setErrors() {
                val errors = <?php echo $errors ?>;
              }
            </script>
  <!-------------------------------------------------------------------------------------------->

        
          <div class="form-group">
            <input type="email" name="email" autofocus="" required class="form-control" placeholder="Enter email" name="email">
          </div>

          <div class="form-group">
            <input type="password" name="password" maxlength="18" minlength="8" required="" class="form-control" placeholder="Enter password" name="pswd">
          </div>

          <div class="form-group form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
          </div>

          <div><a href="#" style="padding-left: 20px; color: #FF6347">Forget password</a></div>
          <div><a href="createuser1.php" style="padding-left: 20px;">Create Account</a></div>

          <div class="float-right">
            <button type="submit" class="btn btn-primary" name="submit" style="padding-left: 20px;padding-right: 20px;">Log In</button>
          </div>

      </form>

    </div>

    <div class="col-sm-4"></div>

  </div>
  <div class="row padding">
    <div class="col-sm-4" ></div>
    <div class="col-sm-4" style="background-color: #044279;height: 50px;margin: 0;border-bottom-right-radius: 5px;border-bottom-left-radius: 5px">
      <!-------------------THIS IS FORM HEADINGAREA [COLOR]----------------->
    </div>
    <div class="col-sm-4"></div>
  </div>
  
        
</div>


<?php // require_once("includes/footer.php") ?>

<?php mysqli_close($connection); ?>