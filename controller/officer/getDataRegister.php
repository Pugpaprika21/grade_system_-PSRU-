<?php
//
require_once("../../controller/officer/function_officer.php");
//
if (isset($_POST['submit'])) {
    //
    $officer_id = $_POST['officer_id'];
    $officer_fname = $_POST['officer_fname'];
    $officer_lname = $_POST['officer_lname'];
    $officer_gender = $_POST['officer_gender'];
    $officer_date = $_POST['officer_date'];
    $officer_position = $_POST['officer_position'];
    $officer_phone = $_POST['officer_phone'];
    $officer_email = $_POST['officer_email'];
    $officer_img = $_FILES['file']['name'];
    $date_collect = date('Y-m-d H:i:s');
    //
    $insert_officer = insert_officer(
        $officer_id,
        $officer_fname,
        $officer_lname,
        $officer_gender,
        $officer_date,
        $officer_position,
        $officer_phone,
        $officer_email,
        $officer_img,
        $date_collect
    );
    //
    $target = "../../view/image/officer/" . basename($officer_img);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
        //
        header("location: /grade_system_psru/#");
    }
}
