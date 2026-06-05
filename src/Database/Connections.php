<?php
// Namespace matches the folder structure relative to 'src/'
namespace App\Database;

class Connections {
    public function connect(): string {
        return "Connected to PostgreSQL database!";
    }
}