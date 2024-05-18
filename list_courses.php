<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List Courses</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png">
    <style>
        .course-container {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f8f8f8;
        }
        .course-header h4 {
            margin-bottom: 10px;
            color: #333;
        }
        .course-details p {
            margin: 5px 0;
            color: #666;
        }
        .btn {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <!-- Your sidebar content here -->

        <!-- partial:partials/_navbar.html -->
        <!-- Your navbar content here -->

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row page-title-header">
                    <div class="col-12">
                        <h4>List of Courses</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                require_once '../controller/FormationC.php';
                                $formationController = new FormationC();
                                $formations = $formationController->listFormations();

                                if (!empty($formations)) {
                                    foreach ($formations as $formation) {
                                        echo "<div class='course-container'>";
                                        echo "<div class='course-header'><h4>" . htmlspecialchars($formation['nom_formation']) . "</h4></div>";
                                        echo "<div class='course-details'>";
                                        echo "<p>Description: " . htmlspecialchars($formation['description']) . "</p>";
                                        echo "<p>Price: $" . htmlspecialchars(number_format($formation['prix'], 2)) . "</p>";
                                        echo "<a href='edit_course.php?id=" . htmlspecialchars($formation['id']) . "' class='btn btn-success'>Edit</a> ";
                                        echo "<a href='delete_course.php?id=" . htmlspecialchars($formation['id']) . "' onclick='return confirm(\"Are you sure you want to delete this course?\");' class='btn btn-danger'>Delete</a>";
                                        echo "</div></div>";
                                    }
                                } else {
                                    echo "<p>No courses available.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->

            <!-- partial:partials/_footer.html -->
            <!-- Your footer content here -->

        </div>
        <!-- main-panel ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/file-upload.js"></script>
    <script src="../assets/js/select2.js"></script>
    <!-- End custom js for this page -->
</body>
</html>
