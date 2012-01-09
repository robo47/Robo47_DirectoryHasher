<?php

class Robo47_DirectoryHasher_Hasher_SHA1Test extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Hasher_SHA1::getHashsForFile
     * @todo Implement testGetHashsForFile().
     */
    public function testGetHashsForFile() {
        $hasher = new Robo47_DirectoryHasher_Hasher_SHA1();
        $file = dirname(__FILE__) . '/../../../fixtures/files/file1.php';
        $this->assertEquals(array('sha1' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),$hasher->getHashsForFile($file));
    }

}