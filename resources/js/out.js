$(function () {
    var flag_money = false;

    $("#money").on("input propertychange", function () {
        flag_money = $("#money").val() > 0;
    });

    $("#ok_btn").on("click", function () {
        if (flag_money) {
            createOut();
        } else {
            alert("輸入資料不符合規定!!!");
        }
    });

    function createOut() {
        var dataJSON = {
            Money: $("#money").val(),
            Time: $("#date").val(),
            Items: $('input[name="items"]:checked').val(),
        };

        $.ajax({
            url: 'createOut',
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
            error: function () {
                
            }
        });
    }

});
