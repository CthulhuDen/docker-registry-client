<?php

namespace Madkom\DockerRegistryApi\Request;

use Madkom\DockerRegistryApi\Request;

/**
 * Class ImageTags
 * @package Madkom\DockerRegistryApi\Request
 * @author  Dariusz Gafka <d.gafka@madkom.pl>
 */
class SearchImages implements Request
{

    /** @var  string */
    private $imageName;

    /**
     * ImageTag constructor
     *
     * @param string $imageName
     * @param string $imageTag
     */
    public function __construct($imageName)
    {
        $this->imageName = $imageName;
    }

    /**
     * @inheritDoc
     */
    public function method()
    {
        return 'GET';
    }

    /**
     * @inheritDoc
     */
    public function uri()
    {
        $imageName = $this->getImageName();

        $uri = "/v2/search/repositories?query=$imageName";

        return $uri;
    }

    /**
     * @inheritDoc
     */
    public function headers()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function data()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function scope()
    {
        return 'repository:' . $this->imageName .':pull';
    }

    /**
     * getter for the imageName
     *
     * @return String
     */
    public function getImageName()
    {
        return $this->imageName;
    }
}
