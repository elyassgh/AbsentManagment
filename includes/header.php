<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITRE; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis&display=swap">

    <link rel="stylesheet" href="css/swiper.min.css">
    <script type="text/javascript" src="js/llqrcode.js"></script>
    <script type="text/javascript" src="js/plusone.js"></script>
    <script type="text/javascript" src="js/webqr.js"></script>
    <script type="text/javascript">
        function create(data) {
            document.getElementById(data).innerHTML = "<img src='https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=" + encodeURIComponent(data) + "'/>";
        }
    </script>
</head>

<body>
    <div class="page">

        <div class="navbar">
            <img id="log" src="img/logo.png" alt="Gestion d'Absence">
            <ul>
                <li> <a href="index.php">Accueil</a> </li>
                <li> <a href="Etudiants.php">Etudiants</a> </li>
                <li> <a href="Absence.php">Absence</a> </li>
                <li> <a href="pv.php"> P.V </a> </li>
            </ul>
            <div class="uca">
                <img src="img/logouca.png" alt="Université cadi ayyad marrakech">
            </div>
        </div>