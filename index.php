<?php
declare(strict_types = 1);
namespace Superiocity\LEDomainList2CommandArg;


if ($argc !== 2) {
    exit('Invalid arguments.' . PHP_EOL);
}

$input_path = $argv[1];

if (!file_exists($input_path)) {
    exit('Invalid input file path.' . PHP_EOL);
}

$base_domains = explode("\n", file_get_contents($input_path));

$full_domain_list = [];

foreach ($base_domains as $domain) {
    if ($domain === '') {
        continue;
    }

    $full_domain_list[] = $domain;
    $full_domain_list[] = 'www.' . $domain;
}

$domain_chunks = array_chunk($full_domain_list, 100);

$file_number = 1;

foreach ($domain_chunks as $chunk) {
    $output_handler = fopen('domain-output' . $file_number . '.txt', 'w+');
    fputs($output_handler, join(',', $chunk));
    fclose($output_handler);
    ++$file_number;
}
