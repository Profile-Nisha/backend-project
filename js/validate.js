function validate1() {
    var mob = /^\d{10}$/;
    var pincode = /^\d{6}$/;
    if ($("#enrolment").val() == "") {
        $("#enrolment_error").html("Please Enter Enrolment Number.");
        $("#enrolment").focus();
        return false;
    } else if ($("#fname").val() == "") {
        $("#fname_error").html("Please Enter First Name.");
        $("#fname").focus();
        return false;
    } else if ($("#lname").val() == "") {
        $("#lname_error").html("Please Enter Last Name.");
        $("#lname").focus();
        return false;
    } else if ($("#fathername").val() == "") {
        $("#father_error").html("Please Enter Father Name.");
        $("#fathername").focus();
        return false;
    } else if ($("#mothername").val() == "") {
        $("#mother_error").html("Please Enter Mother Name.");
        $("#mothername").focus();
        return false;
    } else if ($("#dob").val() == "") {
        $("#dob_error").html("Please Select Date of Birth.");
        $("#dob").focus();
        return false;
    } else if ($("#mobile").val() == "") {
        $("#mobile_error").html("Please Enter Mobile Number.");
        $("#mobile").focus();
        return false;
    } else if (!$("#mobile").val().match(mob)) {
        $("#mobile_error").html("Please Enter Valid Mobile Number.");
        $("#mobile").focus();
        return false;
    } else if ($("#email").val() == "") {
        $("#email_error").html("Please Enter Email Id.");
        $("#email").focus();
        return false;
    } else if ($("#address1").val() == "") {
        $("#address1_error").html("Please Enter Address for Correspondence.");
        $("#address1").focus();
        return false;
    } else if ($("#address2").val() == "") {
        $("#address2_error").html("Please Enter Home Address.");
        $("#address2").focus();
        return false;
    } else if ($("#city").val() == "") {
        $("#city_error").html("Please Enter City Name.");
        $("#city").focus();
        return false;
    } else if ($("#state").val() == "") {
        $("#state_error").html("Please Enter State Name.");
        $("#state").focus();
        return false;
    } else if ($("#pincode").val() == "") {
        $("#pincode_error").html("Please Enter Pincode.");
        $("#pincode").focus();
        return false;
    } else if (!$("#pincode").val().match(pincode)) {
        $("#pincode_error").html("Please Enter Valid Pincode.");
        $("#pincode").focus();
        return false;
    } else if ($("#phone").val() == "") {
        $("#phone_error").html("Please Enter Parent's Contact Number.");
        $("#phone").focus();
        return false;
    } else if (!$("#phone").val().match(mob)) {
        $("#phone_error").html("Please Enter Valid Contact Number.");
        $("#phone").focus();
        return false;
    } else if ($("#sod").val() == "") {
        $("#sod_error").html("Please Enter State of Domicile.");
        $("#sod").focus();
        return false;
    } else {
        return true;
    }
}

