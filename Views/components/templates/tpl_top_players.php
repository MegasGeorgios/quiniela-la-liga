<?php
$url = $_SERVER['HTTP_REFERER'];
$pos = strpos($url, 'home.php');

// si estamos en el admin
if ($pos === false) {

  foreach($players as $index => $player) { 
?>

<tr>
  <td><a href="page_admin.php?view=edit_player&player_id=<?= $player['id']; ?>"><?= $index+1 ?></a></td>
  <td><a href="page_admin.php?view=edit_player&player_id=<?= $player['id']; ?>"><?= $player['name'] ?></a></td>
  <td><a href="page_admin.php?view=edit_player&player_id=<?= $player['id']; ?>"><?= $player['dorsal'] ?></a></td>
  <td><a href="page_admin.php?view=edit_player&player_id=<?= $player['id']; ?>"><?= $player['name_team'] ?></a></td>
  <!--Si estamos en la vista de top goleadores pintamos los goles si no las asistencias-->
  <?php if($_GET['view'] == 'all_players-goals'){ ?>
  <td><a href="page_admin.php?view=edit_player&player_id=<?= $player['id']; ?>"><?= $player['goals'] ?></a></td>
  <?php }else{ ?>
  <td><a href="page_admin.php?view=edit_player&player_id=<?= $player['id']; ?>"><?= $player['asists'] ?></a></td>
  <?php } ?>
</tr>

<?php
  } //end foreach

// si estamos en la home
}else {

  foreach($players as $index => $player) {
?>

<tr>
  <td><?= $index+1 ?></td>
  <td><?= $player['name'] ?></td>
  <td><?= $player['dorsal'] ?></td>
  <td><?= $player['name_team'] ?></td>
  <!--Si estamos en la vista de top goleadores pintamos los goles si no las asistencias-->
  <?php if($_GET['view'] == 'all_players-goals'){ ?>
  <td><?= $player['goals'] ?></td>
  <?php }else{ ?>
  <td><?= $player['asists'] ?></td>
  <?php } ?>
</tr>

<?php
  } //end foreach
} //end if
?>