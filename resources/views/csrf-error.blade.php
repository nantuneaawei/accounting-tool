<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSRF Token Mismatch</title>
</head>
<body>
    <p>CSRF Token Mismatch. Please wait while we refresh the page.</p>

    <script>
        setTimeout(function () {
            location.reload();
        }, 2000);
    </script>
</body>
</html>