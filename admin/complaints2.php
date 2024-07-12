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
                    <h6 class="text-white">Complaints List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>GS Token</th>
                                    <th>Date</th>
                                    <th>Student Grievance</th>
                                    <th>Student Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Student Grievance Details</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM complaints";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $id = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        $date_string = $row['created_at'];
                                        $date = new DateTime($date_string);
                                ?>
                                        <tr>
                                            <td><?= $id ?></td>
                                            <td><?= $row['gs_token'] ?></td>
                                            <td><?= date_format($date, 'd-m-Y') ?></td>
                                            <td><?= ucwords($row['student_grievance']) ?></td>
                                            <td><?= ucwords($row['student_name']) ?></td>
                                            <td><?= $row['mobile_no'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= ucwords($row['correspondance_address']) . ", " . ucwords($row['city']) . ", " . ucwords($row['state']) . ", " . $row['pin'] . ", " . $row['country'] ?></td>
                                            <td><?= $row['student_grievance_details'] ?></td>
                                            <td class="w-50">
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
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>
<!--end page wrapper -->
<!--start overlay-->

<?php include('./footer.php') ?>

<script>
    $(document).ready(function () {
			var table = $('#example2').DataTable({
				lengthChange: false,
				buttons: ['excel', 'print']
			});

			table.buttons().container()
				.appendTo('#example2_wrapper .col-md-6:eq(0)');
		});

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
</script>


</body>

</html>