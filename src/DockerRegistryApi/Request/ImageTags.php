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

    /** @var  string */
    private $imageRepository;

    /**
     * ImageTag constructor
     *
     * @param string $imageName
     * @param string $imageTag
     */
    public function __construct($imageRepository, $imageName, $imageTag = "")
    {
        $this->imageName   = $imageName;
        $this->imageTag    = $imageTag;
        $this->imageRepository  = $imageRepository;
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
        $imageRepository = $this->getImageRepository();
        $imageName = $this->getImageName();
        $imageTag = $this->getImageTag();

        $uri = "/v2/repositories/$imageRepository/$imageName/tags/";

        return (is_null($this->getImageTag()) ? $uri : $uri  . $imageTag . '/');
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

    /**
     * getter for the imageTag
     *
     * @return String
     */
    public function getImageRepository()
    {
        return $this->imageRepository;
    }
}
