<?php

declare(strict_types=1);

namespace Sunxyw\ParadoxCode;

use Phplrt\Contracts\Parser\ParserInterface;
use Phplrt\Lexer\Lexer;
use Phplrt\Parser\Parser as Runtime;

final class Parser
{
    private ParserInterface $parser;

    public function __construct()
    {
        $config = require __DIR__ . '/grammar.php';

        $lexer = new Lexer($config['tokens']['default'], $config['skip']);

        $this->parser = new Runtime($lexer, $config['grammar'], [
            Runtime::CONFIG_INITIAL_RULE => $config['initial'],
            Runtime::CONFIG_AST_BUILDER => new AstBuilder(),
        ]);
    }

    public function parse(string $code): iterable
    {
        // remove all lines that start with a hash (may have \s or \t before)
        $code = preg_replace('/#.*\n/', '', $code);
        return $this->parser->parse($code);
    }
}
