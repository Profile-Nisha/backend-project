<?php include('./header.php') ?>
<?php
if(isset($_GET['gs_token'])) {
    $gs_token = $_GET['gs_token'];
}
?>
<div class="container">
    <div class="card my-4">
        <div class="card-body p-4">
            <h3 class="text-center">Thank You.</h3>
            <p class="text-center">Your Complaint has been registered. We will get back to you soon.</p>
            <p class="text-center">Your Complaint Number is : <strong><?= $gs_token ?? '' ?></strong></p>
            <p class="text-center my-3"><a href="index.php" class="btn btn-primary bg-primary text-white">Go Back</a></p>
        </div>
    </div>
</div>

<?php include('./footer.php') ?>