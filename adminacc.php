<!----- FOR ADMIN PAGE ----->

<?php
session_start(); // Start session at the very beginning
include('includes/dbconn.php');

// Check if the session variable is set
if (!isset($_SESSION['proprietor_id'])) {
    // Handle the case where the session variable is not set
    echo "Session not started. Please log in.";
    exit;
}

$id = $_SESSION['proprietor_id'];
$sql = ("SELECT * FROM admininfo WHERE id='$id'");
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['contact'];
    $username = $row['username'];
    $password = $row['password'];
}
?>

<!DOCTYPE html>
<html>
<?php include('includes/header_main.php')?>
<br>

<style>
    .wow {
        visibility: visible;
        animation-name: fadeInDown;
        animation-duration: 1s;
        animation-fill-mode: both;
    }
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translate3d(0, -100%, 0);
        }
        to {
            opacity: 1;
            transform: none;
        }
    }
    .container-fluid {
        margin-top: 20px;
        max-width: 1200px; /* Control the max width of the container */
        padding: 0 20px;
    }
    .admin-info {
        border: solid #CFCFCF 2px;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
    }
    .admin-info h3 {
        text-align: center;
        font-weight: bold;
        width: 100%;
    }
    .admin-info hr {
        margin: 20px 0;
        width: 100%;
    }
    .admin-info dl {
        text-align: left;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        text-align: right;
    }
    .form-group .form-control {
        margin-left: 10px;
    }
    .form-group .btn {
        margin-top: 20px;
    }
    .profile-section {
        flex: 1;
        padding: 20px;
        text-align: center;
    }
    .profile-section img {
        max-width: 200px;
        height: auto;
        margin: 0 auto;
    }
    .info-section, .form-section {
        flex: 2;
        padding: 20px;
    }
    footer {
        background-color: #2C3E50; /* Dark background color */
        color: white; /* White text color */
        padding: 20px 0;
    }
    footer a {
        color: white;
    }
    footer a:hover {
        color: #18BC9C; /* Hover color */
    }
</style>

<div class="container-fluid wow fadeInDown">
    <div class="row justify-content-center">
        <div class="col-12 admin-info">
            <div class="profile-section">
                <div class="alert alert-success" id="infomsg" style="text-align: center"></div>
                <img src="images/maria.jpg" class="img-responsive wow fadeInDown" />
            </div>
            <div class="info-section">
                <h3 class="wow fadeInDown">Admin Account Information</h3>
                <hr>
                <dl class="dl-horizontal wow fadeInDown">
                    <dt>Admin Name</dt><dd><?php echo @$name ?></dd>
                    <dt>Phone#</dt><dd><?php echo @$phone ?></dd>
                    <dt>Email</dt><dd><?php echo @$email ?></dd>
                    <dt>Username</dt><dd><?php echo @$username ?></dd>
                    <dt>Password</dt><dd><?php echo '********'; ?></dd>
                </dl>
                <hr>
            </div>
            <div class="form-section">
                <form class="form-group" name="adminacc" id="adminacc" method="POST" action="adminacc_process.php" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="image" class="col-sm-4 control-label">Profile Avatar</label>
                        <div class="col-sm-8">
                            <input type="file" name="image" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 control-label">Admin Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="proprietor_name" placeholder="<?php echo $name ?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-4 control-label">Phone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo $phone ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $email ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-4 control-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="username" name="nuname" placeholder="Enter Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="npassword" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="npassword" name="npword" placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-offset-4 col-sm-8">
                            <em style="color:red;" class="wow fadeInDown">Note: Fill up the fields before hitting save changes button</em>
                            <center><input type="submit" class="btn btn-success wow fadeInDown" name="update" value="Save Changes"></center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $("#page").removeClass();
    $("#messages").removeClass();
    $("#admin").addClass("active");
    
    $("#infomsg").hide();
    
    $('#adminacc').submit(function(event) {
        event.preventDefault();
        $.post($("#adminacc").attr("action"),
            $("#adminacc :input").serializeArray(),
            function(info) { 
                $("#infomsg").show();
                $("#infomsg").empty();
                $("#infomsg").html(info);
            });    
        return false;    
    });
</script>

<br><br><br>
<!--*************************************************** FOOTERS **********************************************-->
  
<footer id="footer" class="midnight-blue wow fadeInDown">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 wow fadeInDown">
                &copy; 2024 <a target="_blank" href="#" title="#">City Dog Pound Stray Animal IMS</a>. All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right wow fadeInDown">
                    <li class=""><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                    <li class=""><a href="contacts.php"><i class="fa fa-phone"></i> Contacts</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/main.js"></script>
<script src="js/wow.min.js"></script>
</body>
</html>
