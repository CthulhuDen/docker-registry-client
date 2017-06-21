<?php

namespace Madkom\DockerRegistryApi\Request;

use Madkom\DockerRegistryApi\Request;

/**
 * Class ImageTags
 * @package Madkom\DockerRegistryApi\Request
 * @author  Dariusz Gafka <d.gafka@madkom.pl>
 */
class ImageTags implements Request
{

    /** @var  string */
    private $imageName;

    /** @var  string */
    private $imageTag;

    /**
     * ImageTag constructor
     *
     * @param string $imageName
     * @param string $imageTag
     */
    public function __construct($imageName, $imageTag = "")
    {
        $this->imageName = $imageName;
        $this->imageTag  = $imageTag;
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
        $uri = '/v2/repositories/' . $this->imageName . '/tags';
        return (is_null($this->getImageTag()) ? $uri : $uri . '/' . $this->getImageTag() . '/');
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

    /**
     * getter for the imageTag
     *
     * @return String || null
     */
    public function getImageTag()
    {
        return $this->imageTag;
    }
}
