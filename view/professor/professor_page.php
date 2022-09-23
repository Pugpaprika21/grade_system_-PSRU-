<?php

require_once("../../view/bootstrap/favicon.php");
require_once("../../controller/professor/function_professor.php");

$professor_id = $_GET['professor_id'];
$professor_fname = $_GET['professor_fname'];
$professor_lname = $_GET['professor_lname'];

$select_professor = select_professor($professor_id, $professor_fname, $professor_lname);

if ($professor_id == "") {
    header("location: ../../view/professor/login_professor.php");
}


?>

<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="../../view/image/psru_master.png" width="42" height="50" class="d-inline-block">
                หน้าหลัก (สำหรับสำหรับอาจารย์)
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
                <?php foreach ($select_professor as $key => $tbl_professor) : ?>
                    <img src="../../view/image/professor/<?php echo $tbl_professor['professor_img']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">สถานะ : อาจารย์</h5>
                        <h6 class="card-subtitle mb-2 text-muted">ข้อมูลสำหรับอาจารย์</h6>
                        <p class="card-text text-muted">ชื่อ : <?php echo $tbl_professor['professor_fname']; ?></p>
                        <p class="card-text text-muted">นามสกุล : <?php echo $tbl_professor['professor_lname']; ?></p>
                        <p class="card-text text-muted">รหัสสำหรับอาจารย์ : <?php echo $tbl_professor['professor_id']; ?></p>
                        <a class="btn btn-primary" href="/grade_system_psru/#" role="button" style="width: 100%;">ออกระบบ</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!--  -->
        <div class="col-sm-6 col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="harder-data text-muted" style="background-color: #C9E8AD;">
                        <h4>ข้อมูล : รายวิชาทั้งหมด</h4>
                    </div>
                    <hr>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">รหัสวิชา</th>
                                <th scope="col">ชื่อวิชา</th>
                                <th scope="col">ช่วงเวลาที่เรียน</th>
                                <th scope="col">วันที่เรียน</th>
                                <th scope="col">เลือก</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (getSubject() as $tbl_subject) : ?>
                                <tr>
                                    <td><?php echo $tbl_subject['sub_id']; ?> </td>
                                    <td><?php echo $tbl_subject['sub_name']; ?></td>
                                    <td><?php echo $tbl_subject['sub_time']; ?></td>
                                    <td><?php echo $tbl_subject['sub_day']; ?></td>
                                    <td><a class="btn btn-primary" href="../../view/professor/getGrade.php?sub_id=<?php echo $tbl_subject['sub_id']; ?>&professor_id=<?php echo $professor_id; ?>&professor_fname=<?php echo $professor_fname; ?>&professor_lname=<?php echo $professor_fname; ?> " role="button">เลือก</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->
<?php require_once("../../view/bootstrap/footer.php"); ?>