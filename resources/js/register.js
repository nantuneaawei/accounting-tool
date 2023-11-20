$(function () {
    var flags = {
        password: false,
        pwd2: false,
        nickname: false
    };

    $("#register_ok").on("click", function () {
        if (validateForm()) {
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
                    handleAjaxError(xhr);
                }
            });
        } else {
            alert("輸入資料不符合規定!!!");
        }
    });

    $("#Register_Password").on("input propertychange", function () {
        validatePassword();
    });

    $("#Register_pwd2").on("input propertychange", function () {
        validateConfirmPassword();
    });

    $("#Register_Nickname").on("input propertychange", function () {
        validateNickname();
    });

    function validateForm() {
        return flags.password && flags.pwd2 && flags.nickname;
    }

    function validatePassword() {
        var password = $("#Register_Password").val();
        var isValid = password.length > 3 && password.length < 9;
        updateValidationStatus("#err_password", isValid, "符合規定", "字數不符合規定!");
        flags.password = isValid;
    }

    function validateConfirmPassword() {
        var isValid = $("#Register_pwd2").val() === $("#Register_Password").val();
        updateValidationStatus("#err_pwd2", isValid, "與密碼相同", "與密碼不符合");
        flags.pwd2 = isValid;
    }

    function validateNickname() {
        var nickname = $("#Register_Nickname").val();
        var isValid = nickname.length > 0 && nickname.length < 16;
        updateValidationStatus("#err_Nickname", isValid, "符合規定", "字數不符合規定!字數超過15以上");
        flags.nickname = isValid;
    }

    function handleAjaxError(xhr) {
        if (xhr.responseJSON && xhr.responseJSON.errors) {
            var errors = xhr.responseJSON.errors;
            var errorMessage = "Validation failed. Please check the errors below:\n";
            for (var key in errors) {
                errorMessage += key + ": " + errors[key][0] + "\n";
            }
            alert(errorMessage);
        }
    }

    function updateValidationStatus(elementId, isValid, validMessage, invalidMessage) {
        var $element = $(elementId);
        $element.html(isValid ? validMessage : invalidMessage);
        $element.css("color", isValid ? "#0E0" : "#F00");
    }
});
