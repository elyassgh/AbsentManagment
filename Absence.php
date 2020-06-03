<?php
define('TITRE', "Absence");
include_once('includes/header.php');
?>

<?php
include('code.php');
?>
</div>


<div id="mainbody">

    <div class="form">
        <form action="" method="post" name="myForm">
            <label>Classe :</label>
            <select required name="classe">
                <option selected> </option>
                <?php
                foreach ($Classes as $Classe) {
                    echo '<option value="' . $Classe->classe . '">' . $Classe->classe . '</option>';
                }
                ?>
            </select>
            <label>Session :</label>
            <select required name="session">
                <option selected> </option>
                <?php
                foreach ($Sessions as $Session) {
                    echo '<option value="' . $Session->Session . '">' . $Session->Session . '</option>';
                }
                ?>
            </select>
            <label>Module :</label>
            <select name="module">
                <option selected> </option>
            </select>
            <input required hidden id="apo" type="text" name="apogee">
            <input id="up" type="submit" value="Noter la Présence" name="update">
        </form>
    </div>

    <div class="select">
        <img class="selector" id="webcamimg" src="img/vid.png" onclick="setwebcam()" />
        <img class="selector" id="qrimg" src="img/cam.png" onclick="setimg()" />
    </div>

    <div id="outdiv"></div>

    <div class="resultat">

        <div id="result"></div>
        <div id="present">
            <span>
                <h1 id="pre"></h1>
            </span>
        </div>
    </div>

</div>

<canvas id="qr-canvas" width="800" height="600"></canvas>

<script type="text/javascript">
    load();
</script>


<?php
include_once('includes/footer.php');
?>