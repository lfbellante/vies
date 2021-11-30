<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . DIRECTORY_SEPARATOR . 'tests')
    ->in(__DIR__ . DIRECTORY_SEPARATOR . 'src')
    ->append(['.php-cs-fixer.dist.php']);

$rules = [
    '@Symfony' => true,
    'phpdoc_no_empty_return' => false,
    'array_syntax' => ['syntax' => 'short'],
    'yoda_style' => false,
    'concat_space' => ['spacing' => 'one'],
    'not_operator_with_space' => false,
    'php_unit_method_casing' => ['case' => 'snake_case'],
];

$rules['increment_style'] = ['style' => 'post'];

return (new PhpCsFixer\Config())
    ->setUsingCache(true)
    ->setRules($rules)
    ->setFinder($finder);
