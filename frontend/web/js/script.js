$(document).ready(function(){
    $(document).on('click', '.selectUser', function(){
        $.ajax({
            type: 'POST',
            url: "/tasks/tasks/select_user",
            data: '',
            success: function (data) {
                $('.select--user--body').html(data);
                $('#selectUserModal').modal('show');
            }
        });
    });

    $(document).on('click', '.pick--user', function(){
        var id = $(this).data('id');
        $('#tasks-user_id').val(id);
        $('#selectUserModal').modal('hide');
    });


    $(document).on('click', '.stat__send', function(){
        var csrf = $(this).data('csrf');
        var from = $('input[name="from"]').val();
        var to  = $('input[name="to"]').val();
        $.ajax({
            type: 'POST',
            url: "/mainpage/default/stat_copy",
            data: 'from=' + from + '&to=' + to + '&_csrf=' + csrf,
            success: function (data) {
                $('.stats').html(data);
            }
        });

    });
});
