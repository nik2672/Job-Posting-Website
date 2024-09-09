<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post Job Vacancy</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container"> <!--container class helps with css styling aesthetic and responsive design, the width of the container adjusts based on screen size-->
        <h1><i class="fas fa-plus" style="color: #007BFF;"></i> Post a Job Vacancy</h1> <!--using the 'font awesome' link were able to put a plus 'fa-plus' icon next to the title and in blue matching the scheme-->
        <form action="postjobprocess.php" method="POST">
            <div class="row mb-3"> <!--responsive grid system is used to align the collumn properly also adding a margin at the bottom "mb-3" -->
                <label for="position_id" class="col-sm-2 col-form-label">Position ID:</label>
                <div class="col-sm-10"><!--To improve responsive design a collumn has been defined using grid system aswell as 'sm' ensuring the collumn applies only when the device screen is >= 576px, '10' indicates it will take 10 out of 12 grid collumns-->
                    <input type="text" id="position_id" name="position_id" required pattern="^ID[0-9]{3}$" title="Must start with 'ID' followed by three digits." class="form-control">
                <!--Position ID: 'pattern' is defined ensuring id starts with uppercase 'ID', ensures no null inputs using 'required' 'form-control' for syling and responsive design.  -->
                </div>
            </div>
            <!--Title: ensures user inputs only max 10 alphanumerical characters-->
            <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Title:</label>
                <div class="col-sm-10">
                    <input type="text" id="title" name="title" maxlength="10" required class="form-control">
                </div>
            </div>
            <!--Description: esnures user only inputs max 250 characters, 'required' ensures no NULL inputs-->
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description:</label>
                <div class="col-sm-10">
                    <textarea id="description" name="description" maxlength="250" required class="form-control"></textarea>
                </div>
            </div>
            <!--Closing Date: PHP's date() function has been used to retrieve the current date and format it into a string -->
            <div class="row mb-3">
                <label for="closing_date" class="col-sm-2 col-form-label">Closing Date:</label>
                <div class="col-sm-10">
                    <input type="text" id="closing_date" name="closing_date" value="<?php echo date('d/m/y'); ?>" required class="form-control">
                </div>
            </div>
            <!--Position: two radio buttons are made with 'full time' and 'part time' options-->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Position:</label>
                <div class="col-sm-10">
                    <input type="radio" name="position" value="Full Time" required> Full Time
                    <input type="radio" name="position" value="Part Time" required> Part Time
                </div>
            </div>
            <!-- Contract selection: two radio buttons are there either "on going' or "fixed term" -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Contract:</label>
                <div class="col-sm-10">
                    <input type="radio" name="contract" value="On-going" required> On-going
                    <input type="radio" name="contract" value="Fixed term" required> Fixed term
                </div>
            </div>
            <!-- Location Selection: two radio buttons are present indicating 'Onsite" or "remote"-->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Location:</label>
                <div class="col-sm-10">
                    <input type="radio" name="location" value="On site" required> On site
                    <input type="radio" name="location" value="Remote" required> Remote
                </div>
            </div>
            <!-- Accept Applications through: Using type ="checkbox" two checkboxes are createed with options for "post" or "email" --> 
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Accept Applications by:</label>
                <div class="col-sm-10">
                    <input type="checkbox" name="accept_by[]" value="Post"> Post
                    <input type="checkbox" name="accept_by[]" value="Email"> Email
                </div>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary"> <!--btn-primary decorates design with rounded corners also make its blue with 'primary' matching the scheme of the webiste-->
        </form>
        <a href="index.php" class="btn btn-secondary">Return to Home</a> <!--btn secondary also decorates the design of the 'return to home' button making it a gray colour -->
    </div>
</body>
</html>