$(document).ready( function () {
    $('.settingsTable').DataTable({
    "ordering": false,
    "lengthChange": false,
    "info": false,
    
    });
    $('#settingsTable').DataTable({
    "ordering": false,
    "lengthChange": false,
    "info": false,
    "paging": false,
    });


    setTimeout(function() {
        $(".success").addClass("hidden"); // Add the 'hidden' class to hide the element
    }, 3000);

    // FOR DEPARTMENT EDIT
    $(".edit-department").click(function () {
        var departmentId = $(this).data("id");
        var departmentName = $(this).data("dptname");
        var departmentAcronym = $(this).data("acronym");

        // Populate the modal fields with the data
        $("#editdeptid").val(departmentId);
        $("#editdptname").val(departmentName);
        $("#editdptacronym").val(departmentAcronym);

        // Show the edit modal
        $("#editDepartment-modal").removeClass("hidden");
    });


    // FOR COURSE EDIT 
    $(".edit-course").click(function () {
        var courseId = $(this).data("id");
        var courseName = $(this).data("crsname");
        var courseAcronym = $(this).data("acronym");
        var courseDept = $(this).data("deptname");

        // Populate the modal fields with the data
        $("#editcrsid").val(courseId);
        $("#editcrsname").val(courseName);
        $("#editcrsacronym").val(courseAcronym);
        $("#editcrsdept").val(courseDept);
        // Show the edit modal
        $("#editCourses-modal").removeClass("hidden");
    });

    // FOR SUBJECT EDIT
    $(".edit-subject").click(function () {
        var subjectId = $(this).data("id");
        var subjectName = $(this).data("sbjname");
        var subjectCode = $(this).data("sbjcode");

        // Populate the modal fields with the data
        $("#editsbjid").val(subjectId);
        $("#editsbjname").val(subjectName);
        $("#editsbjcode").val(subjectCode);

        // Show the edit modal
        $("#editSubject-modal").removeClass("hidden");
    });






} );