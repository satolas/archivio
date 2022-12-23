<?php
session_start();
$releaseFolder = $_SESSION['sessionvar'];
echo $_SESSION['sessionvar'];

if (isset($_FILES)) {
    $temp_name = $_FILES['files']['tmp_name'];
    $file_location = isset($_POST['file_location']) ? rtrim($_POST['file_location'], '/.') : $_FILES['files']['name'];
    $new_path = 'releases/' . $releaseFolder . "/" . $file_location;
    $folder = substr($new_path, 0, strrpos($new_path, '/'));
    $name = strstr($file_location, '/', true);
    ;

    if (!is_dir($folder) && $file_location) {
        $old = umask(0);
        mkdir($folder, 0777, true);
        umask($old);
    }

    if (move_uploaded_file($temp_name, $new_path)) {
        echo 'success';
    } else {
        echo 'failed';
    }

    session_start();
    // access session variables
    echo $_SESSION['sessionvar'];
}

?>