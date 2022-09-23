<?php

require_once("../../controller/professor/function_professor.php");

if (isset($_POST)) {
    //
    $sub_id = $_POST['sub_id'];
    $sub_name = $_POST['sub_name'];
    $sub_time = $_POST['sub_time'];
    $sub_day = $_POST['sub_day'];
    $student_id = $_POST['student_id'];
    $midterm_score = $_POST['midterm_score'];
    $final_score = $_POST['final_score'];
    $keep_score = $_POST['keep_score'];
    //
    $sum_grade1 = ($midterm_score + $final_score + $keep_score) / 2;
    $sum_grade2 = ($midterm_score + $final_score + $keep_score);
    //
    $calGrade = calGrade($sum_grade1, $sum_grade2);
    echo $calGrade;

    if (empty($_SESSION['allGrade'])) {
        $_SESSION['allGrade'] = array(
            "sub_id" => $sub_id,
            "student_id" => $student_id,
            "sub_name" => $sub_name,
            "grade_all" => $calGrade,
        );
    }

    //grade_id, sub_id, student_id, grade_subject, grade_all



}
