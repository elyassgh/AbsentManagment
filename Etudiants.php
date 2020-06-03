<?php
define('TITRE', "Etudiants");
include_once('includes/header.php');
?>

<?php
include('code.php');
?>

<div class="swiper-container">

    <div class="swiper-wrapper">
        <?php
        if (!empty($pdostat)) {

            foreach ($pdostat as $ligne) {
                echo '<div class="swiper-slide">
                <div class="card">
                    <div class="nom">
                        <h3>' . $ligne->Nom .'</h3>
                    </div>';

                echo '<div class="details">
                <div class="fill">Filliére : '. $ligne->Filliere .'</div>
                <div class="apoge"> Code Apogée : ' . $ligne->Apogee . '</div>
                <div class="classe">Classe : '. $ligne->Classe .'</div>
            </div> 
            <div class="qrcode">
                <div id="'. $ligne->Apogee .'"></div>
                <script> create('. $ligne->Apogee .')</script>
                <br>
            </div>
        </div>
    </div>';
            }
        }
        ?>

    </div>


    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

</div>
</div>

<script src="js/swiper.min.js"></script>

<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: {
            el: '.swiper-pagination',
            type: 'progressbar',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>

<?php
include_once('includes/footer.php');
?>