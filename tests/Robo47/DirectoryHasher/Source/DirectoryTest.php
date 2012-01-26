<?php

class Robo47_DirectoryHasher_Source_DirectoryTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Source_Directory::__construct
     * @covers Robo47_DirectoryHasher_Source_Directory::getDirectory
     */
    public function test__construct() {
        $dir = dirname(__FILE__) . '/../../../fixtures/files/';
        $source = new Robo47_DirectoryHasher_Source_Directory($dir);

        $this->assertEquals($dir, $source->getDirectory());
    }

    /**
     * @covers Robo47_DirectoryHasher_Source_Directory::getFileResults
     * @covers Robo47_DirectoryHasher_Source_Directory::loadFiles
     */
    public function testGetFileResults() {
        $dir = dirname(__FILE__) . '/../../../fixtures/files/';
        $source = new Robo47_DirectoryHasher_Source_Directory($dir);

        $this->assertCount(3, $source->getFileResults());
        // Second time should still be 3
        $this->assertCount(3, $source->getFileResults());
    }

}