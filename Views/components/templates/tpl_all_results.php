<?php 
// si estamos en el admin
if ($pos === false) {

  foreach($matches as $match) {
?>

<tr>
  <td>
    <a href="page_admin.php?view=edit_team&team_id=<?= $match['id_team_home']; ?>"><?= $match['name_team_home']; ?>
    </a>
  </td>
  <td>
    <?php 
    $sc1 = ($match['score_home'] != '') ? $match['score_home'] : 'x';
    $sc2 = ($match['score_visit'] != '') ? $match['score_visit'] : 'x'; 
    
    if ($sc1 == 'x' || $sc2 == 'x') { ?>
      <a href="#"><?= $sc1.'-'.$sc2; ?>
      </a>
    <?php }else{ ?>
      <a href="page_admin.php?view=edit_result&result_id=<?= $match['result_id']; ?>"><?= $sc1.'-'.$sc2; ?>
      </a>
    <?php } ?>
  </td>
  <td>
    <a href="page_admin.php?view=edit_team&team_id=<?= $match['id_team_visit']; ?>"><?= $match['name_team_visit']; ?>
    </a>
  </td>
  <td>
    <?= $match['fixture']; ?>
  </td>
  <td>
    <?php $date = date_create($match['match_date']); ?>
    <?= date_format($date, 'd-m-Y'); ?>
  </td>
</tr>

<?php
  } //end foreach

// si estamos en la home
}else {

  foreach($matches as $match) {
?>
<tr>
  <td>
   <?= $match['name_team_home']; ?> 
  </td>
  <td>
    <?php 
    $sc1 = ($match['score_home'] != '') ? $match['score_home'] : 'x';
    $sc2 = ($match['score_visit'] != '') ? $match['score_visit'] : 'x'; 
    
    if ($sc1 == 'x' || $sc2 == 'x') { ?>
      <?= $sc1.'-'.$sc2; ?>
    <?php }else{ ?>
      <?= $sc1.'-'.$sc2; ?>
    <?php } ?>
  </td>
  <td>
    <?= $match['name_team_visit']; ?>
  </td>
  <td>
    <?= $match['fixture']; ?>
  </td>
  <td>
    <?php $date = date_create($match['match_date']); ?>
    <?= date_format($date, 'd-m-Y'); ?>
  </td>
</tr>
<?php
  } //end foreach
} //end if
?>