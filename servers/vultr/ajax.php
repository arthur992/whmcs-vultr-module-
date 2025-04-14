<?php
require_once __DIR__ . '/class/VultrHandler.php';

if ($_GET['action'] == 'loadOptions') {
    $handler = new VultrHandler();

    header('Content-Type: application/json');
    echo json_encode([
        'regions' => $handler->getRegions(),
        'plans' => $handler->getPlans(),
        'apps' => $handler->getApplications()
    ]);
    exit;
}
