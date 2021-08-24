<?php

namespace Chenhaitry\LaravelCommand;

use Chenhaitry\LaravelCommand\Blocks\Block;
use Chenhaitry\LaravelCommand\Voters\ExtendsParent;
use Chenhaitry\LaravelCommand\Voters\SectionsInParent;
use Chenhaitry\LaravelCommand\Voters\StacksFromParent;
use Chenhaitry\LaravelCommand\Voters\Voter;
use Chenhaitry\LaravelCommand\Voters\YieldsFromParent;
use Symfony\Component\Console\Input\InputInterface;

class BlockStack
{
    /**
     * @var Block[]
     */
    protected $blocks = [];

    /**
     * @param InputInterface $input
     * @param string $path
     *
     * @return BlockStack
     */
    public function build(InputInterface $input, $path)
    {
        $voters = [
            new ExtendsParent,
            new YieldsFromParent,
            new StacksFromParent,
            new SectionsInParent,
        ];

        /** @var Voter $voter */
        foreach ($voters as $voter) {
            if (! $voter->canHandle($input)) {
                continue;
            }

            $voter->inPath($path)->run($input, $this);
        }

        return $this;
    }

    /**
     * @param Block[] ...$blocks
     *
     * @return BlockStack
     */
    public function add(Block ...$blocks)
    {
        foreach ($blocks as $block) {
            $this->blocks[] = $block;
        }

        return $this;
    }

    /**
     * @return Block[]
     */
    public function all()
    {
        return $this->blocks;
    }
}
