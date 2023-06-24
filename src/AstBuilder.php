<?php

namespace Sunxyw\ParadoxCode;

use Phplrt\Parser\BuilderInterface;
use Phplrt\Parser\ContextInterface;

class AstBuilder implements BuilderInterface
{
    public function build(ContextInterface $context, $result)
    {
        if (!\is_string($context->getState())) {
            return null;
        }

        $token = $context->getToken();

        /** @var array<SampleNode> $result */
        $result = \is_array($result) ? $result : [$result];

        return new SampleNode($token->getOffset(), (string)$context->getState(), $result);
    }
}
