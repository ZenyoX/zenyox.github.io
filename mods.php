<?php
const EXTFILES_URL = 'https://zenyox.github.io/';
const EXTFILES_FOLDER = __DIR__ . '/mods';
$json = [
    'mods' => []
];
$mods = [];
$directory = array_diff(scandir(MODS_FOLDER), ['.', '..']);
foreach ($directory as $file) {
    $mods[] = $file;
}
foreach ($mods as $mod) {
    $json['mods'][] = [
        'path' => $mod,
        'downloadURL' => MODS_URL . '/' . $mod,
        'sha1' => sha1_file(MODS_FOLDER . '/' . $mod),
        'size' => filesize(MODS_FOLDER . '/' . $mod)
    ];
}
header('Content-Type: application/json');
echo json_encode($json);