<?php require_once('includes/redirect.php') ?>
<?php require_once("includes/header1.php") ?>
<?php //require_once("includes/header2.php") ?>
<?php require_once("includes/connection.php") ?>


<?php 
    
    $query = "SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}'";

    $result = mysqli_query($connection,$query);

    $user = mysqli_fetch_assoc($result);

 ?>

 <?php 

    if($user['confirm_mail']=="Verified"){
      $status = "Account Verified";
    }else{
      $status = "Account not Verified";
    }

  ?>
  
<!------------------------PAPER SUBMIT------------------------------->


 <?php 
 $errors=array();

      if(isset($_POST['submit']) && isset($_FILES['file1'])){
        $user_id = $_SESSION['user_id'];

        $query = "SELECT user_id FROM full_papers WHERE user_id='{$user_id}'";
        $result = mysqli_query($connection,$query);

        if($result->num_rows > 0){
          $errors = "You have already submit a paper!";
        }else{
          $target_dir = "downloads/";
        $fname = $_FILES['file1']['name'];
        $ftemp = $_FILES['file1']['tmp_name'];

        move_uploaded_file($ftemp, $target_dir.$user_id.$fname);
        $pdf_name = "".$user_id.$fname;




        //$user_id = $_SESSION['user_id'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $text = $_POST['textarea'];
        $acc = $_POST['accomodation'];
        $food = $_POST['food_type'];
        $bev = $_POST['bev_type'];
        
        $query = "INSERT INTO full_papers(category_name,title,subject_area,submit_date,year,accommodation,food_type,beverage_type,user_id,pdf_name) VALUES('$category','$title','$text',NOW(),NOW(),'$acc','$food','$bev',$user_id,'$pdf_name')";
        //$query = "INSERT INTO full_papers(category_name,title,subject_area,user_id) VALUES('$category','$title','$text,'$user_id')";

        $result = mysqli_query($connection,$query);
          
        }

       // print_r($_FILES);

        
       
      }else{
        
      }

  ?>

  <div class="container" style="padding-top: 25px; padding-bottom: 20px">
    <div class="container fluid padding">
     <div class="row padding" style="padding-top: 10px;">

        
        <div class="col-sm-12" style="border: solid;padding-top: 10px;padding: 40px">
          <div class="row">
            <div class="col-sm-2">
              
              <div style="width: 150px;height: 150px;background-color:#D3D3D3;padding-bottom: 30px;">
                  <img src="img/uploads/pro_img/<?php echo $user['image']; ?>" style="width: 150px;border-color: red;border: ridge;height: 170px;padding-bottom: 10px">

              </div>

            </div>
            <div class="col-sm-8">

              <div class="text-center">
                <h2>SLIATE RTESEARCH SYMPOSIUM</h2>
                <h1>PAPER SUBMITION</h1>
                <hr style="background-color: black">
                <br>

              </div>
            </div>

            <div class="col-sm-2">
              <div style="width: 150px;height: 150px;background-color:#D3D3D3;padding-bottom: 30px;">
                  <img src="img/qr.png" style="width: 150px; height: 150px;padding-bottom: 10px">
              </div>
              <hr>
            </div>

          </div>
          

          <div class="row" style="border: ridge;padding: 20px">
          <div class="col-sm-6" style="border-radius: 10px;">
            <h4> <?php echo $user['first_name'];?> &nbsp <?php echo $user['last_name']; ?></h4>
              <table class="table table-striped" style="font-size: 18px;font-family: sans-serif;font-style: inherit;">
                
                <tbody>
                  
                  <tr>
                    
                    <td> PROFILE ID</td>
                    <td><?php echo $_SESSION['user_id']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>USER TYPE</td>
                    <td><?php echo $user['user_type']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>SALUTATION</td>
                    <td><?php echo $user['salutation']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>NAME</td>
                    <td><?php echo $user['name_initial']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>EMAIL ADDRESS</td>
                    <td><?php echo $user['email']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>ORGANIZATION</td>
                    <td><?php echo $user['institute']; ?></td>
                    
                  </tr>
                  <tr>
                    
                    <td>PHONE NO</td>
                    <td><?php echo $user['phone_no']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>ADDRESS LINE 1</td>
                    <td><?php echo $user['add_line1']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>ADDRESS LINE 2</td>
                    <td><?php echo $user['add_line2']; ?></td>
                    
                  </tr>
                  <tr>
                    
                    <td>ADDRESS LINE 3</td>
                    <td><?php echo $user['add_line3']; ?></td>

                  </tr>
                  <tr>
                    
                    <td>PROFILE STATUS</td>
                    <td style="color: red"><?php echo $status; ?></td>

                  </tr>

                </tbody>
              </table>

          </div>
          
          <div class="col-sm-1"> </div>
          <div class="col-sm-5" style="border: solid;padding: 40px;padding-top: 20px;background-color: #044279;color: white;border-radius: 8px">
              <h3 class="text-center">REGISTRATION</h3>
              <h5 class="text-center">SLIATE Research symposium</h5>
              <hr style="background-color: black">
<!--FORM START-------------------------------------------------------------------------------------------------->

            <form method="post" action="submit_papers.php" enctype="multipart/form-data">

              <div class="form-group">
                 <label>Paper Title: </label>
                 <input class="form-control" type="text" name="title" maxlength="80" required="">
              </div>

              <div class="form-group">
                 Related Category: <select name="category" class="custom-select mb-3"style="border-color: black">
                  <?php 

                    $sql = mysqli_query($connection, "SELECT * FROM `category` ORDER BY `category`.`category_name` ASC");

                    while ($row = $sql->fetch_assoc()){

                    ?>
                    <option><?php echo $row['category_name']; ?></option>

                    <?php
                    // close while loop 
                    }
                    ?>
                 
                 </select>
              </div>

              <div class="form-group">
                <?php 
                if(isset($_POST['submit'])){
                if(isset($errors)){
                
                 echo '<strong style="color:red;">';
                 echo $errors;
                 echo '</strong>';
                    
                } 
              }
                ?>
                <input type="file" class="form-control-file border" accept=".docx,doc" name="file1" required>
              </div>

              <div class="form-group">
                 <label>Subject Area:</label>
                 <textarea name="textarea" class="form-control" raws="10" maxlength="150" minlength="50" required=""></textarea>
              </div>

              <div class="form-group">
                 Accomodation Facility: <select name="accomodation" class="custom-select mb-3"style="border-color: black" required>
                 
                 <option value="1">Need Accomodation</option>
                 <option value="0">No Need Accomodation</option>
                 </select>
              </div>

              <div class="form-group">
                 Food Type: <select name="food_type" class="custom-select mb-3"style="border-color: black" required>
                 <option value="vegitable">Vagitable Meals only</option>
                 <option value="egg">Egg meals only</option>
                 <option value="chiken">Chicken Meals only</option>
                 </select>

              </div>

              <div class="form-group">
                 Beverage Type: <select name="bev_type" class="custom-select mb-3"style="border-color: black" required>
                  <option value="Bottle Water" selected="select">Bottle Water only</option>
                  <option value="Fruit Guice">Fruit Guice only</option>
                  <option value="Fresh Milk">Fresh Milk only</option>
                 
                 </select>
              </div>

              <div class="form-group">

                <button class="btn btn-default" type="submit" name="submit" style="float: right; padding-left: 40px;padding-right: 40px;">Submit</button>

              </div>
            
            

            </form>
<!--FORM START-------------------------------------------------------------------------------------------------->

          </div>

        </div>
      </div>

    </div>
  </div>
 </div>



 <?php require_once("includes/footer.php") ?>




















 


 