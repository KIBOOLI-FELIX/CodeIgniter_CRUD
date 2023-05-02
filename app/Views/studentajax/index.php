<?=$this->extend("layouts/frontend.php");?>
<?=$this->section("content");?>

<!-- Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentModalLabel">Student Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Full Name</label><span id="error_name" class="text-danger ms-3"></span>
          <input type="text" class="form-control name" placeholder="Enter full name">
        </div>
        <div class="form-group">
          <label>Email</label><span id="error_email" class="text-danger ms-3"></span>
          <input type="text" class="form-control email" placeholder="Enter email address">
        </div>
        <div class="form-group">
          <label>Phone Contact</label><span id="error_phone" class="text-danger ms-3"></span>
          <input type="text" class="form-control phone" placeholder="Enter mobile number">
        </div>
        <div class="form-group">
          <label>Course</label><span id="error_course" class="text-danger ms-3"></span>
          <input type="text" class="form-control course" placeholder="Enter course of study">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary ajaxstudent_save">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Student Modal view-->
<div class="modal fade" id="studentModalView" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentModalLabel">Student View</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <h4>ID:<span class="id_view"></span></h4>
       <h4>NAME:<span class="name_view"></span></h4>
       <h4>EMAIL:<span class="email_view"></span></h4>
       <h4>PHONE:<span class="phone_view"></span></h4>
       <h4>COURSE:<span class="course_view"></span></h4>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary ajaxstudent_save">Save</button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Edit student Modal -->
<div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentModalLabel">Student Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="stud_id">
        <div class="form-group">
          <label>Full Name</label>
          <input type="text" id="stud_name" class="form-control name" placeholder="Enter full name">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" id="stud_email" class="form-control email" placeholder="Enter email address">
        </div>
        <div class="form-group">
          <label>Phone Contact</label>
          <input type="text" id="stud_phone" class="form-control phone" placeholder="Enter mobile number">
        </div>
        <div class="form-group">
          <label>Course</label>
          <input type="text" id="stud_course" class="form-control course" placeholder="Enter course of study">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary ajaxstudent_update">Update</button>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12 my-4">
      <h1 class="text-center">AJAX CRUD IN CODEIGNITER</h1>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Student Data
          <a href="#" class="btn btn-primary btn-sm float-end"  data-bs-toggle="modal" data-bs-target="#studentModal">Add New Student</a>
          </h4>
        </div>
        <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>NAME</th>
              <th>EMAIL</th>
              <th>PHONE</th>
              <th>COURSE</th>
              <th>CREATED AT</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody class="studentdata">
        
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?=$this->endSection();?>

<?=$this->section("scripts");?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.js"></script>

<script>
  $(document).ready(()=>{
    // $(".table").DataTable();

       //viewing student info
    $(document).on("click",".view_btn",function (e) {
      e.preventDefault();
      var studId=$(this).closest("tr").find(".stud_id").text();
      // alert(studId);
      $.ajax({
        method: "POST",
        url: "<?=base_url("student/view");?>",
        data:{
          "stud_id":studId
        },
        success: function (response) {
          // console.log(response);
          $.each(response, function (index,stud) { 
             $(".id_view").text(stud["id"]);
             $(".name_view").text(stud["name"]);
             $(".email_view").text(stud["email"]);
             $(".phone_view").text(stud["phone"]);
             $(".course_view").text(stud["course"]);
             $("#studentModalView").modal("show");
          });
        }
      });
    });

    //updating student information
    $(document).on("click",".edit_btn",function () {
      var updateId=$(this).closest("tr").find(".sorting_1").text();
      // alert(updateId);
      $.ajax({
        method: "POST",
        url: "<?=base_url("student/update");?>",
        data:{
          "stud_id":updateId
        },
        success: function (response) {
          // console.log(response);
          
          $.each(response, function (index,stud) { 
             $("#stud_id").val(stud["id"]);
             $("#stud_name").val(stud["name"]);
             $("#stud_email").val(stud["email"]);
             $("#stud_phone").val(stud["phone"]);
             $("#stud_course").val(stud["course"]);
             $("#studentEditModal").modal("show");
          });
        }
      });
    });

    //saving updated information
    $(document).on("click",".ajaxstudent_update", function () {
  
      $.ajax({
        method:"POST",
        url: "<?=base_url("student/update/save")?>",
        data:{
          "id": $("#stud_id").val(),
          "name":$("#stud_name").val(),
          "email":$("#stud_email").val(),
          "phone":$("#stud_phone").val(),
          "course":$("#stud_course").val(),
        },
        success: function (response) {
          console.log(response);
          $("#studentEditModal").modal("hide");
          $(".table").DataTable().ajax.reload();
          
        },
        error: function(xhr,response){
          // alert(`An error occured ${xhr.status} ${xhr.statusText}`);
          alert(response.status);
        }
      });
    });

    //loading student data
        $('.table').DataTable({
        ajax:{
          url: "<?=base_url("/student/get");?>",
          dataSrc: "students"
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'email' },
            { data: 'phone' },
            { data: 'course' },
            { data: 'created_at'},
            { "render": function ( data, type, row, meta ) {
             return ' <a href="#" class="bage btn-primary edit_btn">UPDATE</a>\
              <a href="#" class="bage btn-secondary delete_btn">DELETE</a>'
            }},
    
        ],
     
         
      });
 
   
    //adding new student
    $(document).on("click",".ajaxstudent_save", ()=>{
      // $("#studentModal").modal("hide");
      // validating data
      if($.trim($(".name").val()).length==0){
        var error_name="Please Enter  name";
        $("#error_name").text(error_name);
      }else{
        var error_name="";
        $("#error_name").text(error_name);
      }

      if($.trim($(".email").val()).length==0){
        var error_email="Please Enter  email";
        $("#error_email").text(error_email);
      }else{
        var error_email="";
        $("#error_email").text(error_email);
      }

      if($.trim($(".phone").val()).length==0){
        var error_phone="Please Enter  phone";
        $("#error_phone").text(error_phone);
      }else{
        var error_phone="";
        $("#error_phone").text(error_phone);
      }

      if($.trim($(".course").val()).length==0){
        var error_course="Please Enter  course";
        $("#error_course").text(error_course);
      }else{
        var error_course="";
        $("#error_course").text(error_course);
      }

      //collecting data
      if(error_name !=="" || error_email !==""||error_phone !==""|| error_course !==""){
        return false
      }else{
        var data={
          "name":$(".name").val(),
          "email":$(".email").val(),
          "phone":$(".phone").val(),
          "course":$(".course").val(),
        }

        $.ajax({
          method: "POST",
          url: "<?=base_url("/student/store");?>",
          data:data,
          success: function (response) {
            $("#studentModal").modal("hide");
            $("#studentModal").find("input").val("");
            // $(".studentdata").html("");
            // $(".table").html("");
            $('.table').DataTable().ajax.reload();
          
            // alertify.set("notifier","position","top-right");
            // alertify.success(response.status);
            alert(response.status);
          }
        });
     
      }
    })

  });


</script>
<?=$this->endSection("scripts");?>