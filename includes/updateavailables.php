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
            <!-- Basic Table -->
            <table class="table table-responsive table-hover table-bordered table-condensed table-striped wow fadeInDown" width="50%">
                <thead>
                    <tr style="background-color:#000; color:#FFF;">
                        <td style="text-align:center; width:auto;" class="wow fadeInDown">IMAGE</td>
                        <td style="text-align:center; width:auto;" class="wow fadeInDown">ACTION</td>
                    </tr>
                </thead>
                <tbody id="tablebody">
                    <?php
                    include('includes/dbconn.php');
                    $sql = "SELECT * FROM tblDogInfo ORDER BY id DESC";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $breed = $row['breed'];
                            $gender = $row['gender'];
                            $physical_characteristics = $row['physical_characteristics'];
                            $medical_records = $row['medical_records'];
                            $location_of_captivity = $row['location_of_captivity'];
                            $date = $row['date'];
                            $time = $row['time'];
                            $remarks_description = $row['remarks_description'];
                            $image = $row['dog_pictures'];
                            ?>
                            <tr style="font-size:16px; cursor:pointer;">
                                <td class="wow fadeInDown">
                                    <center>
                                        <a href="#viewModal<?php echo $id; ?>" data-toggle="modal">
                                            <img src="<?php echo $image; ?>" width="100px;" class="img-responsive img-rounded" />
                                        </a>
                                    </center>
                                </td>
                                <td class="wow fadeInDown">
                                    <center>
                                        <a href="#viewModal<?php echo $id; ?>" data-toggle="modal" class="btn btn-default">View Details</a>
                                    </center>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div id="viewModal<?php echo $id; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><?php echo $breed; ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo $image; ?>" class="modal-img img-responsive">
                                            <p><strong>Breed:</strong> <?php echo $breed; ?></p>
                                            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
                                            <p><strong>Physical Characteristics:</strong> <?php echo $physical_characteristics; ?></p>
                                            <p><strong>Medical Records:</strong> <?php echo $medical_records; ?></p>
                                            <p><strong>Location of Capture:</strong> <?php echo $location_of_captivity; ?></p>
                                            <p><strong>Date:</strong> <?php echo $date; ?></p>
                                            <p><strong>Time:</strong> <?php echo $time; ?></p>
                                            <p><strong>Remarks/Description:</strong> <?php echo $remarks_description; ?></p>
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
                </tbody>
            </table>
            <!-- End Basic Table -->
        </div>
    </div>
</div>

<!-- Include Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
