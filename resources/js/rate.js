$(function () {
    $('#rate_btn').click(function(){
        var price = $('#price').val();
        var dividend = $('#dividend').val(); 
        $.ajax({
            url: 'tools',
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                price: price,
                dividend: dividend
            },
            cache: false,
            dataType: 'json',
            success: function (data) {
                $('.text-danger').remove();
                
                $('#resultrate').text(data.data + '%');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $('.text-danger').remove();
                
                $('#resultrate').text('');
                var errors = xhr.responseJSON.errors;
                if (errors) {
                    $.each(errors, function(field, message) {
                        $('#' + field).after('<div class="text-danger">' + message + '</div>');
                    });
                } else {
                    $('#errorDiv').text('An error occurred.');
                }
            }            
        });
    });
});
