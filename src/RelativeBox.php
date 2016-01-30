<?php

/*
 * This file is part of Contao.
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Contao\CoreBundle\ImagineSvg;

use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use Imagine\Image\PointInterface;
use Imagine\Exception\InvalidArgumentException;

/**
 * Relative Box
 */
class RelativeBox implements RelativeBoxInterface
{
    /**
     * @var Box
     */
    private $box;

    /**
     * Constructs the Size with given width and height
     *
     * @param integer $width
     * @param integer $height
     *
     * @throws InvalidArgumentException
     */
    public function __construct($width, $height)
    {
        $this->box = new Box($width, $height);
    }

    /**
     * {@inheritdoc}
     */
    public function getWidth()
    {
        return $this->box->getWidth();
    }

    /**
     * {@inheritdoc}
     */
    public function getHeight()
    {
        return $this->box->getHeight();
    }

    /**
     * {@inheritdoc}
     */
    public function scale($ratio)
    {
        $box = $this->box->scale($ratio);
        return new self($box->getWidth(), $box->getHeight());
    }

    /**
     * {@inheritdoc}
     */
    public function increase($size)
    {
        $box = $this->box->increase($size);
        return new self($box->getWidth(), $box->getHeight());
    }

    /**
     * {@inheritdoc}
     */
    public function contains(BoxInterface $box, PointInterface $start = null)
    {
        return $this->box->contains($box, $start);
    }

    /**
     * {@inheritdoc}
     */
    public function square()
    {
        return $this->box->square();
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return (string) $this->box;
    }

    /**
     * {@inheritdoc}
     */
    public function widen($width)
    {
        return $this->scale($width / $this->width);
    }

    /**
     * {@inheritdoc}
     */
    public function heighten($height)
    {
        return $this->scale($height / $this->height);
    }

}