// 主程式
$(function () {
    var flags = {
        password: false,
        pwd2: false,
    };
    // 按鈕監聽
    $("#Login_btn").bind("click", function () {
        login();
    });

    // 即時監聽 密碼
    $("#Login_Password").bind("input propertychange", function () {
        validatePassword();
        validateConfirmPassword();  // 確保在輸入密碼時也同時檢查確認密碼
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
        if (validateForm()) {
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

                }
            });
        } else {
            alert("輸入資料不符合規定!!!");
        }
    }

    function validateForm() {
        return flags.password && flags.pwd2;
    }

    function validatePassword() {
        var password = $("#Login_Password").val();
        
        // 如果值為空，清空錯誤提示並退出
        if (!password.trim()) {
            updateValidationStatus("#err_password", false, "", "");
            flags.password = false;
            return;
        }
    
        var isValid = password.length > 3 && password.length < 9;
        updateValidationStatus("#err_password", isValid, "符合規定", "字數不符合規定!");
        flags.password = isValid;
    }
    
    function validateConfirmPassword() {
        var confirmPassword = $("#Login_pwd2").val();
    
        // 如果值為空，清空錯誤提示並退出
        if (!confirmPassword.trim()) {
            updateValidationStatus("#err_pwd2", false, "", "");
            flags.pwd2 = false;
            return;
        }
    
        var isValid = confirmPassword === $("#Login_Password").val();
        updateValidationStatus("#err_pwd2", isValid, "與密碼相同", "與密碼不符合");
        flags.pwd2 = isValid;
    }
    

    function updateValidationStatus(elementId, isValid, validMessage, invalidMessage) {
        var $element = $(elementId);
        $element.html(isValid ? validMessage : invalidMessage);
        $element.css("color", isValid ? "#0E0" : "#F00");
    }
});
