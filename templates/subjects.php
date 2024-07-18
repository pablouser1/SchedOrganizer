<?php $this->layout('layout', ["title" => "Weekday"]) ?>

<div class="grid two-cols">
  <?php foreach ($sbjs as $sbj): ?>
    <article>
      <header>
        <hgroup style="margin-bottom:unset">
          <p><strong><?= $this->e($sbj["short_name"]) ?></strong></p>
        </hgroup>
      </header>
      <section>
        <p>Full name: <?= $this->e($sbj["name"]) ?></p>
        <?php if ($sbj['url'] !== null): ?>
          <a class="secondary" href="<?= $this->e($sbj['url']) ?>">URL</a>
        <?php endif ?>
      </section>
      <section>
        <p>Group: <?= $this->e($this->group_str($sbj["group"])) ?></p>
      </section>
      <section>
        <!-- TODO: Make many to many -->
        <p>Rooms:</p>
        <ul>
          <?php foreach ($sbj["rooms"] as $room): ?>
            <li><?= $this->e($room["location"]) ?> - <?= $this->e($room["description"]) ?></li>
          <?php endforeach ?>
        </ul>
      </section>
    </article>
  <?php endforeach ?>
</div>
