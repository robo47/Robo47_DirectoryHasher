<?php

class Robo47_DirectoryHasher_Hasher_FileDataTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Hasher_FileData::getHashsForFile
     */
    public function testGetHashsForFile() {
        $hasher = new Robo47_DirectoryHasher_Hasher_FileData();
        $time = time();
        
        $file = dirname(__FILE__) . '/../../../fixtures/files/file1.php';
        touch($file, $time);
        $this->assertEquals(array('size' => '0', 'mtime' => $time),$hasher->getHashsForFile($file));
    }

}