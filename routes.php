<?php
use App\Controllers\HomeController;
use App\Controllers\SettingsController;
use App\Controllers\SubjectController;
use App\Controllers\TableController;
use App\Controllers\WeekdayController;

$router->get("/", [HomeController::class, "get"]);
$router->get("/subjects", [SubjectController::class, "get"]);
$router->get("/weekdays/(\d+)", [WeekdayController::class, "get"]);
$router->get("/settings", [SettingsController::class, "get"]);
$router->post("/settings", [SettingsController::class, "post"]);
$router->get("/table", [TableController::class, "get"]);
