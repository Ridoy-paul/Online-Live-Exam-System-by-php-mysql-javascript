<!DOCTYPE html>
<html>
<head>
    <title>JS beforeunload Event</title>
    <a id="paul" href="faraitfusion.com">Hello FARA IT Fusion</a>
</head>

<body>
    <a href="https://www.javascripttutorial.net/javascript-dom/">JavaScript DOM Tutorial</a>
    <script>
        window.addEventListener('beforeunload', (event) => {
           // event.preventDefault();
            document.getElementById("paul").click();
           // Google Chrome requires returnValue to be set.
            event.returnValue = '';
        });
    </script>
</body>

</html>