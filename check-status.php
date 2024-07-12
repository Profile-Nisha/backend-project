<?php include('./header.php') ?>
<?php
include('./admin/connection.php');
if (isset($_GET['submit'])) {
    $gs_token = $_GET['gs_token'];
    if (!empty($gs_token)) {
        $sql = "SELECT * FROM complaints WHERE gs_token = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $gs_token);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $student_grievance = $row['student_grievance'];
            $student_name = $row['student_name'];
            $mobile_no = $row['mobile_no'];
            $email = $row['email'];
            $country = $row['country'];
            $state = $row['state'];
            $city = $row['city'];
            $correspondance_address = $row['correspondance_address'];
            $pin = $row['pin'];
            $student_grievance_details = $row['student_grievance_details'];
            $gs_token = $row['gs_token'];
            $status = $row['status'];
            $date = $row['created_at'];
            ?>
            <div class="container">
                <div class="card my-4">
                    <div class="card-header p-2" style="background-color: #3e72af;">
                        <h5 class="card-title">Check Status of Complaint</h5>
                    </div>
                    <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>GS Token No</th>
                                <td><?= $gs_token ?></td>
                            </tr>
                            <tr>
                                <th>Student Grievance</th>
                                <td><?= $student_grievance ?></td>
                            </tr>
                            <tr>
                                <th>Student Name</th>
                                <td><?= $student_name ?></td>
                            </tr>
                            <tr>
                                <th>Mobile No.</th>
                                <td><?= $mobile_no ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $email ?></td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td><?= $country ?></td>
                            </tr>
                            <tr>
                                <th>State</th>  
                                <td><?= $state ?></td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td><?= $city ?></td>
                            </tr>
                            <tr>
                                <th>Correspondance Address</th>
                                <td><?= $correspondance_address ?></td>
                            </tr>
                            <tr>
                                <th>Pin</th>
                                <td><?= $pin ?></td>
                            </tr>
                            <tr>
                                <th>Student Grievance Details</th>
                                <td><?= $student_grievance_details ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?= $status ?></td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td><?= $date ?></td>
                            </tr>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "<script>alert('Invalid GS Token.')</script>";
        }
    }
}
?>
<div class="container">
    <div class="card my-4">
        <div class="card-header p-2" style="background-color: #3e72af;">
            <h5 class="card-title">Check Status of Complaint</h5>
        </div>
        <div class="card-body p-4">
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
                <div class="mb-3">
                    <label for="gs_token" class="form-label fs-6">Enter GS Token No<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="gs_token" id="gs_token" placeholder="Please Enter Your GS Token Number">
                </div>
                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-primary bg-primary text-white" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('./footer.php') ?>