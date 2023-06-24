# Paradox Code

A PHP library to parse (decode) Paradox-format code, includes Pdxtxt.

Powered by [phplrt](https://github.com/phplrt/phplrt).

## Installation

```bash
composer require sunxyw/pdx-code
```

## Usage

```php
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
```

`$ast` is actually an array, but will converted to XML format AST when `echo`ed.
```xml

<Root offset="0">
    <Pair offset="0">
        <T_STRING offset="0">energy</T_STRING>
        <Object offset="9">
            <Pair offset="12">
                <T_STRING offset="12">tradable</T_STRING>
                <T_BOOL_TRUE offset="23">yes</T_BOOL_TRUE>
            </Pair>
            <Pair offset="28">
                <T_STRING offset="28">category</T_STRING>
                <T_STRING offset="39">basic</T_STRING>
            </Pair>
            <Pair offset="46">
                <T_STRING offset="46">max</T_STRING>
                <T_INTEGER offset="52">50000</T_INTEGER>
            </Pair>
            <Pair offset="60">
                <T_STRING offset="60">deficit_situation</T_STRING>
                <T_STRING offset="80">situation_energy_deficit</T_STRING>
            </Pair>
            <Pair offset="107">
                <T_STRING offset="107">ai_weight</T_STRING>
                <Object offset="119">
                    <Pair offset="123">
                        <T_STRING offset="123">weight</T_STRING>
                        <T_FLOAT offset="132">1.5</T_FLOAT>
                    </Pair>
                </Object>
            </Pair>
            <Pair offset="141">
                <T_STRING offset="141">ai_wants</T_STRING>
                <Object offset="152">
                    <Pair offset="156">
                        <T_STRING offset="156">base</T_STRING>
                        <T_INTEGER offset="163">500</T_INTEGER>
                    </Pair>
                </Object>
            </Pair>
        </Object>
    </Pair>
</Root>
```
