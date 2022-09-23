<?php
//
require_once("../../controller/student/function_student.php");
//
if (isset($_POST['submit'])) {
    //
    $student_id = $_POST['student_id'];
    $student_fname = $_POST['student_fname'];
    $student_lname = $_POST['student_lname'];
    $student_gender = $_POST['student_gender'];
    $student_date = $_POST['student_date'];
    $student_class = $_POST['student_class'];
    $student_phone = $_POST['student_phone'];
    $student_email = $_POST['student_email'];
    $student_img = $_FILES['file']['name'];
    //
    $insert_student = insert_student(
        $student_id,
        $student_fname,
        $student_lname,
        $student_gender,
        $student_date,
        $student_class,
        $student_phone,
        $student_email,
        $student_img
    );
    //
    $target = "../../view/image/student/" . basename($student_img);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        //
        header("location: ../../view/student/login_student.php?Login=success");
    }
}
