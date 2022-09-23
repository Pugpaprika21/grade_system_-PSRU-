<?php

require_once("../../view/bootstrap/favicon.php");
require_once("../../controller/officer/function_officer.php");

$officer_id = $_GET['officer_id'];
$officer_fname = $_GET['officer_fname'];
$officer_lname = $_GET['officer_lname'];
/* echo "<pre>";
print_r($_SESSION['allGrade']);
echo "</pre>"; */
$select_officer = select_officer($officer_id, $officer_fname, $officer_lname);

?>
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="../../view/image/psru_master.png" width="42" height="50" class="d-inline-block">
                หน้าหลัก (สำหรับสำหรับพนักงาน)
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
                <?php foreach ($select_officer as $key => $tbl_officer) : ?>
                    <img src="../../view/image/officer/<?php echo $tbl_officer['officer_img']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">สถานะ : พนักงาน</h5>
                        <h6 class="card-subtitle mb-2 text-muted">ข้อมูลสำหรับพนักงาน</h6>
                        <p class="card-text text-muted">ชื่อ : <?php echo $tbl_officer['officer_fname']; ?></p>
                        <p class="card-text text-muted">นามสกุล : <?php echo $tbl_officer['officer_lname']; ?></p>
                        <p class="card-text text-muted">รหัสสำหรับพนักงาน : <?php echo $tbl_officer['officer_id']; ?></p>
                        <a class="btn btn-primary" href="/grade_system_psru/#" role="button" style="width: 100%;">ออกระบบ</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!--  -->
        <div class="col-sm-6 col-md-10">
            <div class="card">
                <form action="../../controller/officer/save_grade.php" method="post">
                    <div class="card-body">
                        <div class="harder-data text-muted" style="background-color: #C9E8AD;">
                            <h4>ข้อมูล : บันทึกเกรด</h4>
                        </div>
                        <hr>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">รหัสใบเกรด</th>
                                    <th scope="col">รหัสวิชา</th>
                                    <th scope="col">รหัสนักศึกษา</th>
                                    <th scope="col">ชื่อวิชา</th>
                                    <th scope="col">เกรด</th>
                                    <th scope="col">เลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($_SESSION['allGrade'])): ?>
                                <tr>
                                    <td><input type="text" name="grade_id" style="width: 50%;" required></td>
                                    <td><?php echo $_SESSION['allGrade']['sub_id']; ?> <input type="hidden" name="sub_id" value="<?php echo $_SESSION['allGrade']['sub_id']; ?>"> </td>
                                    <td><?php echo $_SESSION['allGrade']['student_id']; ?><input type="hidden" name="student_id" value="<?php echo $_SESSION['allGrade']['student_id']; ?>"></td>
                                    <td><?php echo $_SESSION['allGrade']['sub_name']; ?><input type="hidden" name="grade_subject" value="<?php echo $_SESSION['allGrade']['sub_name']; ?>"></td>
                                    <td><?php echo $_SESSION['allGrade']['grade_all']; ?><input type="hidden" name="grade_all" value="<?php echo $_SESSION['allGrade']['grade_all']; ?>"></td>
                                    <td><button type="submit" name="submit" class="btn btn-primary">บันทึก</button></td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  -->
</div>


<?php require_once("../../view/bootstrap/footer.php"); ?>