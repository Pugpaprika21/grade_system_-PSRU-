<?php

require_once("../../controller/officer/function_officer.php");

if (isset($_POST['submit'])) {
    //
    $grade_id = $_POST['grade_id'];
    $sub_id = $_POST['sub_id'];
    $student_id = $_POST['student_id'];
    $grade_subject = $_POST['grade_subject'];
    $grade_all = $_POST['grade_all'];
    //
    if (save_grade($grade_id, $sub_id, $student_id, $grade_subject, $grade_all)) {
       unset($_SESSION['allGrade']);
       header("location: /grade_system_psru/#");
    }
}
