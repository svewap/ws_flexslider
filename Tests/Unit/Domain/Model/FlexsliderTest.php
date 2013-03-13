<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Sven Wappler <typo3@wapplersystems.de>, WapplerSystems
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class Tx_WsFlexslider_Domain_Model_Flexslider.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Flexslider
 *
 * @author Sven Wappler <typo3@wapplersystems.de>
 */
class Tx_WsFlexslider_Domain_Model_FlexsliderTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_WsFlexslider_Domain_Model_Flexslider
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_WsFlexslider_Domain_Model_Flexslider();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getImagesReturnsInitialValueForObjectStorageContainingTx_WsFlexslider_Domain_Model_Image() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getImages()
		);
	}

	/**
	 * @test
	 */
	public function setImagesForObjectStorageContainingTx_WsFlexslider_Domain_Model_ImageSetsImages() { 
		$image = new Tx_WsFlexslider_Domain_Model_Image();
		$objectStorageHoldingExactlyOneImages = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneImages->attach($image);
		$this->fixture->setImages($objectStorageHoldingExactlyOneImages);

		$this->assertSame(
			$objectStorageHoldingExactlyOneImages,
			$this->fixture->getImages()
		);
	}
	
	/**
	 * @test
	 */
	public function addImageToObjectStorageHoldingImages() {
		$image = new Tx_WsFlexslider_Domain_Model_Image();
		$objectStorageHoldingExactlyOneImage = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneImage->attach($image);
		$this->fixture->addImage($image);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneImage,
			$this->fixture->getImages()
		);
	}

	/**
	 * @test
	 */
	public function removeImageFromObjectStorageHoldingImages() {
		$image = new Tx_WsFlexslider_Domain_Model_Image();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($image);
		$localObjectStorage->detach($image);
		$this->fixture->addImage($image);
		$this->fixture->removeImage($image);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getImages()
		);
	}
	
}
?>