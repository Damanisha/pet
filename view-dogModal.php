                            <!-- Modal -->
                            <div id="viewModal<?php echo $id; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                    
                    ?>