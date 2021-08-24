<?php

namespace Chenhaitry\LaravelCommand;

use Chenhaitry\LaravelCommand\Blocks\Block;

class BlockBuilder
{
    /**
     * @param Block[] $blocks
     *
     * @return string
     */
    public static function build($blocks)
    {
        return array_reduce($blocks, function ($carry, Block $block) {
            return $carry.$block->render();
        }, '');
    }
}
