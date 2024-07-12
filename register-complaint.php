<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    
    header('Location: ./sign-in.php');
    exit();
}

$formData = [
    'student_grievance' => '',
    'student_name' => '',
    'mobile_no' => '',
    'email' => '',
    'country' => '',
    'state' => '',
    'city' => '',
    'correspondance_address' => '',
    'pin' => '',
    'student_grievance_details' => ''
];

$errors = [];

if (isset($_SESSION['formData'])) {
    $formData = $_SESSION['formData'];
    $errors = $_SESSION['errors'];
    unset($_SESSION['formData']);
    unset($_SESSION['errors']);
}

?>

<?php include('./header.php') ?>

<div class="container-fluid">
    <div class="card my-3">
        <div class="card-header p-2" style="background-color: #3e72af;">
            <h5 class="card-title">Register Complaint</h5>
        </div>
        <div class="card-body p-3">
            <form action="./action.php" method="POST" class="row g-3">
                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label fs-6">Student Grievance <span class="text-danger">*</span> </label>
                    <select name="student_grievance" class="form-control" id="student_grievance" required>
                    <option value="">Select</option>
                    <option value="administrative" <?= $formData['student_grievance'] == 'administrative' ? 'selected' : '' ?>>Administrative</option>
                    <option value="academic" <?= $formData['student_grievance'] == 'academic' ? 'selected' : '' ?>>Academic</option>
                    <option value="examination" <?= $formData['student_grievance'] == 'examination' ? 'selected' : '' ?>>Examination</option>
                    <option value="website related" <?= $formData['student_grievance'] == 'website related' ? 'selected' : '' ?>>Website Related</option>
                    <option value="general" <?= $formData['student_grievance'] == 'general' ? 'selected' : '' ?>>General</option>
                </select>
                <div class="error"><?= $errors['student_grievance'] ?? '' ?></div>
                </div>
                <div class="col-md-4">
                    <label for="student_name" class="form-label fs-6">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="student_name" name="student_name" value="<?= $formData['student_name'] ?>" required>
                <div class="error"><?= $errors['student_name'] ?? '' ?></div>
                </div>
                <div class="col-md-4">
                    <label for="mobile_no" class="form-label fs-6">Mobile No. <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="<?= $formData['mobile_no'] ?>" required>
                <div class="error"><?= $errors['mobile_no'] ?? '' ?></div>
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label fs-6">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $formData['email'] ?>" required>
                <div class="error"><?= $errors['email'] ?? '' ?></div>
                </div>
                <div class="col-md-4">
                    <label class="form-label fs-6">Country <span class="text-danger">*</span> </label>
                    <select name="country" class="form-control" required>
                    <option value="">Select</option>
                    <option value="India" <?= $formData['country'] == 'India' ? 'selected' : '' ?>>India</option>
                    <option value="Other" <?= $formData['country'] == 'Other' ? 'selected' : '' ?>>Other</option>
                </select>
                <div class="error"><?= $errors['country'] ?? '' ?></div>
                </div>
                <div class="col-md-4">
                    <label class="form-label fs-6">State<span class="text-danger">*</span> </label>
                    <select name="state" class="form-control" required>
                    <option value="">Select</option>
                    <option value="andhra_pradesh" <?= $formData['state'] == 'andhra_pradesh' ? 'selected' : '' ?>>Andhra Pradesh</option>
                    <option value="arunachal_pradesh" <?= $formData['state'] == 'arunachal_pradesh' ? 'selected' : '' ?>>Arunachal Pradesh</option>
                    <option value="assam" <?= $formData['state'] == 'assam' ? 'selected' : '' ?>>Assam</option>
                    <option value="bihar" <?= $formData['state'] == 'bihar' ? 'selected' : '' ?>>Bihar</option>
                    <option value="chhattisgarh" <?= $formData['state'] == 'chhattisgarh' ? 'selected' : '' ?>>Chhattisgarh</option>
                    <option value="goa" <?= $formData['state'] == 'goa' ? 'selected' : '' ?>>Goa</option>
                    <option value="gujarat" <?= $formData['state'] == 'gujarat' ? 'selected' : '' ?>>Gujarat</option>
                    <option value="haryana" <?= $formData['state'] == 'haryana' ? 'selected' : '' ?>>Haryana</option>
                    <option value="himachal_pradesh" <?= $formData['state'] == 'himachal_pradesh' ? 'selected' : '' ?>>Himachal Pradesh</option>
                    <option value="jharkhand" <?= $formData['state'] == 'jharkhand' ? 'selected' : '' ?>>Jharkhand</option>
                    <option value="karnataka" <?= $formData['state'] == 'karnataka' ? 'selected' : '' ?>>Karnataka</option>
                    <option value="kerala" <?= $formData['state'] == 'kerala' ? 'selected' : '' ?>>Kerala</option>
                    <option value="madhya_pradesh" <?= $formData['state'] == 'madhya_pradesh' ? 'selected' : '' ?>>Madhya Pradesh</option>
                    <option value="maharashtra" <?= $formData['state'] == 'maharashtra' ? 'selected' : '' ?>>Maharashtra</option>
                    <option value="manipur" <?= $formData['state'] == 'manipur' ? 'selected' : '' ?>>Manipur</option>
                    <option value="meghalaya" <?= $formData['state'] == 'meghalaya' ? 'selected' : '' ?>>Meghalaya</option>
                    <option value="mizoram" <?= $formData['state'] == 'mizoram' ? 'selected' : '' ?>>Mizoram</option>
                    <option value="nagaland" <?= $formData['state'] == 'nagaland' ? 'selected' : '' ?>>Nagaland</option>
                    <option value="odisha" <?= $formData['state'] == 'odisha' ? 'selected' : '' ?>>Odisha</option>
                    <option value="punjab" <?= $formData['state'] == 'punjab' ? 'selected' : '' ?>>Punjab</option>
                    <option value="rajasthan" <?= $formData['state'] == 'rajasthan' ? 'selected' : '' ?>>Rajasthan</option>
                    <option value="sikkim" <?= $formData['state'] == 'sikkim' ? 'selected' : '' ?>>Sikkim</option>
                    <option value="tamil_nadu" <?= $formData['state'] == 'tamil_nadu' ? 'selected' : '' ?>>Tamil Nadu</option>
                    <option value="telangana" <?= $formData['state'] == 'telangana' ? 'selected' : '' ?>>Telangana</option>
                    <option value="tripura" <?= $formData['state'] == 'tripura' ? 'selected' : '' ?>>Tripura</option>
                    <option value="uttar_pradesh" <?= $formData['state'] == 'uttar_pradesh' ? 'selected' : '' ?>>Uttar Pradesh</option>
                    <option value="uttarakhand" <?= $formData['state'] == 'uttarakhand' ? 'selected' : '' ?>>Uttarakhand</option>
                    <option value="west_bengal" <?= $formData['state'] == 'west_bengal' ? 'selected' : '' ?>>West Bengal</option>
                    <option value="andaman_and_nicobar_islands" <?= $formData['state'] == 'andaman_and_nicobar_islands' ? 'selected' : '' ?>>Andaman and Nicobar Islands</option>
                    <option value="chandigarh" <?= $formData['state'] == 'chandigarh' ? 'selected' : '' ?>>Chandigarh</option>
                    <option value="dadra_and_nagar_haveli_and_daman_and_diu" <?= $formData['state'] == 'dadra_and_nagar_haveli_and_daman_and_diu' ? 'selected' : '' ?>>Dadra and Nagar Haveli and Daman and Diu</option>
                    <option value="lakshadweep" <?= $formData['state'] == 'lakshadweep' ? 'selected' : '' ?>>Lakshadweep</option>
                    <option value="delhi" <?= $formData['state'] == 'delhi' ? 'selected' : '' ?>>Delhi</option>
                    <option value="puducherry" <?= $formData['state'] == 'puducherry' ? 'selected' : '' ?>>Puducherry</option>
                    <option value="ladakh" <?= $formData['state'] == 'ladakh' ? 'selected' : '' ?>>Ladakh</option>
                    <option value="jammu_and_kashmir" <?= $formData['state'] == 'jammu_and_kashmir' ? 'selected' : '' ?>>Jammu and Kashmir</option>
                    <option value="other" <?= $formData['state'] == 'other' ? 'selected' : '' ?>>Other</option>
                </select>
                <div class="error"><?= $errors['state'] ?? '' ?></div>
                </div>
                <div class="col-md-4">
                    <label for="city" class="form-label fs-6">City <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="city" name="city" value="<?= $formData['city'] ?>" required>
                <div class="error"><?= $errors['city'] ?? '' ?></div>
                </div>
                <div class="col-md-4">
                    <label for="CorrespondanceAddress" class="form-label fs-6">Correspondance Address<span class="text-danger">*</span></label>
                    <textarea name="correspondance_address" class="form-control" id="correspondance_address" required><?= $formData['correspondance_address'] ?></textarea>
                <div class="error"><?= $errors['correspondance_address'] ?? '' ?></div>
                </div>
                <div class="col-md-4">
                    <label for="pin" class="form-label fs-6">PIN <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="pin" name="pin" value="<?= $formData['pin'] ?>" required>
                <div class="error"><?= $errors['pin'] ?? '' ?></div>
                </div>
                <div class="col-md-12">
                    <label for="studentGreivance" class="form-label fs-6">Student Grievance Details<span class="text-danger">*</span></label>
                    <textarea name="student_grievance_details" class="form-control" id="student_grievance_details" required><?= $formData['student_grievance_details'] ?></textarea>
                <div class="error"><?= $errors['student_grievance_details'] ?? '' ?></div>
                </div>
                <div class="d-grid gap-2 col-2 mx-auto">
                    <button class="btn btn-primary bg-primary text-white" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('./footer.php') ?>