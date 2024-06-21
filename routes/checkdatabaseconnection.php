<?php

use Illuminate\Support\Facades\DB;

try {
    DB::connection()->getPdo();
    echo "Successfully connected to the database!";
} catch (\Exception $e) {
    die("Could not connect to the database. Error: " . $e->getMessage());
}
