$(function () {
    $("#prime_btn").bind("click", function () {
        $.ajax({
            type: "POST",
            url: "prime.php",
            data: { pnum: $('#prime').val() },
            success: function (msg) {
                $('#resultp').html(msg);
            },
            error: function () {
                alert("error-prime.php");
            }
        });
    });
    $("#fib_btn").bind("click", function () {
        $.ajax({
            type: "POST",
            url: "fib.php",
            data: { fibn: $('#fib').val() },
            success: function (msg) {
                var ans = msg.slice(0, -1);
                $('#resultf').html(ans);
            },
            error: function () {
                alert("error-fib.php");
            }
        });
    });
    $("#bmi_btn").bind("click", function () {
        $.ajax({
            type: "POST",
            url: "bmi.php",
            data: { weight: $('#w').val(), height: $('#h').val() },
            success: function (msg) {
                $('#resultbmi').html(msg);
            },
            error: function () {
                alert("error-bmi.php");
            }
        });
    });
    $("#cir_btn").bind("click", function () {
        $.ajax({
            type: "POST",
            url: "circle.php",
            data: { cirn: $('#people').val() },
            success: function (msg) {
                $('#resultcir').html(msg);
            },
            error: function () {
                alert("error-circle.php");
            }
        });
    });
    $("#time_btn").bind("click", function () {
        $.ajax({
            type: "POST",
            url: "time.php",
            data: { time: $('#time').val() },
            success: function (msg) {
                $('#resulttime').html(msg);
            },
            error: function () {
                alert("error-time.php");
            }
        });
    });
});