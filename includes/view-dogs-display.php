<?php
include('includes/dbconn.php');

// Number of records per page
$records_per_page = 10;

// Get the current page number from the URL, default to page 1 if not set
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($current_page - 1) * $records_per_page;

// Get the total number of records
$total_records_query = "SELECT COUNT(*) AS total FROM tblDogInfo";
$total_records_result = mysqli_query($con, $total_records_query);
$total_records_row = mysqli_fetch_assoc($total_records_result);
$total_records = $total_records_row['total'];

// Calculate the total number of pages
$total_pages = ceil($total_records / $records_per_page);

// Fetch the records for the current page
$sql = "SELECT * FROM tblDogInfo ORDER BY id ASC LIMIT $offset, $records_per_page";
$result = mysqli_query($con, $sql);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

            <div class="col-md-12" style="background-color:#fff; border: solid #D9D9D9 1px; padding: 10px; padding-top: 5px; box-shadow: #9F9F9F 2px 3px 5px; margin-top: 10px; height:100px;">
            


       
        </div>
    </div>
</div> 

<div class="col-md-12" style="background-color:#fff; border: solid #D9D9D9 1px; padding: 10px; padding-top: 5px; box-shadow: #9F9F9F 2px 3px 5px; margin-top: 10px; height:auto;">
    <div class="panel panel-primary">
        <div class="panel-heading panel-title text-center wow fadeInDown">
            <span style="font-weight:bold; font-family:verdana;"><i class="glyphicon glyphicon-list-alt"></i> Dog Gallery</span>
        </div>
        <div class="panel-body" style="background-color:#fff;">
        
<!-- Gallery Grid -->
<div class="row">
                        <?php
                    include('includes/dbconn.php');
                    $sql = "SELECT * FROM tblDogInfo ORDER BY id ASC";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $breed = $row['breed'];
                            $gender = $row['gender'];
                            $color_markings = $row['color_markings'];
                            $residence_last_3_months = $row['residence_last_3_months'];
                            $location_of_captivity = $row['location_of_captivity'];
                            $date = $row['date'];
                            $time = $row['time'];
                            $remarks_description = $row['remarks_description'];
                            $image = $row['dog_pictures'];
                            $has_owner = $row['has_owner'];
                            $last_vaccination_date = $row['last_vaccination_date'];
                            $owner_id = $row['owner_id'];
                            $name = $row['name'];
                            
            // Generate unique modal ID
            $modalId = 'viewModal' . $id;
            ?>
            <div class="col-md-3">
                <div class="thumbnail">
                    <a href="#<?php echo $modalId; ?>" data-toggle="modal">
                        <img src="<?php echo $image; ?>" class="img-responsive img-rounded" alt="Dog Image">
                    </a>
                </div>
            </div>

            <!-- Modal -->
            <div id="<?php echo $modalId; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title"><?php echo $name; ?></h4>
                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo $image; ?>" class="modal-img img-responsive">
                                            <p><strong>Name:</strong> <?php echo $name; ?></p>
                                            <p><strong>Breed:</strong> <?php echo $breed; ?></p>
                                            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
                                            <p><strong>Color/Marking:</strong> <?php echo $color_markings; ?></p>
                                            <p><strong>Location of Capture:</strong> <?php echo $location_of_captivity; ?></p>
                                            <p><strong>Date:</strong> <?php echo $date; ?></p>
                                            <p><strong>Time:</strong> <?php echo $time; ?></p>
                                            <p><strong>Remarks/Description:</strong> <?php echo $remarks_description; ?></p>
                                            <p><strong>Last Vaccination Date:</strong> <?php echo $last_vaccination_date; ?></p>
                                            <p><strong>Has Owner?:</strong> <?php echo $has_owner; ?></p>
                                            <p><strong>Owner ID:</strong> <?php echo $owner_id; ?></p>
                                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<p>No dog information found.</p>';
    }
    ?>
</div>


<!-- Pagination Buttons -->
<div class="text-center">
    <ul class="pagination">
        <?php if ($current_page > 1): ?>
            <li><a href="?page=<?php echo $current_page - 1; ?>">Previous</a></li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="<?php if ($i == $current_page) echo 'active'; ?>">
                <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($current_page < $total_pages): ?>
            <li><a href="?page=<?php echo $current_page + 1; ?>">Next</a></li>
        <?php endif; ?>
    </ul>
</div>


<!-- Include Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
