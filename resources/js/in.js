$(function () {
    var flag_money = false;

    $("#money").on("input propertychange", function () {
        flag_money = $("#money").val() > 0;
    });

    $("#ok_btn").on("click", function () {
        if (flag_money) {
            createIn();
        } else {
            alert("輸入資料不符合規定!!!");
        }
    });

    function createIn() {
        var dataJSON = {
            Money: $("#money").val(),
            Time: $("#date").val(),
        };

        $.ajax({
            url: 'createIn',
            method: 'post',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: JSON.stringify(dataJSON),
            cache: false,
            dataType: 'json',
            success: function (data) {
                if (data.state) {
                    alert(data.message);
                    window.location.href = "/in";
                } else {
                    alert(data.message);
                }
            },
            error: function () {
                
            }
        });
    }
});
