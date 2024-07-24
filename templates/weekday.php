<?php $this->start('js') ?>
<script src="/js/time.js"></script>
<script defer src="/js/weekday.js"></script>
<?php $this->stop() ?>

<?php $this->layout('layout', ["title" => "Weekday"]) ?>

<div class="grid two-cols">
  <?php foreach ($schds as $schd): ?>
    <article>
      <header>
        <hgroup style="margin-bottom:unset">
          <p><strong><?= $this->e($schd->subject->name) ?></strong></p>
          <p class="secondary">
            <?= $this->e($schd->timezone->full) ?>
          </p>
        </hgroup>
      </header>
      <?php if ($weekday === $schd->weekday): ?>
        <section class="schedule" data-schd="<?= htmlspecialchars($schd->toJson(), ENT_QUOTES, 'UTF-8') ?>">
          Loading...
        </section>
      <?php endif ?>
    </article>
  <?php endforeach ?>
</div>
