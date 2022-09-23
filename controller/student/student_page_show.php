<?php

require_once("../../controller/student/function_student.php");
//
$student_id = $_POST['student_id'];
$student_fname = $_POST['student_fname'];
$student_lname = $_POST['student_lname'];
//
if (select_student($student_id, $student_fname, $student_lname)) {
    echo json_encode(select_student($student_id, $student_fname, $student_lname));
    exit;
} 
