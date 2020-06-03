<?php
define('TITRE', "P.V.");
include_once('includes/header.php');
?>

<h1>P.V. d'absence :</h1>

<?php
include('code.php');
?>

<form action="" method="post">
  <label>Classe :</label>
  <select name="classe">
    <option selected value="tous">Tous</option>
    <?php
    foreach ($Classes as $Classe) {
      echo '<option value="' . $Classe->classe . '">' . $Classe->classe . '</option>';
    }
    ?>
  </select>
  <label>Session :</label>
  <select name="session">
    <option selected value="tous">Tous</option>
    <?php
    foreach ($Sessions as $Session) {
      echo '<option value="' . $Session->Session . '">' . $Session->Session . '</option>';
    }
    ?>
  </select>
  <label>Module :</label>
  <select name="module">
    <option selected value="tous">Tous</option>
  </select>
  <label>Ètat :</label>
  <select name="filtre">
    <option selected value="tous">Tous</option>
    <option value="Absent">Absent</option>
    <option value="Présent">Présent</option>
  </select>
  <input type="submit" name="sub" value="chercher">
</form>

<table class="content-table">
  <thead>
    <tr>
      <th>Code Apogée</th>
      <th>Nom</th>
      <th>Numéro d'Examen</th>
      <th>Classe</th>
      <th>Semestre</th>
      <th>Module</th>
      <th>Session</th>
      <th>Ètat</th>
    </tr>
  </thead>

  <tbody>
    <?php
    if (!empty($filtred)) {
      foreach ($filtred as $ligne) {
        echo "<tr>";
        echo "<td>" . $ligne->Apogee . "</td>";
        echo "<td>" . $ligne->Nom . "</td>";
        echo "<td>" . $ligne->num . "</td>";
        echo "<td>" . $ligne->Classe . "</td>";
        echo "<td>" . $ligne->Semestre . "</td>";
        echo "<td>" . $ligne->libelle . "</td>";
        echo "<td>" . $ligne->Session . "</td>";
        echo "<td>" . $ligne->Etat . "</td>";
        echo "</tr>";
      }
    }
    ?>
  </tbody>
</table>



</div>

<?php
include_once('includes/footer.php');
?>