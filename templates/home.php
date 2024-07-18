<?php $this->layout('layout', ["title" => "Home"]) ?>

<div class="grid two-cols">
  <?php foreach ($weekdays as $i => $w): ?>
    <a class="<?= $i === $weekday ? 'focused' : '' ?>" role="button" href="/weekdays/<?= $this->e($w->value) ?>"><?= $this->e($w->name) ?></a>
  <?php endforeach ?>
</div>
