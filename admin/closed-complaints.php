<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<?php require 'header.php'; ?>

<?php require 'sidebar.php' ?>

<!-- start header  -->
<?php require 'top-header.php'; ?>
<!--end header  -->
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="card">
                <div class="card-header bg-primary">
                    <h6 class="text-white">Closed Complaints List</h6>
                </div>
                <div class="card-body">
                    <div class="row my-2">
                        <div class="col">
                            <a href="closed-complaint-export.php?status=Closed" class="btn btn-primary">Export Excel</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>GS Token</th>
                                    <th>Date</th>
                                    <th>Student Grievance</th>
                                    <th>Student Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <!-- <th>Address</th>
                                    <th>Student Grievance Details</th> -->
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $limit = 20;
                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                } else {
                                    $page = 1;
                                }
                                $offset = ($page - 1) * $limit;

                                $sql = "SELECT * FROM complaints WHERE status = 'Closed' LIMIT {$offset},{$limit}";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $id = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        $date_string = $row['created_at'];
                                        $date = new DateTime($date_string);
                                ?>
                                        <tr>
                                            <td><?= $id ?> <span type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="showModal(<?= $row['id'] ?>)"><i class='bx bxs-show fs-6'></i></span> </td>
                                            <td><?= $row['gs_token'] ?></td>
                                            <td><?= date_format($date, 'd-m-Y') ?></td>
                                            <td><?= ucwords($row['student_grievance']) ?></td>
                                            <td><?= ucwords($row['student_name']) ?></td>
                                            <td><?= $row['mobile_no'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <!-- <td><?php // ucwords($row['correspondance_address']) . ", " . ucwords($row['city']) . ", " . ucwords($row['state']) . ", " . $row['pin'] . ", " . $row['country'] 
                                                        ?></td> -->
                                            <!-- <td><?php // $row['student_grievance_details'] 
                                                        ?></td> -->
                                            <td>
                                                <select name="status" id="status" class="status text-white" data-id="<?= $row['id'] ?>">
                                                    <option value="Under Process" class="bg-danger text-white" <?= $row['status'] == 'Under Process' ? 'selected' : '' ?>>Under Process</option>
                                                    <option value="Closed" class="bg-success text-white" <?= $row['status'] == 'Closed' ? 'selected' : '' ?>>Closed</option>
                                                </select>
                                            </td>
                                        </tr>
                                <?php

                                        $id++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    $sql1 = "SELECT * FROM complaints WHERE status = 'Closed'";
                    $result1 = $conn->query($sql1) or die("Query Failed " . $conn->error);
                    if ($result1->num_rows > 0) {
                        $total_records = $result1->num_rows;
                        $total_pages = ceil($total_records / $limit);

                    ?>
                        <nav>
                            <ul class="pagination">
                                <?php
                                if ($page > 1) {
                                    echo "<li class='page-item'><a class='page-link' href='complaints.php?page=" . ($page - 1) . "'>Previous</a></li>";
                                } else {
                                    echo "<li class='page-item disabled'><span class='page-link'>Previous</span></li>";
                                }

                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $page) {
                                        $active = "active";
                                    } else {
                                        $active = "";
                                    }
                                    echo "<li class='page-item " . $active . "'><a class='page-link' href='complaints.php?page=" . $i . "'>$i</a></li>";
                                }

                                if ($total_pages > $page) {
                                    echo "<li class='page-item'><a class='page-link' href='complaints.php?page=" . ($page + 1) . "'>Next</a></li>";
                                } else {
                                    echo "<li class='page-item disabled'><a class='page-link' href='#'>Next</a></li>";
                                }
                                ?>
                            </ul>
                        </nav>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Complaint</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>GS Token</th>
                        <td id="gsToken"></td>
                    </tr>
                    <tr>
                        <th>Student Grievance</th>
                        <td id="studentGrievance"></td>
                    </tr>
                    <tr>
                        <th>Student Name</th>
                        <td id="studentName"></td>
                    </tr>
                    <tr>
                        <th>Mobile</th>
                        <td id="mobile"></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td id="email"></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td id="address"></td>
                    </tr>
                    <tr>
                        <th>Student Grievance Details</th>
                        <td id="studentGrievanceDetails"></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td id="status2"></td>
                    </tr>
                    
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
<!--start overlay-->

<?php include('./footer.php') ?>

<script>
    function updateSelectBackground() {
        var selects = document.getElementsByClassName('status');
        for (var i = 0; i < selects.length; i++) {
            var select = selects[i];
            var selectedValue = select.value;

            select.classList.remove('bg-primary', 'bg-danger', 'bg-success');

            if (selectedValue === 'Under Process') {
                select.classList.add('bg-danger');
            } else if (selectedValue === 'Closed') {
                select.classList.add('bg-success');
            }

            select.addEventListener('change', function() {
                var status = this.value;
                var id = this.getAttribute('data-id');
                var objFormData = {
                    'status': status,
                    'id': id
                }

                fetch('update-status.php', {
                        method: 'POST',
                        body: JSON.stringify(objFormData),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        alert('Status updated successfully!');
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            });
        }
    }

    updateSelectBackground();

    var selects = document.getElementsByClassName('status');
    for (var i = 0; i < selects.length; i++) {
        selects[i].addEventListener('change', updateSelectBackground);
    }

    function showModal(id) {
        var dataId = {
            'id': id
        }
        fetch('show-modal.php', {
                method: 'POST',
                body: JSON.stringify(dataId),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then((response) => response.text())
            .then((data) => {
                var data = JSON.parse(data);
                $("#gsToken").text(data['gs_token']);
                $("#studentGrievance").text(data['student_grievance']);
                $("#studentName").text(data['student_name']);
                $("#mobile").text(data['mobile_no']);
                $("#email").text(data['email']);
                $("#address").text(data['correspondance_address'] + ", " + data['city'] + ", " + data['state'] + ", " + data['country'] + ", " + data['pin']);
                $("#studentGrievanceDetails").text(data['student_grievance_details']);
                $("#status2").text(data['status']);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }
</script>


</body>

</html>