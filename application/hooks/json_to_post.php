<?php
function convert_json_to_post() {
    // Get raw input data
    $rawInput = file_get_contents('php://input');
    
    // Decode JSON only if it's a JSON request
    if (!empty($rawInput)) {
        $jsonData = json_decode($rawInput, true);
       
        // If valid JSON, merge it into $_POST
        if (is_array($jsonData)) {
            $_POST = array_merge($_POST, $jsonData);
        }
    }
}
?>
