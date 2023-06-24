<?php

declare(strict_types=1);

use Phplrt\Compiler\Compiler;

const ROOT_DIRECTORY = __DIR__ . '/..';
const COMPOSER_AUTOLOADER = ROOT_DIRECTORY . '/vendor/autoload.php';
const GRAMMAR_OUTPUT = ROOT_DIRECTORY . '/src/grammar.php';

if (!is_file(COMPOSER_AUTOLOADER)) {
    throw new \LogicException('Composer need to be installed');
}

require COMPOSER_AUTOLOADER;

if (!class_exists(Compiler::class)) {
    throw new \LogicException('Composer dev-dependencies need to be installed');
}

$compiler = new Compiler();

$sample = file_get_contents(__DIR__ . '/sample.pdxc');
// remove all lines that start with a hash (may have \s or \t before)
$sample = preg_replace('/#.*\n/', '', $sample);

$compiler->load(\Phplrt\Source\File::fromPathname(__DIR__ . '/grammar.pp2'));

$assembly = $compiler->build();

file_put_contents(GRAMMAR_OUTPUT, $assembly->generate());
