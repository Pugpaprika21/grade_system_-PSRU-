<?php
//
require_once("../../controller/professor/function_professor.php");
//
if (isset($_POST['submit'])) {
    //
    $professor_id = $_POST['professor_id'];
    $professor_fname = $_POST['professor_fname'];
    $professor_lname = $_POST['professor_lname'];
    $professor_gender = $_POST['professor_gender'];
    $professor_date = $_POST['professor_date'];
    $professor_position = $_POST['professor_position'];
    $professor_phone = $_POST['professor_phone'];
    $professor_email = $_POST['professor_email'];
    $professor_img = $_FILES['file']['name'];
    //
    $insert_professor = insert_professor(
        $professor_id,
        $professor_fname,
        $professor_lname,
        $professor_gender,
        $professor_date,
        $professor_position,
        $professor_phone,
        $professor_email,
        $professor_img
    );
    //
    $target = "../../view/image/professor/" . basename($professor_img);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        //
        header("location: ../../view/professor/login_professor.php?Login=success");
    }
}
