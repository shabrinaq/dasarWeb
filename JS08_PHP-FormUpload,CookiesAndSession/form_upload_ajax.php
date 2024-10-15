<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Unggah File Dokumen Image</title>
    </head>

    <body>
        <h3>Unggah File Documen Image</h3>
            <form id="upload-form" action="upload_ajax.php" method="post" enctype="multipart/form-data">
            <input type="file" name="files[]" id="file" multiple required>
            <input type="submit" name="submit" value="Unggah">
        </form>
        <div id="status"></div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="upload.js"></script>
    </body>
    
</html>