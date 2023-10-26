$(document).on('click', ".deleteTask", function () {

    var id = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "tasks/delete_task.php",
        data: { id: id },
        success: function (html) {
            window.location.reload(true)

        }
        ,error: function (xhr, status, error) {
            console.log("Error: " + error);
        }
    })
})
