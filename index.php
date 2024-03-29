<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <title>devoir</title>
</head>
<body>
<div class="fotsy">
  <form method="post" action="">
    <label for="">nom :</label>
    <input type="text" name="nom"><br><br>
    <label for="">prenom :</label>
    <input type="text" name="prenom"><br><br>
    <label for="">age :</label>
    <input type="number" name="age"><br><br>
    <label for="">race :</label>
    <input type="text" name="race"><br><br>
    <label for="">pays :</label>
    <input type="text" name="pays"><br><br>
    <input type="submit" class="boutton" value="ENREGISTRER" name="enregistrer">
  </form>

  <?php
  include("connex.php");

  // Registration logic
  if (isset($_POST["enregistrer"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $age = $_POST["age"];
    $race = $_POST["race"];
    $pays = $_POST["pays"];

    if ($nom != "" && $prenom != "" && $age != "" && $race != "" && $pays != "") {
      $insert = $connex->prepare("INSERT INTO info(nom, prenom, age, race, pays) VALUES(?,?,?,?,?)");
      $insert->execute([$nom, $prenom, $age, $race, $pays]);
    } else {
      echo "Please fill out all fields.";
    }
  }
  if (isset($_GET["supprimer"])) {
    $id = $_GET["supprimer"]; 

    $delete = $connex->prepare("DELETE FROM info WHERE rang = ?");
    $delete->execute([$id]);
    header("Location: index.php");  
  }
  ?>
 
  <div class="resultat">
    <table border="1">
      <tr>
        <th>rang</th>
        <th>nom</th>
        <th>prenom</th>
        <th>age</th>
        <th>race</th>
        <th>pays</th>
        <th>edition</th>
      </tr>

      <?php
      $select = $connex->prepare("SELECT * FROM info ");
      $select->execute();
      $tab_select = $select->fetchAll();
      $nb_tab = count($tab_select);

      for ($i = 0; $i < $nb_tab; $i++) {
        $id = $tab_select[$i]["rang"]; 
      ?>
        <tr>
          <td><?php echo $tab_select[$i]["rang"] ?></td>
          <td><?php echo $tab_select[$i]["nom"] ?></td>
          <td><?php echo $tab_select[$i]["prenom"] ?></td>
          <td><?php echo $tab_select[$i]["age"] ?></td>
          <td><?php echo $tab_select[$i]["race"] ?></td>
          <td><?php echo $tab_select[$i]["pays"] ?></td>
          <td>
            <a href="index.php?supprimer=<?php echo $id ?>">supprimer</a> </td>                  
            
        </tr>
      <?php
      }
      ?>
    </table>
  </div>
</div>

</body>
</html>
