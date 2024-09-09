<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About This Assignment</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-info-circle" style="color: #007BFF;"></i> About This Assignment</h1>
        <ul>
            <?php
            echo "<li>PHP Version: " . phpversion() . "</li>";
            ?>
        </ul>
        <ul>
            <li>Tasks not attempted or completed: I have completed all lab tasks [labs 1-6] and have diligently marked them all off with my tutor. </li>
            <li>Special features attempted: [Responsive Design,</li>
        </ul>
        <ul>
            <li>What discussion points did you participated on in the unit’s discussion board.</li>
            <li>
                <img src="discussion.png" alt="Screenshot for Discussion Board" style="max-width: 80%; height: 15%;">
            </li>
        </ul>
        <a href="index.php" class="btn btn-secondary">Return to Home</a>
    </div>
</body>
</html>



