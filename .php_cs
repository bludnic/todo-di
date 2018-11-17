<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('.cache')
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setUsingCache(false)
    ->setIndent("  ")
    ->setRules([
        '@Symfony' => true,
        'full_opening_tag' => false,
        'array_indentation' => true,
        'method_chaining_indentation' => true,
        'method_argument_space' => [
          'on_multiline' => 'ensure_fully_multiline'
        ],
        'yoda_style' => false,
        'braces' => [
            'position_after_functions_and_oop_constructs' => 'same'
        ],
        'concat_space' => [
            'spacing' => 'one'
        ],
        'trailing_comma_in_multiline_array' => false,
        'phpdoc_no_empty_return' => false,
        'phpdoc_separation' => false,
        'phpdoc_align' => [
            'align' => 'left'
        ]
    ])
    ->setFinder($finder)
;