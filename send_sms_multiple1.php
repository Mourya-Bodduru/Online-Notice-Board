<?php
include("config.php");
$a = mysqli_query($gmr, "SELECT contact FROM sms");
// Check if the query was successful
if ($a) {
    // Initialize an empty array to store the column values
    $recipientArray = array();

    // Fetch and store each row's column value in the array
    while ($row = mysqli_fetch_assoc($a)) {
        $recipientArray[] = $row['contact'];
    }

    // Now $recipientArray contains the values from the selected column
    foreach ($recipientArray as $value) {
        echo $value . "\n";
    }
} else {
    echo "No results found.";
}

// Close the first query result
mysqli_free_result($a);

$apiSecret = "60ddb5effc281f4ac1a8ff8d96e0b2c411c93652"; // your API secret from (Tools -> API Keys) page
$message = "𝙔𝙤𝙪 𝙝𝙖𝙫𝙚 𝙖 𝙉𝙤𝙩𝙞𝙘𝙚 𝙛𝙧𝙤𝙢 𝙂𝙈𝙍 𝙊𝙣𝙡𝙞𝙣𝙚 𝙉𝙤𝙩𝙞𝙘𝙚 𝘽𝙤𝙖𝙧𝙙..";

foreach ($recipientArray as $recipient) {
    $data = [
        "secret" => $apiSecret,
        "mode" => "devices",
        "device" => "00000000-0000-0000-3c18-cf9251d0cf9b",
        "sim" => 2,
        "priority" => 1,
        "phone" => $recipient,
        "message" => $message
    ];

    $cURL = curl_init("https://www.cloud.smschef.com/api/send/sms");
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cURL, CURLOPT_POSTFIELDS, $data);
    $response = curl_exec($cURL);
    curl_close($cURL);

    $result = json_decode($response, true);

    // Check and handle the API response as needed for each recipient.
    if ($result && isset($result['success']) && $result['success']) {
        echo "SMS send  to $recipient: " . (isset($result['message']) ? $result['message'] : "Unknown error") . "<br>";
    } else {
        echo "SMS sent successfully to $recipient!<br>";
    }
}
?>
