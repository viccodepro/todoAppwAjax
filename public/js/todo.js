function task_done(id) {
    $.get("/done/" + id, function (data) {
        if (data == "OK") {
            $("#" + id).addClass("done");
        }

    });
}
function delete_task(id) {
    // $.get("/delete/" + id, function (data) {
    //     if (data == "OK") {
    //         var target = $("#" + id);
    //         target.hide('slow', function () { target.remove(); });
    //     }

    // });
    // ajax_header_setup();
    $.ajax({
        url: '/delete/' + id,
        method: 'DELETE',
        data: {},
        success: function (data) {
            if (data == "OK") {
                var target = $("#" + id);
                target.hide('slow', function () { target.remove(); });
            }          
        },
        error: function (data) {
            alert("A server error occurred. Please contact administrator");
        }
    });
}
function show_form(form_id) {

    $("form").hide();
    $('#' + form_id).show("slow");
}
function edit_task(id, title) {
    $("#edit_task_id").val(id);
    $("#edit_task_title").val(title);
    show_form('edit_task');
}
function ajax_header_setup() {
    var csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // Make your AJAX request with the CSRF token as a header
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrf_token
        }
    });
}
$('#add_task').submit(function (event) {

    /* stop form from submitting normally */
    event.preventDefault();

    var title = $('#task_title').val();
    if (title) {
        //ajax post the form old way in laravel 4
        // $.post("/add", { title: title }).done(function (data) {

        //     $('#add_task').hide("slow");
        //     $("#task_list").append(data);
        // });
        ajax_header_setup();
        $.ajax({
            url: '/add',
            method: 'POST',
            data: {
                title: title
            },
            success: function (data) {
                // Append new todo to the list
                $("#task_list").append(data);
                $('#add_task').hide("slow");

                // Clear input field
                $('input[name="title"]').val('');

                // An alternative method of appending the data to the list
                // $('#task_list').append('<li><input type="checkbox" name="completed" value="1" data-id="' + todo.id + '" class="completed-toggle"><span>' + todo.title + '</span><button data-id="' + todo.id + '" class="delete-todo">Delete</button></li>');            
            },
            error: function (data) {
                alert("A server error occurred. Please contact administrator");
            }
        });
    }
    else {
        alert("Please give a title to task");
    }
});
$('#edit_task').submit(function (event) {

    /* stop form from submitting normally */
    event.preventDefault();
    var task_id = $('#edit_task_id').val();
    var title = $('#edit_task_title').val();
    var current_title = $("#span_" + task_id).text();
    var new_title = current_title.replace(current_title, title);
    if (title) {
        //ajax post the form
        // $.post("/update/" + task_id, { title: title }).done(function (data) {
        //     $('#edit_task').hide("slow");
        //     $("#span_" + task_id).text(new_title);
        // });

        ajax_header_setup();
        $.ajax({
            url: '/update/' + task_id,
            method: 'PUT',
            data: {
                title: title
            },
            success: function (data) {
                $('#edit_task').hide("slow");
                $("#span_" + task_id).text(new_title);
            },
            error: function (data) {
                alert("A server error occurred. Please contact administrator");
            }
        });

    }
    else {
        alert("Please give a title to task");
    }
});