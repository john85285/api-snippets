<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once '/path/to/vendor/autoload.php'; // Loads the library
use Twilio\Rest\Client;

// Find your credentials at twilio.com/console
$apiKeySid = "SKXXXX";
$apiKeySecret = "your_auth_apiKeySecret";
$client = new Client($apiKeySid, $apiKeySecret);

$compositionHook = $client->video->compositionHooks->create([
    'friendlyName' => 'MyFirstCompositionHook',
    'audioSources' => '*',
    'videoLayout' =>  array(
                        'grid' => array (
                          'video_sources' => array('*')
                        )
                      ),
    'statusCallback' => 'http://my.server.org/callbacks',
    'format' => 'mp4'
]);

echo $compositionHook->sid;
