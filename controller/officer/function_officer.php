<?php

session_start();
//
require_once("../../model/DbConnection.php");
//
function insert_officer(
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
) {

    $insert_register = "INSERT INTO tbl_officer( 
        officer_id, officer_fname, officer_lname, officer_gender,
        officer_date, officer_position, officer_phone, officer_email,
        officer_img, date_collect
    ) VALUES(
        '$officer_id', '$officer_fname', '$officer_lname', '$officer_gender',
        '$officer_date', '$officer_position', '$officer_phone', '$officer_email', 
        '$officer_img', '$date_collect'
    )";

    if (mysqli_query(connectionString(), $insert_register)) {
        return true;
    }
}
//
function select_officer($officer_id, $officer_fname, $officer_lname)
{
    $officer_login = array();
    $select_officer = "SELECT * FROM tbl_officer 
        WHERE officer_id = '$officer_id' 
        AND officer_fname = '$officer_fname' 
        AND officer_lname = '$officer_lname'";
    //
    $select_login = mysqli_query(connectionString(), $select_officer);
    //
    while ($row = mysqli_fetch_array($select_login)) {
        array_push($officer_login, $row);
    }
    return $officer_login;
}

function save_grade($grade_id, $sub_id, $student_id, $grade_subject, $grade_all)
{
    $SQL = "INSERT INTO tbl_grades(grade_id, sub_id, student_id, grade_subject, grade_all) VALUES(
        '$grade_id', '$sub_id', '$student_id', '$grade_subject', '$grade_all'
    )";
    if (mysqli_query(connectionString(), $SQL)) {
        return true;
    }
}
