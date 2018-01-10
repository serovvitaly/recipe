<?php

$siteMapUrl = 'https://kedem.ru/sitemap.xml';

$siteMaps = [
    'wowfood.club' => 'https://wowfood.club/sitemap.xml',
    'kedem.ru' => 'https://kedem.ru/sitemap.xml',
];

$siteMap = simplexml_load_file($siteMapUrl);

$counter = 1;
foreach ($siteMap->url as $url) {
    $locUrlPath = parse_url($url->loc, PHP_URL_PATH);
    if (substr($locUrlPath, 1, 6) !== 'recipe') {
        continue;
    }
    echo $counter . '. ' . $url->loc, PHP_EOL;
    $htmlFileName = 'html/' . str_replace('/', '__', trim(substr($locUrlPath, 7), '/')) . '.html';
    file_put_contents($htmlFileName, file_get_contents($url->loc));
    $counter++;
}
