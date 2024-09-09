<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Job Process</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container"> <!-- container class used for css styling and repsonsive design-->
    <?php
    // checks for the search information submitted using the 'GET' method, isset php function checks if it is NULL. '?' works similar to if-else with ':' sepeatign the two outcomes
    $job_title = isset($_GET['job_title']) ? $_GET['job_title'] : '';
    $position = isset($_GET['position']) ? $_GET['position'] : '';
    $contract = isset($_GET['contract']) ? $_GET['contract'] : '';
    $location = isset($_GET['location']) ? $_GET['location'] : '';

    // specifies the directory of position.txt
    $directory = '../../data/jobs';
    $file_path = "$directory/positions.txt";

    if (file_exists($file_path)) { //checks if file exists on server and true if found
        $file = fopen($file_path, 'r'); //file is opened in reading mode 'r'
        $results = []; //empty array is initalised used ot sotre lines of the file that may match the critera

        //  while loop checks if search critera is met based on elemnt $job_title etc. 'empty' checks if the varibale is empty and if 'true' critera is ignored. 'stripos' checks if teh job title for exmaple is found in the $line if it is found the coniditon is 'true'
        while (($line = fgets($file)) !== false) {
            if ((empty($job_title) || stripos($line, $job_title) !== false) &&
                (empty($position) || stripos($line, $position) !== false) &&
                (empty($contract) || stripos($line, $contract) !== false) &&
                (empty($location) || stripos($line, $location) !== false)) {
                $results[] = $line;
            }
        }

        fclose($file); //file is closed from reading

        // gets todays date for compaison to the end date for the positon
        $today = new DateTime();

        // filters and sorts the results by the closing date, $filtered_results array contains the elemnts, if count is greater than 0 then there are mathcing reuslts. 'arrary_filter' takes two arguments first being $results and the functions that defines the filtering critera comparing it to $today
        $filtered_results = array_filter($results, function ($line) use ($today) {
            $date = DateTime::createFromFormat('d/m/y', explode("\t", $line)[3]);
            return $date >= $today; 
        });
// sorts the jo posting based on their closing dates, usort() built in fucntion will sort teh array values taking in $filtered results as argument. $a, $b will represetn two elemnts from $filterd_results to be compared  
        usort($filtered_results, function ($a, $b) {
            $date_a = DateTime::createFromFormat('d/m/y', explode("\t", $a)[3]); //split string $a into a rray with \t as deliter, the [3] accesses the fourt elemnt in the array which is the closing data of the job positng
            $date_b = DateTime::createFromFormat('d/m/y', explode("\t", $b)[3]);
            return ($date_a < $date_b) ? 1 : -1; // sort by closing date, most future first
        });

        // will display results or a message if no matches
        if (count($filtered_results) > 0) { //check if the array contians any elemnts. count() retruns number of elemnts in the array
            echo '<table class="table table-striped">'; //using bootstrap the table i screated and table-striped making it look aesthetic instead of printing the data without any seperation.
            echo '<thead><tr><th>Position ID</th><th>Title</th><th>Description</th><th>Closing Date</th><th>Position</th><th>Contract</th><th>Location</th><th>Accept By</th></tr></thead>';
            echo '<tbody>'; //row ('<tr>') and col (<th>) are created 
            foreach ($filtered_results as $result) { 
                $data = explode("\t", $result); //explode() function splits the string $result into an array assigned to $data array wheere each index corresponds to a seperate piece fo job infomraiton.
                echo '<tr>'; //'htmlspecialchars' will convert speical characters
                echo '<td>' . htmlspecialchars($data[0]) . '</td>';
                echo '<td>' . htmlspecialchars($data[1]) . '</td>';
                echo '<td>' . htmlspecialchars($data[2]) . '</td>';
                echo '<td>' . htmlspecialchars($data[3]) . '</td>';
                echo '<td>' . htmlspecialchars($data[4]) . '</td>';
                echo '<td>' . htmlspecialchars($data[5]) . '</td>';
                echo '<td>' . htmlspecialchars($data[6]) . '</td>';
                echo '<td>' . htmlspecialchars($data[7]) . '</td>';
                echo '</tr>';
            } //each index corresponds to what part of the job posting must be printed onto the table for instance $data [6] would be the 'location'
            echo '</tbody></table>';
        } else {
            echo "No job vacancies match the search criteria.<br>";
        }
    }
    ?>
    <a href="index.php" class="btn btn-secondary">Return to Home</a> <!--btn secondary for gray 'return home' button-->
    </div>
</body>
</html>

