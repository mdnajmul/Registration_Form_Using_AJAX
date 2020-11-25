<?php
   include("db_config.php");
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sign Up</title>

        <!-- Font Icon -->
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Main css -->
        <link rel="stylesheet" href="css/register.css">
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Login</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="login-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" placeholder="Your Email*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" placeholder="Your Password*" style="width:100%">
										</div>
									</div>
									
									<div class="contact-btn">
										<button type="submit" class="fv-btn">Login</button>
									</div>
								</form>
								<div class="form-output">
									<p class="form-messege"></p>
								</div>
							</div>
						</div> 
                
				</div>
				

					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Register</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="register-form" name="signup" method="post" onSubmit="return valid();">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%" required="required">	
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="email" id="email" onBlur="checkemailAvailability()" placeholder="Please give unique email" style="width:100%" required="required">
										</div>
										<span id="user-email-availability-status" style="font-size:12px;"></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" style="width:100%" required="required" pattern="[0]{1}[1]{1}[3-9]{1}[0-9]{8}">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="password" minlength="4" placeholder="Password*" style="width:100%" required="required">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="confirmpassword" minlength="4" placeholder="Confirm Password*" style="width:100%" required="required">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="form-group checkbox">
										  <input type="checkbox" id="terms_agree" required="required" checked="">
										  <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
										</div>
									</div>	
									
									<div class="contact-btn">
										<input type="submit" id="submit" name="signup" class="btn btn-success" value="REGISTER">
									</div>
								</form>
								<div class="form-output register_msg">
									<p class="form-messege field_error"></p>
								</div>
							</div>
						</div> 
                
				</div>
				
				<?php
					if(isset($_POST['signup'])){
						//now hold all field value from registration form
						$name = get_safe_value($con,$_POST['name']);
						$email = get_safe_value($con,$_POST['email']);
						$mobile = get_safe_value($con,$_POST['mobile']);
						$password = get_safe_value($con,$_POST['password']);
						$added_on=date('Y-m-d h:i:s');
						
						$sql = "insert into users(name,password,email,mobile,added_on) values('$name','$password','$email','$mobile','$added_on')";
						//
						mysqli_query($con,$sql);
						
						$lastInsertId = mysqli_insert_id($con);
						if($lastInsertId)
						{
							echo "<script>alert('Registration successfull. Now you can login');</script>";
						}
						else 
						{
							echo "<script>alert('Something went wrong. Please try again');</script>";
						}
					
					}
				?>
					
            </div>
        </section>
    </body>
</html>
