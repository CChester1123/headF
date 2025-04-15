<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enable/Disable Textbox</title>
</head>
<body>
    <input type="text" id="myTextbox" disabled>
    <button id="toggleButton">Enable/Disable Textbox</button>

    <script>
        document.getElementById("toggleButton").addEventListener("click", function() {
            var textbox = document.getElementById("myTextbox");
            textbox.disabled = !textbox.disabled;
        });
    </script>
</body>
</html>