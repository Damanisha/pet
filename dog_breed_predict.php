<?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $image_path = $_POST['image_path'];
    
//     // Path to the Python script 
//     $python_script_path = 'htdocs/pet/dog-breed.py'; 
    
//     // Execute the Python script and capture the output
//     $command = escapeshellcmd("python $python_script_path $image_path");
//     $output = shell_exec($command);
    
//     // Assuming the Python script returns a JSON string
//     $result = json_decode($output, true);
    
//     if (json_last_error() === JSON_ERROR_NONE) {
//         echo json_encode($result);
//     } else {
//         echo json_encode(['error' => 'Failed to parse the response from the Python script.']);
//     }
// }
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image_path = 'htdocs/pet/images/3.jpg';
    $command = escapeshellcmd("python dog_breed_predict.py $image_path");
    $output = shell_exec($command);
    echo $output;
}
?>
