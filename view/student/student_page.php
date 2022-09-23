<?php
//
require_once("../../view/bootstrap/favicon.php");
require_once("../../controller/student/function_student.php");
//
$student_id = $_GET['student_id'];
$student_fname = $_GET['student_fname'];
$student_lname = $_GET['student_lname'];

$select_student = select_student($student_id, $student_fname, $student_lname);
$select_subject_id = select_subject_id($student_id);

if ($student_id == "") {
    header("location: ../../view/student/login_student.php");
}
//
?>

<!--  -->
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="../../view/image/psru_master.png" width="42" height="50" class="d-inline-block">
                หน้าหลัก (สำหรับนักศึกษา)
            </a>
        </div>
    </nav>
    <div class="card mt-2" style="border-color: #DFF2E4">
        <div class="card-body" style="background-color: #DFF2E4;">
            ระบบงานมหาวิทยาลัย กรณี ศึกษา ม. ราชภัฏพิบูลสงคราม
        </div>
    </div>
    <hr>
    <!--  -->
    <div class="row">
        <div class="col-6 col-md-2">
            <div class="card">
                <!--  -->
                <?php foreach ($select_student as $key => $tbl_student) : ?>
                    <img src="../../view/image/student/<?php echo $tbl_student["student_img"]; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">สถานะนักศึกษา</h5>
                        <h6 class="card-subtitle mb-2 text-muted">ข้อมูลนักศึกษา</h6>
                        <p class="card-text text-muted">ชื่อ : <?php echo $tbl_student["student_fname"]; ?></p>
                        <p class="card-text text-muted">นามสกุล : <?php echo $tbl_student["student_lname"]; ?></p>
                        <p class="card-text text-muted">รหัสนักศึกษา : <?php echo $tbl_student["student_id"]; ?></p>
                        <a class="btn btn-primary" href="../../view/student/login_student.php?log_out=log_out" role="button" style="width: 100%;">ออกระบบ</a>
                    </div>
                <?php endforeach; ?>
                <!--  -->
            </div>
        </div>
        <div class="col-sm-6 col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="harder-data text-muted" style="background-color: #C9E8AD;">
                        <h4>ข้อมูลของคุณ : <?php echo $select_student[0]['student_fname']; ?></h4>
                    </div>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">รหัสใบเกรด</th>
                                <th scope="col">รหัสวิชา</th>
                                <th scope="col">รหัสนักศึกษา</th>
                                <th scope="col">ชื่อวิชา</th>
                                <th scope="col">เกรด</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($select_subject_id as $key => $tbl_grades) : ?>
                                <tr>
                                    <td><?php echo $tbl_grades['grade_id']; ?></td>
                                    <td><?php echo $tbl_grades['sub_id']; ?></td>
                                    <td><?php echo $tbl_grades['student_id']; ?></td>
                                    <td><?php echo $tbl_grades['grade_subject']; ?></td>
                                    <td><?php echo $tbl_grades['grade_all']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
</div>
<!--  -->
<?php require_once("../../view/bootstrap/footer.php"); ?>