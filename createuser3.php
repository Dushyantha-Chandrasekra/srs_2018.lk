
<?php require_once('includes/redirect.php') ?>
 <!--header part 1-->
 <?php require_once('includes/header1.php') ?>
 <!--header part 2-->
 <?php require_once('includes/header2.php') ?>

 	<div class="container" style="padding-top: 50px; padding-bottom: 20px">
 		<div class="container fluid padding">
 			<div class="row padding" style="padding-top: 60px;">
 				<div class="col-sm-2"> </div>

 				<div class="col-sm-8" style="border: ridge; background-color: #F8F8FF;padding-top: 10px;">
 					<div class="text-center"><h3>EMAIL VARIFICATION</h3></div>
 					<hr style="background-color: #B22222">
 					<div class="row padding">
 						<div class="col-sm-3"></div>
 						<div class="col-sm-6" style="padding: 10px">
 						<!-- Registration Form here-->

 							<form>
                                <p><span style="color: red">*</span>We have sended a varification code to your email adrress. Varify your account.</P>
 								<hr style="background-color: black">
                				<div class="form-group">
                    				<input type="text" class="form-control" id="mail_line2" autofocus="" required="" placeholder="Confirmation Code here" style="border-color: black">
                				</div>

                				<div style="float: right;"> <button class="btn btn-success" type="submit" name="confirm" >Confirm</button>
                				</div>

  							</form>

 						</div>

 							<div class="col-sm-3">
                                <a href="#">Resend Code</a>                    
                            </div>

 					</div>
 				</div>

 					<div class="col-sm-2"> </div>

 			</div>
 		</div>
 	</div>


<!--footer part-->
 <?php require_once('includes/footer.php') ?>