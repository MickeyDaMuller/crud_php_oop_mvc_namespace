<?php
// Declares the namespace for this class, which helps in organizing code and avoiding name conflicts
namespace config;

// Imports the PDO (PHP Data Objects) class for database connection
use PDO;

class Database { // Defines a class named 'Database' that handles database connections

    // Constants to store database connection details
    const DBHOST = 'localhost'; // Database host (usually 'localhost' for local servers)
    const DBNAME = ''; // Database name
    const DBUSERNAME = ''; // Database username
    const DBPASSWORD = ''; // Database password

    // Private method to establish a database connection
    private function dbConnection() {
        try {
            // Creates a new PDO object for connecting to MySQL database using defined constants
            $conn = new PDO('mysql:host='.self::DBHOST.';dbname='.self::DBNAME, self::DBUSERNAME, self::DBPASSWORD);
            
            // Sets PDO error mode to exception, so errors throw exceptions instead of silent failures
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Returns the established database connection
            return $conn;
        } 
        catch (PDOException $e) { // Catches any connection errors
            // Displays the error message if the connection fails
            echo "Connection error " . $e->getMessage();
            exit; // Stops the script execution
        }
    }

    // Protected method to provide database connection to child classes
    protected function connection() {
        return $this->dbConnection(); // Calls the private dbConnection method
    }
}
?>
