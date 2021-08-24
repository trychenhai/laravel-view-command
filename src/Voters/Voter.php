<?php

namespace Chenhaitry\LaravelCommand\Voters;

use Chenhaitry\LaravelCommand\BlockStack;
use Symfony\Component\Console\Input\InputInterface;

interface Voter
{
    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     *
     * @return bool
     */
    public function canHandle(InputInterface $input);

    /**
     * @param string $path
     *
     * @return \Chenhaitry\LaravelCommand\Voters\Voter
     */
    public function inPath($path);

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Chenhaitry\LaravelCommand\BlockStack $blockStack
     *
     * @return void
     */
    public function run(InputInterface $input, BlockStack $blockStack);
}