$(document).ready(function () {
    $("#delete_more_btn").click(function () {
        var sbtl_cnt = $('#sem_cnt').val();
        if ($("#add_more_rows").children().length >= 1) {
            $("#add_more_rows").children().last().remove();
            sbtl_cnt--;
            $("#sem_cnt").val(sbtl_cnt);
        }
        if (sbtl_cnt == '1') {
            $(".delete_more_btn").css('display', 'none');
        }
    });

    $("#add_more_btn").click(function () {
        var max_fields = 15;
        var sbtl_cnt = $('#sem_cnt').val();

        if (sbtl_cnt < max_fields) {
            sbtl_cnt++;
            $("#add_more_rows").append(`<fieldset>
                                        <legend>` + sbtl_cnt + `st Semester</legend>
                                        <div class="row">
                                            <div class="col-sm-4 form-group">
                                                <label for="class">Marks <span class="text-danger">*</span></label>
                                                <input type="number" name="sem_marks[]" class="form-control" id="` + sbtl_cnt + `_sem_marks" placeholder="Marks" required>
                                                <small>(in numbers only)</small><span class="text-danger" id="` + sbtl_cnt + `_marks_error"></span>
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label for="class">Grades <span class="text-danger">*</span></label>
                                                <input type="text" name="sem_grade[]" class="form-control" id="` + sbtl_cnt + `_sem_grade" placeholder="Grades" required>
                                                <span class="text-danger" id="` + sbtl_cnt + `_grade_error"></span>
                                            </div>
                                            <div class="col-sm-4 form-group">
                                                <label for="class">Total Maximum Marks <span class="text-danger">*</span></label>
                                                <input type="text" name="sem_max_marks[]" class="form-control" id="` + sbtl_cnt + `_sem_max_marks" placeholder="Total max. marks" required>
                                                <span class="text-danger" id="` + sbtl_cnt + `_total_marks_error"></span>
                                            </div>
                                        </div>
                                    </fieldset>`);

            $("#sem_cnt").val(sbtl_cnt);
            $(".delete_more_btn").css('display', 'block');
            if (sbtl_cnt == '16') {
                $("#add_more_btn").css('display', 'none');
            }
        }
    });

    $("#delete_more_position_btn").click(function () {
        var sbtl_cnt = $('#position_cnt').val();
        if ($("#add_more_position_rows").children().length >= 1) {
            $("#add_more_position_rows").children().last().remove();
            sbtl_cnt--;
            $("#position_cnt").val(sbtl_cnt);
        }
        if (sbtl_cnt == '1') {
            $(".delete_more_position_btn").css('display', 'none');
        }
    });

    $("#add_more_position_btn").click(function () {
        var max_fields = 3;
        var sbtl_cnt = $('#position_cnt').val();

        if (sbtl_cnt < max_fields) {
            sbtl_cnt++;
            $("#add_more_position_rows").append(`<div class="row"><div class="col-md-12"><hr></div>
                        <div class="col-sm-6 form-group">
                            <label for="Position">Position being offered <span class="text-danger">*</span></label>
                            <select id="position_offered_` + sbtl_cnt + `" name="position_offered[]" class="form-control browser-default custom-select" required>
                                <option value="">-----Select-----</option>
                                <option value="Position 1">Position 1</option>
                                <option value="Position 2">Position 2</option>
                                <option value="Position 3">Position 3</option>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="name-d">Designation <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="designation[]" id="designation_` + sbtl_cnt + `" placeholder="Enter your designation" required />
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="name-v">Number of vacancies <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="no_of_vacancies[]" id="no_of_vacancies_` + sbtl_cnt + `" placeholder="Enter number of vacancies" required />
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="name-j">Job Description <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="job_description[]" id="job_description_` + sbtl_cnt + `" placeholder="Enter your job description" required />
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="Location">Location of posting <span class="text-danger">*</span></label>
                            <input type="text" name="location_of_posting[]" id="location_of_posting_` + sbtl_cnt + `" class="form-control" placeholder="Enter Posting Location" required/>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="Probation">Probation Details (if any)</label>
                            <input type="text" name="probation[]" id="probation_` + sbtl_cnt + `" class="form-control" />
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="Salary">Gross annual Salary <span class="text-danger">*</span></label>
                            <input type="text" name="gross_annual_salary[]" id="gross_annual_salary_` + sbtl_cnt + `" class="form-control" placeholder="Enter Gross Anual Salary" required/>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="benefits">Other benefits (HRA, PF, Medical, Insurance etc. if applicable) <span class="text-danger">*</span></label>
                            <input type="text" name="other_benefits[]" id="other_benefits_` + sbtl_cnt + `" class="form-control" placeholder="Enter benefits" required  />
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="name-selection">Selection Process (e.g. -Written test, Group Discussion, Personal Interview etc.) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="selection_process[]" id="selection_process_` + sbtl_cnt + `" placeholder="Enter selection process" required />
                            <small>Please indicate the time each of these processes are likely to take:</small>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="name-members">Details of members of the recruitment team who would be visiting campus <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="members_name[]" id="members_name_` + sbtl_cnt + `" placeholder="Enter members details" required />   
                        </div></div>`);

            $("#position_cnt").val(sbtl_cnt);
            $(".delete_more_position_btn").css('display', 'block');
            if (sbtl_cnt == '3') {
                $("#add_more_position_btn").css('display', 'none');
            }
        }
    });
});

