<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="color-scheme" content="light dark">
  <title><?= $this->e($title) ?> - SchedOrganizer</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
  <link rel="stylesheet" href="/css/index.css">
  <?= $this->section("js") ?>
</head>

<body>
  <header class="container">
    <nav>
      <ul>
        <li><a href="/">SchedOrganizer</a></li>
        <li><?= $this->version() ?></li>
      </ul>
      <ul>
        <li><a href="/table">Table</a></li>
        <li><a href="/settings">Settings</a></li>
        <li><a href="/subjects">Subjects</a></li>
        <li><a href="https://github.com/pablouser1/SchedOrganizer">Source</a></li>
      </ul>
    </nav>
  </header>
  <main class="container">
    <?= $this->section('content') ?>
  </main>
</body>

</html>
