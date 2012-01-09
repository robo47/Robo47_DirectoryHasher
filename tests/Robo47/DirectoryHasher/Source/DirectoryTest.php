<?php

class Robo47_DirectoryHasher_Source_DirectoryTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Source_Directory::getFileResults
     */
    public function testGetFileResults() {
        $dir = dirname(__FILE__) . '/../../../fixtures/files/';
        $source = new Robo47_DirectoryHasher_Source_Directory($dir);

        $this->assertCount(3, $source->getFileResults());
    }

}