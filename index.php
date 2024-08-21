<?php


header('Content-Type: application/json');
echo json_encode([
    'message' => 'Response request method: ' . $_SERVER["REQUEST_METHOD"]
], JSON_PRETTY_PRINT) . "\n";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $data = json_decode(file_get_contents('php://input'), true);
    
   
    if (json_last_error() === JSON_ERROR_NONE) {
        $response = [
            'message' => 'Response data',
            'data' => $data
        ];
    } else {
        $response = [
            'message' => 'Failed to decode JSON.',
            'error' => json_last_error_msg()
        ];
    }
    
    
    echo json_encode($response, JSON_PRETTY_PRINT);
}

?>
