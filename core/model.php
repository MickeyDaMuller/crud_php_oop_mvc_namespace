<?php 
namespace model; // Defines the namespace 'model'
use PDO; // Includes the PDO class for database interaction
use \config\Database; // Includes the Database class from the config namespace

require 'config/dbConnection.php'; // Requires the dbConnection.php file for database connection setup

Class Model extends Database { // Defines the 'Model' class that extends 'Database' class
    protected function upload($query, $array) // Defines a protected 'upload' method
    {
        try {
            $stmt = $this->connection()->prepare($query); // Prepares a database statement
            if($stmt->execute($array)){ // Executes the prepared statement with parameters
                $result = "successful"; // Sets result as successful if execution is successful
            } else {
                $result = "not successful"; // Sets result as not successful if execution fails
            }
            
            return $result; // Returns the result of the operation
        } catch (PDOException $e) { // Catches any PDO exceptions

            return "select error message" . $e->getMessage(); // Returns error message
        }
    }
    
    public function viewListItems($query,$array){ // Defines a public method to view list items
        try {
            $sql = $this->connection()->prepare($query); // Prepares the SQL query
            $sql->execute($array); // Executes the prepared statement with parameters
            if($sql->rowCount() > 0){ // Checks if the query returns any rows
                
                foreach($sql as $row){ // Loops through each row in the result set
                    $res[] = $row; // Adds each row to the result array
                }
                
                if(!empty($res)){ // Checks if the result array is not empty
                    return $res; // Returns the result array
                }
            }
        } catch(PDOException $e) { // Catches any PDO exceptions
            
            echo "Error:" . $e->getMessage(); // Echoes the error message
        }
    }

    protected function uploadLastId($query, $array) // Defines a protected method to upload and return the last insert ID
    {
        $conn = $this->connection(); // Gets the database connection
        try {
            $stmt = $conn->prepare($query); // Prepares the SQL query
            if ($stmt->execute($array)) { // Executes the prepared statement with parameters
                $id =  $conn->lastInsertId(); // Gets the last inserted ID
                $result = $id; // Sets the result to the last insert ID
            } else {
                $result = "not successful"; // Sets result as not successful if execution fails
            }

            return $result; // Returns the result (last insert ID or failure message)
        } catch (PDOException $e) { // Catches any PDO exceptions

            return "select error message" . $e->getMessage(); // Returns error message
        }
    }
    
    protected function update($query, $array) // Defines a protected method for updating records
    {
        try {
            $stmt = $this->connection()->prepare($query); // Prepares the SQL query
            $stmt->execute($array); // Executes the prepared statement with parameters
            if($stmt->rowCount() > 0){ // Checks if the query affected any rows
                $result = "successful"; // Sets result as successful if rows were affected
            } else {
                $result = "not successful"; // Sets result as not successful if no rows were affected
            }

            return $result; // Returns the result
        } catch (PDOException $e) { // Catches any PDO exceptions

            return "select error message" . $e->getMessage(); // Returns error message
        }
    }
    
}
?>
