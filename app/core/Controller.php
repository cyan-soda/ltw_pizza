<?php

class Controller
{
    public function model($model)
    {
        require_once "./app/models/" . $model . ".php";
        return new $model;
    }

    public function view($view, $data = [])
    {
        // require_once "./app/views/" . $view . ".php";
        // return new $view;

        // Construct the path to the view file
        $viewFile = "./app/views/" . $view . ".php";

        // Check if the file exists
        if (file_exists($viewFile)) {
            // Extract data variables for use in the view
            extract($data);

            // Load the view file
            require_once $viewFile;
        } else {
            // Handle the case where the view file doesn't exist
            echo "View file not found: " . $viewFile;
        }
    }
}

?>