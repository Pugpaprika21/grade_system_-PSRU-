<?php

require_once("../../view/bootstrap/favicon.php");
require_once("../../controller/professor/function_professor.php");

$sub_id = $_GET['sub_id'];
//
if (isset($_GET['sub_id'])) {
    $get_grade = get_grade($sub_id);
}

?>
<!--  -->
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="../../view/image/psru_master.png" width="42" height="50" class="d-inline-block">
                หน้าคำนวนเกรด (สำหรับสำหรับอาจารย์)
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
    <div class="col d-flex justify-content-center mb-4">
        <div class="card shadow rounded" style="width: 60rem;">
            <div class="card-body">
                <form action="../../controller/professor/cal_grade.php" method="POST" id="form-to-cal-grade">
                    <div id="alert">
                        <!-- show grade -->
                    </div>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">รหัสวิชา</th>
                                <th scope="col">ชื่อวิชา</th>
                                <th scope="col">ช่วงเวลาที่เรียน</th>
                                <th scope="col">วันที่เรียน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($get_grade as $tbl_subject) : ?>
                                <tr>
                                    <td><?php echo $tbl_subject['sub_id']; ?> <input type="hidden" id="sub_id" value="<?php echo $tbl_subject['sub_id']; ?>"></td>
                                    <td><?php echo $tbl_subject['sub_name']; ?><input type="hidden" id="sub_name" value="<?php echo $tbl_subject['sub_name']; ?>"></td>
                                    <td><?php echo $tbl_subject['sub_time']; ?><input type="hidden" id="sub_time" value="<?php echo $tbl_subject['sub_time']; ?>"></td>
                                    <td><?php echo $tbl_subject['sub_day']; ?><input type="hidden" id="sub_day" value="<?php echo $tbl_subject['sub_day']; ?>"></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!--  -->
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="color:#FF0000">คะเเนนกลางภาค : ไม่เกิน 50 คะเเนน </label>
                        <input class="form-control" type="number" id="midterm_score" placeholder="คะเเนนกลางภาค : ไม่เกิน 50 คะเเนน" aria-label="default input example" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="color:#FF0000">คะเเนนปลายภาค : ไม่เกิน 50 คะเเนน </label>
                        <input class="form-control" type="number" id="final_score" placeholder="คะเเนนปลายภาค : ไม่เกิน 50 คะเเนน" aria-label="default input example" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="color:#FF0000">คะเเนนเก็บ : ไม่เกิน 100 คะเเนน </label>
                        <input class="form-control" type="number" id="keep_score" placeholder="คะเเนนเก็บ : ไม่เกิน 100 คะเเนน" aria-label="default input example" required>
                    </div>
                    <select class="form-select" size="4" aria-label="size 4 select example" id="student_id" required>
                        <?php foreach (getStudent_name() as $key => $tbl_student) : ?>
                            <option value="<?php echo $tbl_student['student_id']; ?>">รหัสนักศึกษา : <?php echo $tbl_student['student_id']; ?> ชื่อ : <?php echo $tbl_student['student_fname']; ?> นามสกุล : <?php echo $tbl_student['student_lname']; ?> ชั้นปีที่ : <?php echo $tbl_student['student_class']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary mt-4">ส่งเกรด</button>
                    <button type="reset" class="btn btn-warning mt-4">รีเซต</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--  -->
<?php require_once("../../view/bootstrap/footer.php"); ?>
<!--  -->
<script>
    //
    function get_grade() {
        //
        let sub_id = $('#sub_id').val().trim();
        let sub_name = $('#sub_name').val().trim();
        let sub_time = $('#sub_time').val().trim();
        let sub_day = $('#sub_day').val().trim();
        let student_id = $('#student_id').val().trim();
        let midterm_score = $('#midterm_score').val().trim();
        let final_score = $('#final_score').val().trim();
        let keep_score = $('#keep_score').val().trim();
        //
        if (sub_id != "" && sub_name != "" && sub_time != "" && sub_day != "" && student_id != "" && midterm_score != "" && final_score != "" && keep_score != "") {
            //
            $.ajax({
                type: "post",
                url: "../../controller/professor/cal_grade.php",
                data: {
                    sub_id: sub_id,
                    sub_name: sub_name,
                    sub_time: sub_time,
                    sub_day: sub_day,
                    student_id: student_id,
                    midterm_score: midterm_score,
                    final_score: final_score,
                    keep_score: keep_score
                },
                success: function(response) {
                    //
                    console.log(response);
                    let total_score = response;
                    //
                    $('#alert').append(
                        "<div class='alert alert-success' role='alert'>" +
                        'ผลการเรียน : ' + total_score +
                        "</div>"
                    );
                }
            });
            //
            return true;
        } else {
            //
            Swal.fire({
                icon: 'warning',
                title: 'warning...',
                text: 'กรุณากรอกข้อมูลให้ครบ!',
            })
            return false;
        }
    }
    //
    $(document).ready(function() {
        //
        $('#form-to-cal-grade').submit(function(e) {
            e.preventDefault();
            //
            if (get_grade() == true) {
                //
                setTimeout(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'success...',
                        text: 'ส่งเกรดเรียบร้อย!',
                    });
                }, 1000);
                //
                setTimeout(function() {
                    window.location = "../../view/professor/login_professor.php";
                }, 4000);
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'warning...',
                    text: 'เกิดข้อผิดพลาด!',
                });
            }
        });
    });
</script>