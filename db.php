<?php
try {
    // 1. Connect to SQLite (this will automatically create 'contacts.db' if it doesn't exist yet)
    $dbPath = __DIR__ . '/contacts.db';
    $pdo = new PDO('sqlite:' . $dbPath);
    
    // Set error mode to throw exceptions if something goes wrong
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Automatically create the table with your required schema if it doesn't exist
    $query = "CREATE TABLE IF NOT EXISTS contacts (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        full_name TEXT NOT NULL,
        email TEXT,
        phone_number TEXT,
        company TEXT,
        address TEXT
    )";
    
    // Execute the query
    $pdo->exec($query);

} catch (PDOException $e) {
    // Stop the page and show an error if connection or table creation fails
    die("Database setup failed: " . $e->getMessage());
}
?>