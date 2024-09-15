<?php
use App\Controllers\HomeController;
use App\Controllers\SettingsController;
use App\Controllers\SubjectController;
use App\Controllers\WeekdayController;

$router->get('/', [HomeController::class, 'index']);
$router->get('/subjects', [SubjectController::class, 'index']);
$router->get('/weekdays/(\d+)', [WeekdayController::class, 'index']);
$router->get('/settings', [SettingsController::class, 'index']);
$router->post('/settings', [SettingsController::class, 'post']);
