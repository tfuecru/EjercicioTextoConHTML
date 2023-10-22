<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="file">Head:</label>
                <input type="file" required id="head" name="head">
            </li>
            <li>
                <label for="file">Header:</label>
                <input type="file" required id="header" name="header">
            </li>
            <li>
                <label for="file">Main:</label>
                <input type="file" required id="main" name="main">
            </li>
            <li>
                <label for="file">Footer:</label>
                <input type="file" required id="footer" name="footer">
            </li>
            <li>
                <label for="send">Unir archivos:</label>
                <input type="submit" id="send" value="send">
            </li>
        </ul>
    </form>
</body>

</html>