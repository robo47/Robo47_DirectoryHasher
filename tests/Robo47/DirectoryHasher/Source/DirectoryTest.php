<?php

class Robo47_DirectoryHasher_Source_DirectoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers Robo47_DirectoryHasher_Source_Directory::__construct
     * @covers Robo47_DirectoryHasher_Source_Directory::getDirectory
     * @covers Robo47_DirectoryHasher_Source_Directory::getIgnoredDirectories
     */
    public function test__construct() {
        $dir = dirname(__FILE__) . '/../../../fixtures/files/';
        $source = new Robo47_DirectoryHasher_Source_Directory($dir, array(sys_get_temp_dir()));

        $this->assertEquals(realpath($dir), $source->getDirectory());
        $this->assertEquals(
            array(sys_get_temp_dir()), $source->getIgnoredDirectories()
        );
    }

    /**
     * @covers Robo47_DirectoryHasher_Source_Directory::getFileResults
     * @covers Robo47_DirectoryHasher_Source_Directory::loadFiles
     * @covers Robo47_DirectoryHasher_Source_Directory::<protected>
     */
    public function testGetFileResults() {
        $dir = dirname(__FILE__) . '/../../../fixtures/files/';
        $source = new Robo47_DirectoryHasher_Source_Directory($dir);

        $this->assertCount(3, $source->getFileResults());
        // Second time should still be 3
        $this->assertCount(3, $source->getFileResults());
    }

    /**
     * @covers Robo47_DirectoryHasher_Source_Directory::getFileResults
     * @covers Robo47_DirectoryHasher_Source_Directory::loadFiles
     * @covers Robo47_DirectoryHasher_Source_Directory::<protected>
     */
    public function testGetFileResultsWith() {
        $dir = dirname(__FILE__) . '/../../../fixtures/files3/';
        $ignore = array(
            dirname(__FILE__) . '/../../../fixtures/files3/files1'
        );
        $source = new Robo47_DirectoryHasher_Source_Directory($dir, $ignore);

        $this->assertCount(3, $source->getFileResults());
    }

}