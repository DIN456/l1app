<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">
        function closeWin() {
            myWindow.close();
        }
    </script>
</head>

<body>


    <script type="text/javascript">
        myWindow = window.open('', '', 'width=200,height=100');
        myWindow.document.write("This is 'myWindow'");
        myWindow.document.write('<input type="button" value="Close " onclick="window.close()" />');
    </script>

</body>

</html>