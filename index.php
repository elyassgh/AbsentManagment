<?php
define('TITRE',"Acceuil");
include_once('includes/header.php');
?>

<div class="contenu">
            <div class="gauche">
                <div class="about">
                    <h1><span>Projet</span> : Gestion d'absence aux examens</h1>
                    <br>
                    <br>
                    <h3>À propos du <span>projet</span></h3>
                    <br>
                    <p>
                        Il s’agit d’une <b>application web</b>, qui permet de gérer et <b>rendre facile</b> la
                        problématique de la
                        note de présence/absence pendent les examens, où il y a au moins des dizaines des étudiants et
                        parfois une centaine des étudiants dans un même endroit comme les amphis.
                    </p>
                    <br>
                    <hr>
                    <br>
                    <h3><span>Comment</span> ça marche <span>?</span></h3>
                    <br>
                    <p>
                        Dans les facultés, chaque étudiant a un code apogée, ce code peut être utilisé pour noter la
                        présence des étudiants pendant les examens, pour <b><em>automatiser</em></b> ce procesus, on va
                        attribué un
                        <b>QRCode</b> a chaque etudiant qui doit représente son code apogée, et qui peut être imprimé
                        sur les cartes des
                        examens des étudiants, et juste un simple <b>scan</b> (via une caméra ou un scanner) de ce code
                        on
                        notera son présence.
                    </p>
                    <br>
                    <hr>
                </div>

            </div>
            <div class="droite">
                <img src="img/logo2.png" alt="Gestion d'Absence des étudiants en examen">
            </div>
        </div>

    </div>


<?php
include_once('includes/footer.php');
?>