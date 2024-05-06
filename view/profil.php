<?php
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION['user']) || $_SESSION['user'] === null) {
    // Redirect to the login page if user is not logged in or session user is null
    header('Location: login.php');
    exit();
}

// Get user data from session
$user = $_SESSION['user'];

// Check if form is submitted for updating user info
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and update user information
    // Example: You can use this section to update user information in the database
    // For demonstration purposes, let's assume we're updating the username
    if (isset($_POST['new_username'])) {
        $newUsername = $_POST['new_username'];
        // Update user's username in the database
        // Example: $userlistC->updateUsername($user['id'], $newUsername);
        // After updating, you may want to update the session variable as well
        $_SESSION['user']['username'] = $newUsername;
        // Redirect to the profile page to reflect the changes
        header('Location: profile.php');
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title mb-4 text-center">Welcome, <?php echo $user['fullname']; ?>!</h1>
                        <!-- Display user information -->
                        <p><strong>Full Name:</strong> <?php echo $user['fullname']; ?></p>
                        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                        <p><strong>Age:</strong> <?php echo $user['age']; ?></p>
                        
                        <!-- Form for updating user information -->
                        <h2 class="mt-4">Update Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
