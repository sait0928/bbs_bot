<?php

require_once __DIR__ . '/vendor/autoload.php';

use Goutte\Client;

$cli = new Client();
$top = $cli->request('GET', 'http://192.168.33.10/login_form');
$loginForm = $top->filter('form')->form();
$loginForm['email'] = 'test@test.co.jp';
$loginForm['pass'] = 'test0123';
$cli->submit($loginForm);

$home = $cli->request('GET', 'http://192.168.33.10/');
$postForm = $home->filter('form')->form();
$postForm['text'] = '勉強して偉い！';
$cli->submit($postForm);
