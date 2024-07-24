<?php $this->layout('layout', ["title" => "Table"]) ?>
<table class="striped">
  <thead>
    <tr>
      <th scope="col">-</th>
      <?php foreach($weekdays as $weekday): ?>
        <th scope="col"><?=$this->e($weekday->name)?></th>
      <?php endforeach ?>
    </tr>
  </thead>
</table>
