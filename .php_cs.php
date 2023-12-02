<?php

    declare(strict_types = 1);

    $header = <<<'EOF'
@author Coco
EOF;

    $finder = PhpCsFixer\Finder::create()->in(['src']) // 作用域，__DIR__ 项目根目录
//        ->name('*.php')          // 作用的文档
//        ->notName('*.blade.php') // 禁用的文档
//        ->exclude('vendor') // 排除的目录
    ;

    return (new PhpCsFixer\Config())->setUsingCache(false)->setRiskyAllowed(true) // 允许设置有风险的规则
    ->setRules([
        '@PhpCsFixer' => true,

        'header_comment' => [
            'header'       => $header,
            'comment_type' => 'PHPDoc',
        ],

        'declare_strict_types'       => true,
        'binary_operator_spaces'     => [
            'operators' => [
                '='   => 'align_single_space_minimal',
                '.='  => 'align_single_space_minimal',
                '=>'  => 'align_single_space_minimal',
                '??'  => 'align_single_space_minimal',
                '??=' => 'align_single_space_minimal',
            ],
        ],
        'no_superfluous_phpdoc_tags' => false,
        'phpdoc_separation'          => false,
        'php_unit_construct'         => true,
        'php_unit_strict'            => true,
    ])->setFinder($finder);
