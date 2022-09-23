<?php

session_start();
//
require_once("../../model/DbConnection.php");
//
function insert_professor(
    $professor_id,
    $professor_fname,
    $professor_lname,
    $professor_gender,
    $professor_date,
    $professor_position,
    $professor_phone,
    $professor_email,
    $professor_img
) {

    $SQL = "INSERT INTO tbl_professor( 
        professor_id, professor_fname, professor_lname, professor_gender,
        professor_date, professor_position, professor_phone, professor_email,
        professor_img
    ) VALUES(
        '$professor_id', '$professor_fname', '$professor_lname', '$professor_gender',
        '$professor_date', '$professor_position', '$professor_phone', '$professor_email', 
        '$professor_img'
    )";

    if (mysqli_query(connectionString(),  $SQL)) {
        return true;
    }
}
//
function select_professor($professor_id, $professor_fname, $professor_lname)
{
    $professor_login = array();
    $SQL = "SELECT * FROM tbl_professor 
        WHERE professor_id = '$professor_id' 
        AND professor_fname = '$professor_fname' 
        AND professor_lname = '$professor_lname'";
    //
    $select_login = mysqli_query(connectionString(),  $SQL);
    //
    while ($row = mysqli_fetch_array($select_login)) {
        array_push($professor_login, $row);
    }
    return $professor_login;
}
//
function getSubject()
{
    //
    $getSubject = array();
    $SQL = "SELECT * FROM tbl_subject";
    $select_subject = mysqli_query(connectionString(),  $SQL);
    //
    while ($row = mysqli_fetch_array($select_subject)) {
        array_push($getSubject, $row);
    }
    return $getSubject;
}
//
function get_grade($sub_id)
{
    //
    $get_grade = array();
    $SQL = "SELECT * FROM tbl_subject WHERE sub_id = '$sub_id'";
    $select_subject = mysqli_query(connectionString(), $SQL);
    //
    while ($row = mysqli_fetch_array($select_subject)) {
        array_push($get_grade, $row);
    }
    return $get_grade;
}
//
function getStudent_name()
{
    //
    $get_student = array();
    $SQL = "SELECT * FROM tbl_student";
    $select_students = mysqli_query(connectionString(), $SQL);
    //
    while ($row = mysqli_fetch_array($select_students)) {
        array_push($get_student, $row);
    }
    return $get_student;
}
//
function calGrade($sum_grade1, $sum_grade2)
{
    if (($sum_grade1 > 100) || ($sum_grade1 < 0)) {
        return "";
    } else if (($sum_grade1 >= 79.5) && ($sum_grade1 <= 100)) {
        return "A";
    } else if (($sum_grade1 >= 74.5) && ($sum_grade1 <= 79.4)) {
        return "B+";
    } else if (($sum_grade1 >= 69.5) && ($sum_grade1 <= 74.4)) {
        return "B";
    } else if (($sum_grade1 >= 64.5) && ($sum_grade1 <= 69.4)) {
        return "C+";
    } else if (($sum_grade1 >= 59.5) && ($sum_grade1 <= 64.4)) {
        return "C";
    } else if (($sum_grade1 >= 54.5) && ($sum_grade1 <= 59.4)) {
        return "D+";
    } else if (($sum_grade1 >= 49.5) && ($sum_grade1 <= 54.4)) {
        return "D";
    } else {
        return "F";
    }
}
