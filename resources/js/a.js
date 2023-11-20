$(function () {    
    $("#logout_btn").on("click", function () {
        if (confirm("確定要登出嗎?")) {
            logout();
        }
    });

    $("#index, #in, #record").on("click", function () {
        var page = $(this).attr("data-page");
        if (page) {
            location.href = "/" + page;
        }
    });

    function logout() {
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
