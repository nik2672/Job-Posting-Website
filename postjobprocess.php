<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post Job Process</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container"> <!-- container class made for css and responsive design-->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { // form data is sent using 'POST'
        // all form data is retrieved from 'postjobform' and varibales are assigned for use later
        $position_id = $_POST['position_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $closing_date = $_POST['closing_date'];
        $position = $_POST['position'];
        $contract = $_POST['contract'];
        $location = $_POST['location'];
        $accept_by = isset($_POST['accept_by']) ? implode(', ', $_POST['accept_by']) : ''; //converts array of data and seperates by comma using 'implode' if not set assigns empty string to $accept_by

        // to validate data
        $errors = []; //initlises an empty array to variable $errors to store any error messages that may arise
        if (!preg_match('/^ID[0-9]{3}$/', $position_id)) { //preg_match checks if $position_id matches teh pattern ensuring it starts with capital 'ID'
            $errors[] = "Position ID must start with 'ID' followed by three digits.";
        }
        if (empty($title) || strlen($title) > 10) { //checks $title ensuring it does not excede 10 characters by checking the length using 'strlen' PHP function
            $errors[] = "Title is required and must not exceed 10 characters.";
        }
        if (empty($description) || strlen($description) > 250) { //uses 'strlen' function to ensure $description does not exceded 250, error messsage is assgined to empty array if it exceeds
            $errors[] = "Description is required and must not exceed 250 characters.";
        }
        if (!preg_match('/^\d{2}\/\d{2}\/\d{2}$/', $closing_date)) { //'preg_match' funciton is used to check if the closing date is defined by teh right date format
            $errors[] = "Closing date must be in the format dd/mm/yy.";
        }

        // Check for any errors in teh $errors array
        if (count($errors) > 0) {
            foreach ($errors as $error) { //using a foreach loop to iterate over 
                echo "<p>$error</p>";
            }
            echo '<a href="postjobform.php" class="btn btn-secondary">Return to Post Job Vacancy</a>';
        } else {
            // Use the correct path to create the jobs directory
            $directory = '../../data/jobs'; // set the path to the directory were position.txt located
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true); // 'mkdir' makes the directory if not existing with permission specified accoridng to past tutorial lab document
            }

            // will open open the file in append mode 'a' and write the informaiton into positions.txt file
            $file_path = "$directory/positions.txt";
            $file = fopen($file_path, 'a');
            if ($file) {
                fwrite($file, "$position_id\t$title\t$description\t$closing_date\t$position\t$contract\t$location\t$accept_by\n");
                fclose($file);
                echo "<p>Job vacancy posted successfully!</p>";
                echo '<a href="index.php" class="btn btn-secondary">Return to Home</a>';
            }
        }
    }
    ?>
    </div>
</body>
</html>
