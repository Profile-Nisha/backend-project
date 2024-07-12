<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$sql = "SELECT COUNT(id) FROM complaints";
$result = $conn->query($sql);
$row = $result->fetch_row();
$total_complaints = $row[0];

$sql = "SELECT COUNT(id) FROM complaints WHERE status = 'Closed'";
$result = $conn->query($sql);
$row = $result->fetch_row();
$total_closed_complaints = $row[0];

$sql = "SELECT COUNT(id) FROM complaints WHERE status = 'Under Process'";
$result = $conn->query($sql);
$row = $result->fetch_row();
$total_open_complaints = $row[0];

?>

<?php require 'header.php'; ?>

<?php require 'sidebar.php' ?>

<!-- start header  -->
<?php require 'top-header.php'; ?>
<!--end header  -->
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <a href="complaints.php">
                <div class="card radius-10 border-start border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Complaints</p>
                                <h4 class="my-1 text-info"><?= $total_complaints ?></h4>
                                <p class="mb-0 font-13"></p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto">
                            <i class='bx bxs-data'></i>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col">
                <a href="pending-complaints.php">
                <div class="card radius-10 border-start border-0 border-4 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Pending</p>
                                <h4 class="my-1 text-danger"><?= $total_open_complaints ?></h4>
                                <p class="mb-0 font-13"></p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto">
                            <i class='bx bxs-food-menu'></i>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col">
                <a href="closed-complaints.php">
                <div class="card radius-10 border-start border-0 border-4 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Resolve</p>
                                <h4 class="my-1 text-success"><?= $total_closed_complaints ?></h4>
                                <p class="mb-0 font-13"></p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                <i class="bx bxs-bar-chart-alt-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            
        </div>
        <!--end row-->
    </div>
</div>
<!--end page wrapper -->
<!--start overlay-->


<?php include('./footer.php') ?>

</body>
</html>