function validate2() {
    if ($("#class_x_per").val() == "") {
        $("#x_per_error").html("Please Enter Class X Percentage.");
        $("#class_x_per").focus();
        return false;
    } else if ($("#x_school_name").val() == "") {
        $("#x_school_error").html("Please Enter Class X School Name.");
        $("#x_school_name").focus();
        return false;
    } else if ($("#x_board_name").val() == "") {
        $("#x_board_error").html("Please Enter Class X Board Name.");
        $("#x_board_name").focus();
        return false;
    } else if ($("#x_passing_year").val() == "") {
        $("#x_passing_error").html("Please Enter Class X Passing year.");
        $("#x_passing_year").focus();
        return false;
    } else if ($("#class_xii_per").val() == "") {
        $("#xii_per_error").html("Please Enter Class XII Percentage.");
        $("#class_xii_per").focus();
        return false;
    } else if ($("#xii_school_name").val() == "") {
        $("#xii_school_error").html("Please Enter Class XII School Name.");
        $("#xii_school_name").focus();
        return false;
    } else if ($("#xii_board_name").val() == "") {
        $("#xii_board_error").html("Please Enter Class XII Board Name.");
        $("#xii_board_name").focus();
        return false;
    } else if ($("#xii_passing_year").val() == "") {
        $("#xii_passing_error").html("Please Enter Class XII Passing year.");
        $("#xii_passing_year").focus();
        return false;
    } else if ($("#gradu_percentage").val() == "") {
        $("#grad_per_error").html("Please Enter Graduation Percentage.");
        $("#gradu_percentage").focus();
        return false;
    } else if ($("#gradu_collage_name").val() == "") {
        $("#grad_collage_error").html("Please Enter Graduation Collage Name.");
        $("#gradu_collage_name").focus();
        return false;
    } else if ($("#gradu_university_name").val() == "") {
        $("#grad_uni_error").html("Please Enter Graduation University Name.");
        $("#gradu_university_name").focus();
        return false;
    } else if ($("#gradu_passing_year").val() == "") {
        $("#grad_passing_error").html("Please Enter Graduation Passing Year.");
        $("#gradu_passing_year").focus();
        return false;
    } else if ($("#pursuing_degree").val() == "") {
        $("#pursuing_error").html("Please Select Degree Pursuing in CUG.");
        $("#pursuing_degree").focus();
        return false;
    } else if ($("#stream").val() == "") {
        $("#stream_error").html("Please Select Stream.");
        $("#stream").focus();
        return false;
    } else if ($("#1_sem_marks").val() == "") {
        $("#1_marks_error").html("Please Enter 1st Semester Marks.");
        $("#1_sem_marks").focus();
        return false;
    } else if ($("#1_sem_grade").val() == "") {
        $("#1_grade_error").html("Please Enter 1st Semester Grade.");
        $("#1_sem_grade").focus();
        return false;
    } else if ($("#1_sem_max_marks").val() == "") {
        $("#1_total_marks_error").html("Please Enter 1st Sem. Total Max. Marks.");
        $("#1_sem_max_marks").focus();
        return false;
    } else {
        return true;
    }
}

function validate3() {
    var agree = $("input[type=checkbox][name=agree]:checked").val();

    if ($("#org_training").val() == "") {
        $("#org_training_error").html("Please Enter Organisation of Training.");
        $("#org_training").focus();
        return false;
    } else if ($("#training_location").val() == "") {
        $("#training_location_error").html("Please Location of Training.");
        $("#training_location").focus();
        return false;
    } else if ($("#training_profile").val() == "") {
        $("#training_profile_error").html("Please Enter Profile of Training.");
        $("#training_profile").focus();
        return false;
    } else if ($("#resume").val() == "") {
        $("#resume_error").html("Please Upload Resume.");
        $("#resume").focus();
        return false;
    } else if ($("#photo").val() == "") {
        $("#photo_error").html("Please Upload Photo.");
        $("#photo").focus();
        return false;
    } else if (agree == null) {
        $("#agree_error").html("Please accept agree checkbox.");
        $("#agree").focus();
        return false;
    } else {
        return true;
    }
}

$('#resume').change(function () {
    var file_name = $(this).val();
    var fileExtension = file_name.substr((file_name.lastIndexOf('.') + 1));
    var extension_array = ['doc', 'docx', 'DOC', 'DOCX', 'pdf', 'PDF'];
    if (extension_array.indexOf(fileExtension) == -1)
    {
        alert("Please upload only DOC/DOCX/PDF file for Resume.");
        document.getElementById("resume").value = null;
    }
    if (Math.round(document.getElementById('resume').files[0].size / 1024) > 1024)
    {
        alert("Resume should be less than 1MB.");
        document.getElementById("resume").value = null;
    }
});

