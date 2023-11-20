var flag_password = false;
var flag_pwd2 = false;

// 主程式
$(function () {
    // 按鈕監聽
    $("#Login_btn").bind("click", function () {
        login();
    });

    // 即時監聽 密碼
    $("#Login_Password").bind("input propertychange", function () {
        validatePassword();
    });

    // 即時監聽 確認密碼
    $("#Login_pwd2").bind("input propertychange", function () {
        validateConfirmPassword();
    });

    // Enter 鍵監聽
    $("#Login_Password, #Login_pwd2").on("keypress", function (e) {
        if (e.keyCode === 13) {
            login();
        }
    });

    $("#Login_Register").on("click", function () {
        window.location.href = "/register";
    });

    function login() {
        if (flag_password && flag_pwd2) {
            var dataJSON = {
                Email: $("#Login_Email").val(),
                Password: $("#Login_Password").val(),
            };
            $.ajax({
                url: 'loginAuth',
                method: 'post',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: JSON.stringify(dataJSON),
                cache: false,
                dataType: 'json',
                success: function (data) {
                    if (data.state) {
                        alert(data.message);
                        window.location.href = "/index";
                    } else {
                        alert(data.message);
                    }
                },
                error: function (xhr, status, error) {
                    // 处理错误
                }
            });
        } else {
            alert("輸入資料不符合規定!!!");
        }
    }

    function validatePassword() {
        if ($("#Login_Password").val().length < 9 && $("#Login_Password").val().length > 3) {
            $("#err_password").html("符合規定");
            $("#err_password").css("color", "#0E0");
            flag_password = true;
        } else {
            $("#err_password").html("字數不符合規定!");
            $("#err_password").css("color", "#F00");
            flag_password = false;
        }
    }

    function validateConfirmPassword() {
        if ($("#Login_pwd2").val() == $("#Login_Password").val()) {
            $("#err_pwd2").html("與密碼相同");
            $("#err_pwd2").css("color", "#0E0");
            flag_pwd2 = true;
        } else {
            $("#err_pwd2").html("與密碼不符合");
            $("#err_pwd2").css("color", "#F00");
            flag_pwd2 = false;
        }
    }
});
