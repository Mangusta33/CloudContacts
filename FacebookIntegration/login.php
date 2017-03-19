<?php
/**
 * Created by PhpStorm.
 * User: Simone
 * Date: 19/03/2017
 * Time: 18:23
 */
$fb = new Facebook\Facebook([
    'app_id' => '444824062515918', // Replace {app-id} with your app id
    'app_secret' => '7962b41172f3a5bb9362939652e3f1ce',
    'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';