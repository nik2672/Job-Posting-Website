<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advanced Search Job Vacancy</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container"> <!-- contain class made for css and resposnive design making the form more modern looking -->
        <h1><i class="fas fa-search" style="color: #007BFF"></i> Advanced Search Job Vacancy</h1> <!-- uses 'font awesome' to inport and use blue search icon next to title "fa-search" -->
        <form action="searchjobprocess.php" method="GET"> <!-- indicates the form data will be appended to the url, data is not sensitive however doesnt need to as it isnt a password etc-->
            <div class="row mb-3"> 
                <!-- Job title: search created with expected text input, row mb-3 and col-sm-10 has been used to ensure responsive design using grid system and margins-->
                <label for="job_title" class="col-sm-2 col-form-label">Job Title:</label>
                <div class="col-sm-10">
                    <input type="text" id="job_title" name="job_title" class="form-control">
                </div>
            </div>
<!-- Position: created with two radio buttons 'full time' and 'part time'-->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Position:</label>
                <div class="col-sm-10">
                    <div class="radio-group">
                        <input type="radio" name="position" value="Full Time"> Full Time
                        <input type="radio" name="position" value="Part Time"> Part Time
                    </div>
                </div>
            </div>
<!-- Contract: created with two radio buttons 'on goign' and 'fixed term'-->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Contract:</label>
                <div class="col-sm-10">
                    <div class="radio-group">
                        <input type="radio" name="contract" value="On-going"> On-going
                        <input type="radio" name="contract" value="Fixed term"> Fixed term
                    </div>
                </div>
            </div>
<!-- Location: created with two radio buttons 'on going' and 'fixed term'-->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Location:</label>
                <div class="col-sm-10">
                    <div class="radio-group">
                        <input type="radio" name="location" value="On site"> On site
                        <input type="radio" name="location" value="Remote"> Remote
                    </div>
                </div>
            </div>
            <input type="submit" value="Search" class="btn btn-primary"> <!--btn-primary for blue colour -->
        </form>
        <a href="index.php" class="btn btn-secondary">Return to Home</a> <!-- btn secondary for gray colour -->
    </div>
</body>
</html>

