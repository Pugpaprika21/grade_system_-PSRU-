<?php require_once("view/bootstrap/harder.php"); ?>
<!--  -->
<div class="container">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="view/image/psru_master.png" width="42" height="50" class="d-inline-block">
                ระบบตัดเกรดนักศึกษา
            </a>
        </div>
    </nav>
    <!--  -->
    <div class="card mt-2" style="border-color: #DFF2E4">
        <div class="card-body" style="background-color: #DFF2E4;">
            ระบบงานมหาวิทยาลัย กรณี ศึกษา ม. ราชภัฏพิบูลสงคราม
        </div>
    </div>
    <!--  -->
    <div class="row">
        <div class="col-6 col-md-4 mt-2">
            <ol class="list-group">
                <li class="list-group-item" aria-current="true" style="background-color: #8AAAF3;">ลงทะเบียน</li>
                <a href="view/student/register_student.php?student=register" class="list-group-item list-group-item-action">สำหรับนักศึกษา</a>
                <a href="view/professor/register_professor.php?professor=register" class="list-group-item list-group-item-action">สำหรับอาจารย์</a>
                <a href="view/officer/register_officer.php?officer=register" class="list-group-item list-group-item-action">สำหรับพนักงาน (เจ้าหน้าที่)</a>
            </ol>
        </div>
        <div class="col-sm-6 col-md-8 mt-2">
            <div class="card shadow rounded">
                <div class="card-body">
                    <div class="text-muted mb-4">
                        เข้าสู่ระบบ พนักงาน (เจ้าหน้าที่)
                    </div>
                    <form id="form-login-officer">
                        <div class="row">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                    </svg></span>
                                <input type="text" class="form-control" placeholder="รหัสพนักงาน" id="officer_id" aria-label="officer_id" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                    </svg></span>
                                <input type="text" class="form-control" placeholder="ชื่อ" id="officer_fname" aria-label="officer_fname" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                    </svg></span>
                                <input type="text" class="form-control" placeholder="นามสกุล" id="officer_lname" aria-label="officer_lname" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input class="btn btn-primary" type="submit" value="เข้าสู่ระบบ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->
<?php require_once("view/bootstrap/footer.php"); ?>
<script>
    $(document).ready(function() {
        //
        $('#form-login-officer').submit(function(e) {
            e.preventDefault();
            //
            let officer_id = $('#officer_id').val().trim();
            let officer_fname = $('#officer_fname').val().trim();
            let officer_lname = $('#officer_lname').val().trim();
            //
            if (officer_id != "" && officer_fname != "" && officer_lname != "") {
                //
                $.ajax({
                    type: "post",
                    url: "controller/officer/getData_login.php",
                    data: {
                        officer_id: officer_id,
                        officer_fname: officer_fname,
                        officer_lname: officer_lname,
                    },
                    success: function(response) {
                        let officer_login = JSON.parse(response);
                        //
                        console.log(officer_login);

                        officer_login.forEach(function(login) {
                            if (login.officer_id == officer_id && login.officer_fname == officer_fname && login.officer_lname == officer_lname) {

                                Swal.fire({
                                    icon: 'success',
                                    title: 'success...',
                                    text: 'ล็อคอินสำเร็จ',
                                });
                                //
                                setInterval(function() {
                                    window.location = "view/officer/officer_page.php?officer_id=" + login.officer_id + "&officer_fname=" + login.officer_fname + "&officer_lname=" + login.officer_lname + "";
                                }, 3000);
                            }
                        });
                    }
                });
            }
        });
    });
    //
</script>