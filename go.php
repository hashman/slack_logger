<?php
require_once __DIR__ .'/vendor/autoload.php';

$message = (string) $argv[1];
if ($message == '') {
    exit;
}

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

if (strpos($message, 'ERROR') !== false) {
    $message = "<!here> {$message}";
}

$hook_url = getenv('HOOK_URL');
$channel_name = getenv('CHANNEL_NAME');
$from_name = getenv('FROM_NAME');

$client = new \Maknz\Slack\Client($hook_url);
$client->from($from_name)
    ->to($channel_name)
    ->withIcon(':scream:')
    ->enableMarkdown()
    ->send($message);
