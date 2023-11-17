var flag_money = false;
$(function () {
    //即時監聽    金額
    $("#money").bind("input propertychange", function () {
        if ($("#money").val() > 0) {
            flag_money = true;
        }
        else {
            flag_money = false;
        }

    });
    // 新增按鈕監聽
    $("#ok_btn").bind("click", function () {
        if (flag_money) {
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
        } else {
            alert("輸入資料不符合規定!!!");
        }
    });

    //delete
    $("#delete_btn").bind("click", function () {
        if (confirm("確定要刪除嗎?")) {
            var jsonData = {};
            jsonData["ID"] = $(this).data("id");
            $.ajax({
                type: "DELETE",
                url: "deleteIn",
                data: JSON.stringify(jsonData),
                dataType: "json",
                success: function () {

                },
                error: function () {
                    alert("error-in_D.php");
                }
            });
        }
    });
})