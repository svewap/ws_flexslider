<?php
namespace WapplerSystems\WsFlexslider\Domain\Model;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
    
    
/**
 *
 *
 * @package ws_flexslider
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Image extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title;

    /**
     * description
     *
     * @var string
     */
    protected $description;


    /**
     * image
     *
     * @var string
     */
    protected $image;


    /**
     * Fal image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $falImage;

    /**
     * textposition
     *
     * @var string
     * @validate NotEmpty
     */
    protected $textposition;

    /**
     * styleclass
     *
     * @var string
     * @validate NotEmpty
     */
    protected $styleclass;


    /**
     * link
     *
     * @var string
     */
    protected $link;

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    /**
     * Returns the image
     *
     * @return mixed $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param mixed $image
     * @return void
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $falImage
     */
    public function getFalImage()
    {
        return $this->falImage;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $falImage
     * @return void
     */
    public function setFalImage($falImage)
    {
        $this->falImage = $falImage;
    }


    /**
     * Returns the text position
     *
     * @return string $textposition
     */
    public function getTextposition()
    {
        return $this->textposition;
    }

    /**
     * Sets the text position
     *
     * @param string $textposition
     * @return void
     */
    public function setTextposition($textposition)
    {
        $this->textposition = $textposition;
    }


    /**
     * Returns the style class
     *
     * @return string $styleclass
     */
    public function getStyleclass()
    {
        return $this->styleclass;
    }

    /**
     * Sets the style class
     *
     * @param string $styleclass
     * @return void
     */
    public function setStyleclass($styleclass)
    {
        $this->styleclass = $styleclass;
    }


    /**
     * Returns the link
     *
     * @return string $link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the link
     *
     * @param string $link
     * @return void
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

}
