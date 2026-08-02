<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('trinetra:health', function () {
    $this->info('Trinetra Laravel application is bootable.');
});
