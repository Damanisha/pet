<?php
// Start the session session_start(); 

// Retrieve the signup data from session if it exists
$signup_data = isset($_SESSION['signup_data']) ? $_SESSION['signup_data'] : array();
?>


<div class="modal fade bs-example-modal-sm" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content wow fadeInDown">
            <div class="modal-header">
                <h4 class="wow fadeInDown">City Dog Pound Stray Animal IMS - Sign Up</h4>
            </div>
            <br />
            <center><i class="fa fa-user"></i> Register</center>
            <form class="form-horizontal wow fadeInDown" method="POST" action="signup.php">
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label wow fadeInDown">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control wow fadeInDown" id="name" name="name" placeholder="Enter Name" required />
                    </div>
                </div> 
                <div class="form-group">
                    <label for="contact" class="col-sm-4 control-label wow fadeInDown">Contact</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control wow fadeInDown" id="contact" name="contact" placeholder="Enter Contact" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label wow fadeInDown">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control wow fadeInDown" id="email" name="email" placeholder="Enter Email" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-sm-4 control-label wow fadeInDown">Username</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control wow fadeInDown" id="username" name="username" placeholder="Enter Username" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label wow fadeInDown">Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control wow fadeInDown" id="password" name="password" placeholder="Enter Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password" class="col-sm-4 control-label wow fadeInDown">Confirm Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control wow fadeInDown" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="modal-footer wow fadeInDown" style="padding-right:110px;">
                    <button type="submit" class="btn btn-success wow fadeInDown">Sign Up</button>
                    <button type="reset" class="btn btn-default wow fadeInDown">Clear</button>
                    <button type="button" class="btn btn-danger wow fadeInDown" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

