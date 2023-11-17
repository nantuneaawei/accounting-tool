var flag_password = false;
var flag_pwd2 = false;
var flag_Nickname = false;
$(function () {
    $("#register_ok").bind("click", function () {
        if (flag_password && flag_pwd2 && flag_Nickname) {
            var dataJSON = {
                Email: $("#Register_Email").val(),
                Password: $("#Register_Password").val(),
                Nickname: $("#Register_Nickname").val()
            };
            $.ajax({
                url: 'create',
                method: 'post',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: JSON.stringify(dataJSON),
                cache: false,
                dataType: 'json',
                success: function (data) {
                    if (data.state) {
                        alert(data.message);
                        window.location.href = "/login";
                    } else {
                        alert(data.message);
                    }
                },
                error: function (xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessage = "Validation failed. Please check the errors below:\n";
                        for (var key in errors) {
                            errorMessage += key + ": " + errors[key][0] + "\n";
                        }
                        alert(errorMessage);
                    }
                }
            });
        } else {
            alert("輸入資料不符合規定!!!");
        }
    });

    $("#Register_Password").bind("input propertychange", function () {
        if ($("#Register_Password").val().length < 9 && $("#Register_Password").val().length > 3) {
            $("#err_password").html("符合規定");
            $("#err_password").css("color", "#0E0");
            flag_password = true;
        } else {
            $("#err_password").html("字數不符合規定!");
            $("#err_password").css("color", "#F00");
            flag_password = false;
        }

    });

    $("#Register_pwd2").bind("input propertychange", function () {
        if ($("#Register_pwd2").val() == $("#Register_Password").val()) {
            $("#err_pwd2").html("與密碼相同");
            $("#err_pwd2").css("color", "#0E0");
            flag_pwd2 = true;
        } else {
            $("#err_pwd2").html("與密碼不符合");
            $("#err_pwd2").css("color", "#F00");
            flag_pwd2 = false;
        }
    });

    $("#Register_Nickname").bind("input propertychange", function () {
        if ($("#Register_Nickname").val().length < 16 && $("#Register_Nickname").val().length > 0) {
            $("#err_Nickname").html("符合規定");
            $("#err_Nickname").css("color", "#0E0");
            flag_Nickname = true;
        }
        else {
            $("#err_Nickname").html("字數不符合規定!字數超過15以上");
            $("#err_Nickname").css("color", "#F00");
            flag_Nickname = false;
        }

    });
});