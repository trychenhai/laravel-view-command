<?php

namespace Chenhaitry\LaravelCommand;

class Generator extends ViewActor
{
    /**
     * @param BlockStack $blockStack
     */
    public function generate(BlockStack $blockStack)
    {
        $views = $this->getViews();

        $this->makeViews(
            $this->getViewNames($views), $blockStack->all()
        );
    }

    /**
     * @param array                            $names
     * @param \Chenhaitry\LaravelCommand\Blocks\Block[] $blocks
     */
    protected function makeViews(array $names, array $blocks)
    {
        $contents = BlockBuilder::build($blocks);

        foreach ($names as $name) {
            $path = PathHelper::normalizePath($this->config->getPath().DIRECTORY_SEPARATOR.$name);
            PathHelper::createIntermediateFolders($path);

            file_put_contents($path, $contents);
        }
    }
}
