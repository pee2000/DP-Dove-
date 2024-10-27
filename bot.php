<?php
// Define your bot token
$botToken = "7897253657:AAEO3h-LCzSCnEgeMX6zgI5JOUBf_FWz_Lo";

// Define the API URL
$apiURL = "https://api.telegram.org/bot$botToken/";

// Fetch and decode the update (incoming message)
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if (!$update) {
    exit;
}

// Extract details about the incoming message
$message = $update["message"];
$chatId = $message["chat"]["id"];
$text = $message["text"];

// Example response based on received text
if (strpos(strtolower($text), "/start") === 0) {
    $responseText = "Hello! I'm here to assist you.";
} else {
    $responseText = "You said: $text";
}

// Prepare and send response
$responseData = [
    'chat_id' => $chatId,
    'text' => $responseText
];

// Use CURL to send the response
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiURL . "sendMessage");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($responseData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute and close CURL
curl_exec($ch);
curl_close($ch);

?>
