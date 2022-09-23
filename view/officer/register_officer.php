<?php require_once("../../view/bootstrap/favicon.php"); ?>
<!--  -->
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/grade_system_psru/#">
                <img src="../../view/image/psru_master.png" width="42" height="50" class="d-inline-block">
                ลงทะเบียน (สำหรับพนักงาน)
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
    <div class="card shadow rounded">
        <div class="card-body">
            <form action="../../controller/officer/getDataRegister.php" method="POST" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="username" class="form-label">รหัสพนักงาน :</label>
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" name="officer_id" id="userName_txt" placeholder="รหัสพนักงาน" aria-label="Username" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="username" class="form-label">ชื่อ :</label>
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" name="officer_fname" id="userName_txt" placeholder="ชื่อ" aria-label="Username" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">นามสกุล :</label>
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" name="officer_lname" id="passWord_txt" placeholder="นามสกุล" aria-label="Password" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="select-gender" class="form-label">เพศ</label>
                        <div class="input-group">
                            <select class="form-select" name="officer_gender" id="gender_txt" required>
                                <option selected>เลือกเพศ...</option>
                                <option value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">วันเดือนปีเกิด :</label>
                        <div class="input-group flex-nowrap">
                            <input type="date" class="form-control" name="officer_date" id="passWord_txt" placeholder="วันเดือนปีเกิด" aria-label="Password" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-md-6">
                        <label for="username" class="form-label">ตำเเหน่ง :</label>
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" name="officer_position" id="userName_txt" placeholder="ตำเเหน่ง" aria-label="Username" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="username" class="form-label">เบอร์โทร :</label>
                        <div class="input-group flex-nowrap">
                            <input type="phone" class="form-control" name="officer_phone" id="userName_txt" placeholder="เบอร์โทร" aria-label="Username" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">อีเมล์ :</label>
                        <div class="input-group flex-nowrap">
                            <input type="email" class="form-control" name="officer_email" id="passWord_txt" placeholder="อีเมล์" aria-label="Password" aria-describedby="addon-wrapping" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">รูปภาพประจำตัว :</label>
                        <div class="input-group flex-nowrap">
                            <input class="form-control" name="file" type="file" required>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <input class="btn btn-primary mt-3" type="submit" name="submit" value="ลงทะเบียน" style="margin-right: 10px;">
                </div>
                <a href="/grade_system_psru/#" class="link-primary">ลงทะเบียนเเล้ว</a>
            </form>
        </div>
    </div>
</div>
<!--  -->
<?php require_once("../../view/bootstrap/footer.php"); ?>
<!--  -->
<script>
    //
    $(document).ready(function() {
        Swal.fire({
            icon: 'info',
            title: 'info...',
            text: 'ลงทะเบียนสำหรับพนักงาน!',
        })
    });
    //
</script>