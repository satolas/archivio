<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Archivio</title>
    <meta name="description" content="Archivio Website" />
    <meta name="Archivio" content="Archivio" />

    <meta property="og:title" content="Archivio" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://satolas.github.io/archivio" />
    <meta property="og:description" content="Archivio Website" />
    <meta property="og:image" content="image.png" />

    <link rel="icon" href="img/icons/favicon.ico" type="image/x-icon">
    <!-- <link rel="icon" href="img/icons/favicon.svg" type="image/svg+xml" /> -->
    <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png" />

    <link rel="stylesheet" href="css/styles.css?v=1.0" />
</head>

<body>


<?php
$db = mysqli_connect("localhost", "root", "", "phplogin");
$er = mysqli_select_db($db, "phplogin");
// $result = mysqli_query($db, "SELECT * FROM versions");
// $query = mysqli_query($db, "SELECT * FROM versions WHERE date = (SELECT MAX(date) FROM versions");
$date = date('ymd');
// $select = mysqli_query($db, "SELECT date FROM versions");
$select = mysqli_query($db, "SELECT date FROM versions Order By date Desc");
$selectver = mysqli_query($db, "SELECT name FROM versions Order By date Desc");
$selectNotes = mysqli_query($db, "SELECT patchnotes FROM versions Order By date Desc");

$latestDate = mysqli_fetch_row($select)[0];
// echo $latestDate;

$latestVer = mysqli_fetch_row($selectver)[0];
// echo $latestVer;

$patchNotes = mysqli_fetch_row($selectNotes)[0];
// echo $patchNotes;

// Refactor patchnotes
$notes = str_replace('-','<br>- ', $patchNotes);
    // echo $notes;

// while($rowData = mysqli_fetch_array($select)){
//     		echo $rowData[0].'<br>';
//         }
?>



    <div class="container">


        <div class="demo">
            <h4>Demo :</h4>
            <a href="https://youtu.be/lvT7rfB01iA" rel="nofollow" data-target="animated-image.originalLink"><img
                    src="https://camo.githubusercontent.com/07ae246addf06efab382a7df85fa2fecb5c998971c44e6dcb50782ec8156f3f2/68747470733a2f2f6a2e676966732e636f6d2f7770795931582e676966"
                    alt="Electron Release Server Demo" data-canonical-src="https://j.gifs.com/wpyY1X.gif"
                    data-target="animated-image.originalImage"></a>
        </div>

        <div class="image">
            <div class="text">
                <h1>Archivio</h1>
                <h4>Archive Manager App</h4>
            </div>
            <p id="tooltip">
                <a href="releases/<?php echo $latestVer; ?>/archivio-0.2.4 Setup.exe" style="text-decoration: none;"><img
                        src="img/download-icon.png" alt="download-icon" /><span
                        class="tooltiptext">Download latest version</span></a>
            </p>
            <div class="text-update">
                <h3>Latest version : <?php echo $latestVer; ?></h3>
                <a href="public/version_public.php" style="text-decoration: none;">
                    <h4><u>Older versions</u></h4>
                </a>
            </div>



        </div>
        <div class="patch-notes">
            <h4>Release v<?php echo $latestVer; ?> patch notes <?php echo $latestDate; ?> :
                <br>
                <div class="notes">
                    <?php echo $notes; ?>
                </div>
            </h4>
        </div>

    </div>

    <!-- https://stackoverflow.com/questions/33702186/use-alt-text-for-hover-effect -->
    <!-- <p id="tooltip"><a href="releases/archivio.dmg" 
            style="text-decoration: none;"><img src="img/download-icon.png" alt="" /><span>Download older versions</span></a></p> -->

</body>

</html>