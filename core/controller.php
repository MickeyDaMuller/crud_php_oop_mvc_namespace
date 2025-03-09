<?php

// Defining the namespace for the Controller class
namespace controller;

// Importing the PDO class to work with the database
use PDO;

// Importing the Model class from the model namespace
use \model\Model;

// Including the 'model.php' file to load the Model class
require 'model.php';

// Defining the Controller class that extends the Model class
class Controller extends Model
{
    // Method to list items, calls the viewListItems method from the parent Model class
    public function listItems($queries, $array_value)
    {
        return $this->viewListItems($queries, $array_value);
    }

    // Method to insert items, calls the upload method from the parent Model class
    public function insertItems($queries, $array_value)
    {
        return $this->upload($queries, $array_value);
    }

    // Method to create an upload and get the last inserted ID, calls the uploadLastId method
    public function createUploadLastId($queries, $array_value)
    {
        return $this->uploadLastId($queries, $array_value);
    }

    // Method to update items, calls the update method from the parent Model class
    public function updateItems($queries, $array_value)
    {
        return $this->update($queries, $array_value);
    }
}
