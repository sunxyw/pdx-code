<?php
return [
    'initial' => 'Root',
    'tokens' => [
        'default' => [
            'T_WHITESPACE' => '\\h+',
            'T_COMMENT' => '\\#.*',
            'T_NEWLINE' => '\\n',
            'T_BOOL_TRUE' => 'yes',
            'T_BOOL_FALSE' => 'no',
            'T_FLOAT' => '[0-9]+\\.[0-9]+',
            'T_INTEGER' => '[0-9]+',
            'T_STRING' => '\\w+',
            'T_EQUALS' => '\\=',
            'T_BRACE_OPEN' => '\\{',
            'T_BRACE_CLOSE' => '\\}',
            'T_PLUS' => '\\+',
            'T_MINUS' => '\\-',
            'T_DOUBLE_QUOTE' => '\\"',
        ],
    ],
    'skip' => [
        'T_WHITESPACE',
        'T_COMMENT',
        'T_NEWLINE',
    ],
    'transitions' => [
        
    ],
    'grammar' => [
        0 => new \Phplrt\Parser\Grammar\Alternation([17, 18]),
        1 => new \Phplrt\Parser\Grammar\Concatenation([22, 23]),
        3 => new \Phplrt\Parser\Grammar\Alternation([12, 16]),
        4 => new \Phplrt\Parser\Grammar\Alternation(['Object', 'Array', 0, 1, 2, 3]),
        5 => new \Phplrt\Parser\Grammar\Lexeme('T_EQUALS', false),
        6 => new \Phplrt\Parser\Grammar\Lexeme('T_BRACE_OPEN', false),
        7 => new \Phplrt\Parser\Grammar\Repetition('Pair', 0, INF),
        8 => new \Phplrt\Parser\Grammar\Lexeme('T_BRACE_CLOSE', false),
        9 => new \Phplrt\Parser\Grammar\Lexeme('T_BRACE_OPEN', false),
        10 => new \Phplrt\Parser\Grammar\Repetition(4, 0, INF),
        11 => new \Phplrt\Parser\Grammar\Lexeme('T_BRACE_CLOSE', false),
        12 => new \Phplrt\Parser\Grammar\Lexeme('T_STRING', true),
        13 => new \Phplrt\Parser\Grammar\Lexeme('T_DOUBLE_QUOTE', false),
        14 => new \Phplrt\Parser\Grammar\Lexeme('T_STRING', true),
        15 => new \Phplrt\Parser\Grammar\Lexeme('T_DOUBLE_QUOTE', false),
        16 => new \Phplrt\Parser\Grammar\Concatenation([13, 14, 15]),
        17 => new \Phplrt\Parser\Grammar\Lexeme('T_BOOL_TRUE', true),
        18 => new \Phplrt\Parser\Grammar\Lexeme('T_BOOL_FALSE', true),
        19 => new \Phplrt\Parser\Grammar\Lexeme('T_PLUS', true),
        20 => new \Phplrt\Parser\Grammar\Lexeme('T_MINUS', true),
        21 => new \Phplrt\Parser\Grammar\Alternation([19, 20]),
        22 => new \Phplrt\Parser\Grammar\Optional(21),
        23 => new \Phplrt\Parser\Grammar\Lexeme('T_FLOAT', true),
        24 => new \Phplrt\Parser\Grammar\Lexeme('T_INTEGER', true),
        'Array' => new \Phplrt\Parser\Grammar\Concatenation([9, 10, 11]),
        'Object' => new \Phplrt\Parser\Grammar\Concatenation([6, 7, 8]),
        'Pair' => new \Phplrt\Parser\Grammar\Concatenation([3, 5, 4]),
        'Root' => new \Phplrt\Parser\Grammar\Repetition('Pair', 0, INF),
        2 => new \Phplrt\Parser\Grammar\Concatenation([22, 24])
    ],
    'reducers' => [

    ]
];