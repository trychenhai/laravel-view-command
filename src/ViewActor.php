<?php

namespace Chenhaitry\LaravelCommand;

abstract class ViewActor
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * ViewActor constructor.
     *
     * @param Config $config
     * @param string $path
     */
    public function __construct(Config $config, $path)
    {
        $this->config = $config;
        $this->config->setPath($path);
    }

    /**
     * @return array
     */
    protected function getViews()
    {
        if (! $this->config->isResource()) {
            return [$this->config->getName()];
        }

        return array_map(function ($view) {
            return $this->config->getName().'.'.$view;
        }, $this->config->getVerbs());
    }

    /**
     * @param array $names
     *
     * @return array
     */
    protected function getViewNames(array $names)
    {
        return array_map(function ($name) {
            $name = str_replace('.', '/', $name);

            return $name.$this->config->getExtension();
        }, $names);
    }
}
