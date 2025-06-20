$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

var table = $(".data-table").DataTable({
    processing: true,
    serverSide: true,
    ajax: employeeReadRoute,
    columns: [
        { data: "id", name: "id" },
        { data: "firstName", name: "firstName" },
        { data: "lastName", name: "lastName" },
        { data: "companyName", name: "companyName" },
        { data: "email", name: "email" },
        { data: "phone", name: "phone" },
        { data: "action", name: "action", orderable: false, searchable: false },
    ],
});

$(document).on("click", "#deleteButton", function(e){
    e.preventDefault();
    $("#deleteModal").modal("show");

    var id = $(this).data("id");
    $("#yesButton").data("id", id);
});

$(document).on("click", "#yesButton", function (e) {
    e.preventDefault();

    var id = $(this).data("id");
    var newdeleteRoute = employeeDeleteRoute.replace("id", id);

    $.ajax({
        type: "DELETE",
        url: newdeleteRoute,
        data: { id: id },
        success: function (response) {
            if (response.status == true) {
                $(".data-table").DataTable().ajax.reload();
                $("#deleteModal").modal("hide");
            }
        }
    });
});

$(document).on("click", "#noButton", function(e){
    e.preventDefault();
    $("#deleteModal").modal("hide");
});
