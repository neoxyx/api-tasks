<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Tarea programada para marcar tareas como atrasadas
Schedule::call(function () {
    $tasks = Task::where('status', '!=', 'completed')
        ->whereDate('due_date', '<', now())
        ->update(['status' => 'delayed']);

    Log::info("Tareas atrasadas actualizadas: " . $tasks);
})->hourly();
