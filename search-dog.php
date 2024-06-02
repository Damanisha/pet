


<?php


session_start();


// Check if the session variable is set
if (!isset($_SESSION['proprietor_id'])) {
    // Handle the case where the session variable is not set
    echo "Session not started. Please log in.";
    exit;
}

include('includes/dbconn.php');

$searchResults = [];
$records_per_page = 10; // Number of records per page

// Get the current page number from the URL, default to page 1 if not set
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $records_per_page;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchText = $_POST['searchText'];

    // Prepare the SQL query to search multiple columns
    $stmt = $con->prepare("
        SELECT * FROM tbldoginfo 
        WHERE 
            breed LIKE CONCAT('%', ?, '%') OR
            gender LIKE CONCAT('%', ?, '%') OR
            color_markings LIKE CONCAT('%', ?, '%') OR
            location_of_captivity LIKE CONCAT('%', ?, '%') OR
            date LIKE CONCAT('%', ?, '%') OR
            time LIKE CONCAT('%', ?, '%') OR
            remarks_description LIKE CONCAT('%', ?, '%') OR
            name LIKE CONCAT('%', ?, '%') OR
            last_vaccination_date LIKE CONCAT('%', ?, '%') OR
            residence_last_3_months LIKE CONCAT('%', ?, '%') OR
            has_owner LIKE CONCAT('%', ?, '%')
        LIMIT ?, ?
    ");
    $stmt->bind_param("sssssssssssii", $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $offset, $records_per_page);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }

    $stmt->close();
}

// Get the total number of records for pagination
$total_records_query = $con->prepare("
    SELECT COUNT(*) FROM tbldoginfo 
    WHERE 
        breed LIKE CONCAT('%', ?, '%') OR
        gender LIKE CONCAT('%', ?, '%') OR
        color_markings LIKE CONCAT('%', ?, '%') OR
        location_of_captivity LIKE CONCAT('%', ?, '%') OR
        date LIKE CONCAT('%', ?, '%') OR
        time LIKE CONCAT('%', ?, '%') OR
        remarks_description LIKE CONCAT('%', ?, '%') OR
        name LIKE CONCAT('%', ?, '%') OR
        last_vaccination_date LIKE CONCAT('%', ?, '%') OR
        residence_last_3_months LIKE CONCAT('%', ?, '%') OR
        has_owner LIKE CONCAT('%', ?, '%')
");
$total_records_query->bind_param("sssssssssss", $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText, $searchText);
$total_records_query->execute();
$total_records_query->bind_result($total_records);
$total_records_query->fetch();
$total_records_query->close();

$total_pages = ceil($total_records / $records_per_page);

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
    <?php include ('includes/header_main.php')?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/foods/cityvet_logo01.jpg" rel="shortcut icon">
    <title>Dog Search - Stray Animal IMS</title>
  
    <!-- core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">  
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <style>
        .content-wrapper {
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            
        }
        .search-form {
            margin-bottom: 30px;
            width: 100%;
        }
        .panel-body {
            padding: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .img-thumbnail {
            max-width: 80px;
            height: auto;
        }
        .search-results {
            margin-top: 20px;
            width: 100%;
        }
        .pagination {
            justify-content: center;
        }
    </style>
</head>
<body>

<body>
    <div class="container content-wrapper">
        <form id="formFilter" name="formFilter" action="search-dog.php" method="POST" class="pull-left col-md-3 hidden-print">
            <div class="form-horizontal wow fadeInDown">            
                <label for="filter" class="control-label"> <i class="glyphicon glyphicon-filter"></i> Dog Information Results </label>
                <div class="col-md-2"></div>
            </div>
        </form>

        <a href="search-dog.php" class="btn btn-default pull-right hidden-print wow fadeInDown" style="margin-right:10px;">
            <img src="images/ico/search-icon-2048x2048-cmujl7en.png" style="max-width: 20px; max-height: 20px;"> Search
        </a>
        <div class="col-md-12" style="border: solid #D9D9D9 1px; padding: 10px; padding-top: 5px; box-shadow: #9F9F9F 2px 3px 5px; margin-top: 10px;">
            <p class="wow fadeInDown"><em>Animal Search</em></p>
            <form method="POST" action="search-dog.php">
                <div class="form-group">
                    <label for="searchText">Enter search terms:</label>
                    <input type="text" class="form-control" id="searchText" name="searchText" placeholder="Type Description, Color, i.e. white, curly, collar" required>
                </div>
                <button type="submit" class="btn btn-primary">Search</button><br>
                <br>
            </form>
            <div class="mt-4">
                <table class="table table-hover table-condensed wow fadeInDown">
                    <thead style="background-color:#282828; color:#fff;">
                        <tr>
                            <th style="text-align:center;">ID</th>
                            <th style="text-align:center;">Name</th>
                            <th style="text-align:center;">Breed</th>
                            <th style="text-align:center;">Gender</th>
                            <th style="text-align:center;">Color Markings</th>
                            <th style="text-align:center;">Location of Captivity</th>
                            <th style="text-align:center;">Date</th>
                            <th style="text-align:center;">Time</th>
                            <th style="text-align:center;">Remarks/Description</th>
                            <th style="text-align:center;">Last Vaccination Date</th>
                            <th style="text-align:center;">Residence Last 3 Months</th>
                            <th style="text-align:center;">Has Owner</th>
                            <th style="text-align:center;">Images</th>
                        </tr>
                    </thead>
                    <tbody id="tablebody">
                        <?php if (count($searchResults) > 0): ?>
                            <?php foreach ($searchResults as $dog): ?>
                                <tr>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['id']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['name']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['breed']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['gender']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['color_markings']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['location_of_captivity']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['date']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['time']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['remarks_description']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['last_vaccination_date']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['residence_last_3_months']); ?></td>
                                    <td style="text-align:center;"><?php echo htmlspecialchars($dog['has_owner']); ?></td>
                                    <td style="text-align:center;">
                                        <img src="<?php echo htmlspecialchars($dog['dog_pictures']); ?>" class="img-thumbnail" alt="Dog Image" width="100px">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="13" style="text-align:center;">No results found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php if ($current_page > 1): ?>
                        <li>
                            <a href="search-dog.php?page=<?php echo $current_page - 1; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="<?php if ($i == $current_page) echo 'active'; ?>">
                            <a href="search-dog.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages): ?>
                        <li>
                            <a href="search-dog.php?page=<?php echo $current_page + 1; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php include('includes/footer.php')?>
