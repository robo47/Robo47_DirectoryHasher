<?php

class Robo47_DirectoryHasher_Hasher_MD5Test extends PHPUnit_Framework_TestCase {


    /**
     * @covers Robo47_DirectoryHasher_Hasher_MD5::getHashsForFile
     */
    public function testGetHashsForFile() {
        $hasher = new Robo47_DirectoryHasher_Hasher_MD5();
        $file = dirname(__FILE__) . '/../../../fixtures/files/file1.php';
        $this->assertEquals(array('md5' => 'd41d8cd98f00b204e9800998ecf8427e'),$hasher->getHashsForFile($file));
    }

}