$('#photo').change(function () {
    var file_name = $(this).val();
    var fileExtension = file_name.substr((file_name.lastIndexOf('.') + 1));
    var extension_array = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
    if (extension_array.indexOf(fileExtension) == -1)
    {
        alert("Please upload only JPG/JPEG/PNG/ file for Photo.");
        document.getElementById("photo").value = null;
    }
    if (Math.round(document.getElementById('photo').files[0].size / 1024) > 500)
    {
        alert("Photo should be less than 500 KB.");
        document.getElementById("photo").value = null;
    }
});

function RecruitersValidate() {
    var agree = $("input[type=checkbox][name=agree]:checked").val();

    if ($("#org_name").val() == "") {
        $("#org_name_error").html("Please Enter Organisation Name.");
        $("#org_name").focus();
        return false;
    } else if ($("#address").val() == "") {
        $("#address_error").html("Please Organization Address.");
        $("#address").focus();
        return false;
    } else if ($("#telephone").val() == "") {
        $("#telephone_error").html("Please Organization Contact Number.");
        $("#telephone").focus();
        return false;
    } else if ($("#website").val() == "") {
        $("#website_error").html("Please Organization Website.");
        $("#website").focus();
        return false;
    } else if ($("#org_type").val() == "") {
        $("#org_type_error").html("Please Select Organization Type.");
        $("#org_type").focus();
        return false;
    } else if ($("#recruitment_discipline").val() == "") {
        $("#discipline_error").html("Please Select Recruitment Discipline.");
        $("#recruitment_discipline").focus();
        return false;
    } else if ($("#position_offered_1").val() == "") {
        $("#position_error").html("Please Select Position being offered.");
        $("#position_offered_1").focus();
        return false;
    } else if ($("#designation_1").val() == "") {
        $("#designation_error").html("Please Enter Designation.");
        $("#designation_1").focus();
        return false;
    } else if ($("#no_of_vacancies_1").val() == "") {
        $("#vacancies_error").html("Please Enter Number of vacancies.");
        $("#no_of_vacancies_1").focus();
        return false;
    } else if ($("#job_description_1").val() == "") {
        $("#description_error").html("Please Enter Job Description.");
        $("#job_description_1").focus();
        return false;
    } else if ($("#location_of_posting_1").val() == "") {
        $("#location_error").html("Please Enter Location of posting.");
        $("#location_of_posting_1").focus();
        return false;
    } else if ($("#gross_annual_salary_1").val() == "") {
        $("#salary_error").html("Please Enter Gross annual Salary.");
        $("#gross_annual_salary_1").focus();
        return false;
    } else if ($("#other_benefits_1").val() == "") {
        $("#benefits_error").html("Please Enter Other benefits.");
        $("#other_benefits_1").focus();
        return false;
    } else if ($("#selection_process_1").val() == "") {
        $("#selection_error").html("Please Enter Selection Process .");
        $("#selection_process_1").focus();
        return false;
    } else if ($("#members_name_1").val() == "") {
        $("#member_error").html("Please Enter Details of members of the recruitment team.");
        $("#members_name_1").focus();
        return false;
    } else if (agree == null) {
        $("#agree_error").html("Please accept agree checkbox.");
        $("#agree").focus();
        return false;
    } else if ($("#name").val() == "") {
        $("#name_error").html("Please Enter Name.");
        $("#name").focus();
        return false;
    } else if ($("#desig").val() == "") {
        $("#desi_error").html("Please Designation.");
        $("#desig").focus();
        return false;
    } else if ($("#place").val() == "") {
        $("#place_error").html("Please Enter Place.");
        $("#place").focus();
        return false;
    } else if ($("#date").val() == "") {
        $("#date_error").html("Please Select Date.");
        $("#date").focus();
        return false;
    } else if ($("#sign").val() == "") {
        $("#sign_error").html("Please Upload Sign.");
        $("#sign").focus();
        return false;
    } else {
        return true;
    }
}

$('#sign').change(function () {
    var file_name = $(this).val();
    var fileExtension = file_name.substr((file_name.lastIndexOf('.') + 1));
    var extension_array = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
    if (extension_array.indexOf(fileExtension) == -1)
    {
        alert("Please upload only JPG/JPEG/PNG/ file for Photo.");
        document.getElementById("photo").value = null;
    }
    if (Math.round(document.getElementById('sign').files[0].size / 1024) > 500)
    {
        alert("Photo should be less than 500 KB.");
        document.getElementById("sign").value = null;
    }
});