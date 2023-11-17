$(function () {    
    $("#logout_btn").bind("click", function () {
        if (confirm("確定要登出嗎?")) {
            $.ajax({
                url: '/logout',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data === 'Logout Successful') {
                        window.location.href = "/login";
                    } else {
                        alert("登出失败");
                    }
                },
                error: function (xhr) {
                    
                }
            });
            
        }
    });
    
    $("#index").bind("click", function () {
        location.href = "/index";
    });
    $("#out").bind("click", function () {
        location.href = "/index";
    });
    $("#in").bind("click", function () {
        location.href = "/in";
    });
    $("#record").bind("click", function () {
        location.href = "/record";
    });
    $("#primer").bind("click", function () {
        location.href = "/tools";
    });
});