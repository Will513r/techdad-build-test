<?php
/**
 * Hot Reload Checker - Summit Exterior Cleaning LLC
 * Returns the maximum last modified timestamp of project files.
 */
header("Content-Type: application/json");
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

$base_dir = dirname(__DIR__);
$dirs = [
    $base_dir,
    $base_dir . '/includes',
    $base_dir . '/data',
    $base_dir . '/services',
    $base_dir . '/assets/css',
    $base_dir . '/assets/js',
    $base_dir . '/blog'
];

$max_mtime = 0;

foreach ($dirs as $dir) {
    if (!is_dir($dir)) continue;
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..' || $item === '.git') continue;
        $path = $dir . '/' . $item;
        if (is_file($path)) {
            // Exclude temporary or log files
            if (str_contains($item, 'leads_log.txt')) continue;
            
            $mtime = filemtime($path);
            if ($mtime > $max_mtime) {
                $max_mtime = $mtime;
            }
        }
    }
}

echo json_encode(['mtime' => $max_mtime]);
exit;
?>
