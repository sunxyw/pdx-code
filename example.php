<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

$sample = <<<'SAMPLE'
energy = {
	tradable = yes
	category = basic
	max = 50000

	deficit_situation = situation_energy_deficit

	ai_weight = {
		weight = 1.5
	}

	ai_wants = {
		base = 500
	}
}
SAMPLE;


$parser = new \Sunxyw\ParadoxCode\Parser();
$ast = $parser->parse($sample);

echo $ast;
