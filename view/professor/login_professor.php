<?php
//
require_once("../../view/bootstrap/favicon.php");
//
$LoginMsg = (isset($_GET['Login']) == "") ? "" : $_GET['Login'];
//
?>
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/grade_system_psru/#">
                <img src="../../view/image/psru_master.png" width="42" height="50" class="d-inline-block">
                เข้าสู่ระบบ (สำหรับอาจารย์)
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
    <br>
    <div class="col d-flex justify-content-center">
        <div class="card" style="width: 45rem;">
            <div class="card-body shadow rounded">
                <div class="text-center">
                    <h4>เข้าสู่ระบบ</h4>
                </div>
                <form id="form-professor-login">
                    <label for="username" class="form-label">รหัสอาจารย์ :</label>
                    <div class="input-group mb-3">
                        <input type="hidden" value="<?php echo $LoginMsg; ?>" id="Login">
                        <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                            </svg></span>
                        <input type="text" class="form-control" placeholder="รหัสอาจารย์" name="professor_id" id="professor_id" aria-label="professor_id" aria-describedby="basic-addon1">
                    </div>
                    <label for="username" class="form-label">ชื่อ :</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                            </svg></span>
                        <input type="text" class="form-control" placeholder="ชื่อ" name="professor_fname" id="professor_fname" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <label for="username" class="form-label">นามสกุล :</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                            </svg></span>
                        <input type="text" class="form-control" placeholder="นามสกุล" name="professor_lname" id="professor_lname" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="../../view/professor/register_professor.php" class="link-primary">ลงทะเบียน</a>
                    </div>
                    <input class="btn btn-primary mt-3" type="submit" value="เข้าสู่ระบบ" style="width: 100%;">
                </form>
            </div>
        </div>
    </div>
    <!--  -->
</div>
<!--  -->
<?php require_once("../../view/bootstrap/footer.php"); ?>
<!--  -->
<script>
    //
    function LoginSwl() {
        //
        let $LoginMsg = $('#Login').val();
        //
        if ($LoginMsg == "success") {
            console.log(Login);
            Swal.fire({
                icon: 'success',
                title: 'success...',
                text: 'ลงทะเบียนสำเร็จ',
            });
        }
    }
    //
    $(document).ready(function() {
        //      
        LoginSwl();
        //
        $('#form-professor-login').submit(function(e) {
            e.preventDefault();
            //
            let professor_id = $('#professor_id').val().trim();
            let professor_fname = $('#professor_fname').val().trim();
            let professor_lname = $('#professor_lname').val().trim();
            //
            if (professor_id != "" && professor_fname != "" && professor_lname != "") {
                //
                $.ajax({
                    type: "post",
                    url: '../../controller/professor/getData_login.php',
                    data: {
                        professor_id: professor_id,
                        professor_fname: professor_fname,
                        professor_lname: professor_lname
                    },
                    success: function(response) {
                        let professor_login = JSON.parse(response);
                        //
                        professor_login.forEach(function(login) {
                            if (login.professor_id == professor_id && login.professor_fname == professor_fname && login.professor_lname == professor_lname) {
                                console.log(login.professor_id);
                                //
                                Swal.fire({
                                    icon: 'success',
                                    title: 'success...',
                                    text: 'ล็อคอินสำเร็จ',
                                });
                                //
                                setInterval(function() {
                                    window.location = "../../view/professor/professor_page.php?professor_id=" + login.professor_id + "&professor_fname=" + login.professor_fname + "&professor_lname=" + login.professor_lname + "";
                                }, 3000);
                            }
                        });
                    }
                });
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'warning...',
                    text: 'กรอกข้อมูลให้ครบ',
                });
            }
        });
    });
    //
</script>