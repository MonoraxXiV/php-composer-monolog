<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use MonoLog\Handler\NativeMailerHandler;

//use MonoLog\Handler\BrowserConsoleHandler;

$logger = new Logger('main');

if (isset($_GET['message'])) {
    $message = $_GET['message'];
    $button = $_GET['type'];
    switch ($button) {
        case 'DEBUG':
            $logger->pushHandler(new StreamHandler('logs/info.log', Logger::DEBUG));
            //$logger->pushHandler(new MonoLog\Handler\BrowserConsoleHandler(Logger::DEBUG));
            $logger->debug($message);
            break;

        case 'INFO':
            $logger->pushHandler(new StreamHandler('logs/info.log', Logger::INFO));
            $logger->info($message);
            break;
        case 'NOTICE':
            $logger->pushHandler(new StreamHandler('logs/info.log', Logger::NOTICE));
            $logger->notice($message);
            break;

        case 'WARNING':
            $logger->pushHandler(new StreamHandler('logs/warning.log', Logger::WARNING));
            $logger->warning($message);
            break;

        case 'ERROR':
            $logger->pushHandler(new StreamHandler('logs/warning.log', Logger::ERROR));
            $logger->error($message);
            break;
        case 'CRITICAL':
            $logger->pushHandler(new StreamHandler('logs/warning.log', Logger::CRITICAL));
            $logger->critical($message);
            break;
        case 'ALERT':
            $logger->pushHandler(new StreamHandler('logs/warning.log', Logger::ALERT));
            $logger->alert($message);
            break;
        case 'EMERGENCY':
            $logger->pushHandler(new StreamHandler('logs/emergency.log', Logger::EMERGENCY));
            $logger->emergency($message);
            break;
    };


}
require 'View/buttons.html';