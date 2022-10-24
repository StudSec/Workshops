
<!DOCTYPE html>
<html>
    <body>
        <h1>Welcome to the super secure file uploader</h1>
        <form action="supersecretfileuploader.php" method="post" enctype="multipart/form-data">
            Select file to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload" name="submit">
        </form>

    </body>
</html>

<?php
  if (!isset($_FILES["fileToUpload"])) {
    die();
  }

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

  error_reporting(E_ALL | E_WARNING | E_NOTICE);
  ini_set('display_errors', TRUE);


  flush();

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Your file is too large.";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file hass been uploaded to /uploads/". htmlspecialchars(basename($target_file));
    } else {
      echo "There was an error uploading your file.";
    }
  }
?>
