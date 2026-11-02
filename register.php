<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Result</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .result-item {
            margin-bottom: 16px;
            font-size: 14px;
            color: #fff;
        }
        .result-item strong {
            color: #068fff;
        }
        .error-list {
            color: #ff6b6b;
            background: rgba(255, 0, 0, 0.1);
            border: 1px solid rgba(255, 0, 0, 0.3);
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 20px;
            list-style-type: none;
        }
        .error-list li {
            margin-bottom: 6px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $studentid   = trim($_POST['studentid'] ?? '');
            $studentname = trim($_POST['studentname'] ?? '');
            $email       = trim($_POST['stu-email'] ?? '');
            $gender      = $_POST['gender'] ?? '';
            $date        = $_POST['date'] ?? '';
            $department  = trim($_POST['Department'] ?? '');
            $phonenumber = trim($_POST['phonenumber'] ?? '');

            $errors = [];
            if (empty($studentid)) {
                $errors[] = "Student ID cannot be empty.";
            }
            if (empty($studentname)) {
                $errors[] = "Name cannot be empty.";
            }
            if (empty($email)) {
                $errors[] = "Email cannot be empty.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email must be valid.";
            }
            if (empty($gender)) {
                $errors[] = "Gender must be selected.";
            }
            if (empty($date)) {
                $errors[] = "Date of birth must be selected.";
            }
            if (empty($department)) {
                $errors[] = "Department cannot be empty.";
            }
            if (empty($phonenumber)) {
                $errors[] = "Phone number cannot be empty.";
            }

            if (!empty($errors)) {
                echo "<h1>Registration Failed</h1>";
                echo "<h4>Please fix the errors below</h4>";
                echo "<ul class='error-list'>";
                foreach ($errors as $error) {
                    echo "<li>• " . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "</li>";
                }
                echo "</ul>";
                echo '<div class="hero_btns"><a href="index.html" class="btn">Go Back</a></div>';
            } else {
                echo "<h1>Registration Successful!</h1>";
                echo "<h4>Here is your submitted information</h4>";
                
                echo "<div class='result-item'><strong>Student ID:</strong> " . htmlspecialchars($studentid, ENT_QUOTES, 'UTF-8') . "</div>";
                echo "<div class='result-item'><strong>Full Name:</strong> " . htmlspecialchars($studentname, ENT_QUOTES, 'UTF-8') . "</div>";
                echo "<div class='result-item'><strong>Email:</strong> " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</div>";
                echo "<div class='result-item'><strong>Gender:</strong> " . htmlspecialchars($gender, ENT_QUOTES, 'UTF-8') . "</div>";
                echo "<div class='result-item'><strong>Date of Birth:</strong> " . htmlspecialchars($date, ENT_QUOTES, 'UTF-8') . "</div>";
                echo "<div class='result-item'><strong>Department:</strong> " . htmlspecialchars($department, ENT_QUOTES, 'UTF-8') . "</div>";
                echo "<div class='result-item'><strong>Phone Number:</strong> " . htmlspecialchars($phonenumber, ENT_QUOTES, 'UTF-8') . "</div>";

                echo '<div class="hero_btns"><a href="index.html" class="btn">Register Another</a></div>';
            }
        } else {
            header("Location: index.html");
            exit();
        }
        ?>
    </div>
</div>

</body>
</html>