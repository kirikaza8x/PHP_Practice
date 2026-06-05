<?php
namespace App\Models;

// We need to import the Connection class from another namespace
use App\Database\Connections;

class User {
    private Connections $db;

    public function __construct() {
        // Because we used 'use App\Database\Connection', we can just say new Connection()
        $this->db = new Connections();
    }

    public function getInfo(): string {
        return "User Model initialized. " . $this->db->connect();
    }
}