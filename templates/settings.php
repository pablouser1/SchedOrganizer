<?php $this->layout('layout', ["title" => "Settings"]) ?>

<form action="<?= $this->e($_SERVER['REQUEST_URI']) ?>" method="POST">
  <fieldset>
    <label>
      Week starts on
      <select name="weekday-offset" aria-label="Select a weekday" required>
        <?php foreach ($weekdays as $i => $w): ?>
          <option value="<?= $this->e($i) ?>" <?= $offset === $i ? "selected" : "" ?>><?= $this->e($w->name) ?></option>
        <?php endforeach ?>
      </select>
    </label>
  </fieldset>

  <input type="submit" value="Save" />
</form>
