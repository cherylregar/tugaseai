<?php

use Illuminate\Support\Facades\DB;

try {
    DB::connection()->getPdo();
    echo "Database connection is successful.";
} catch (\Exception $e) {
    echo "Could not connect to the database. Please check your configuration.";
}
