<?php

class Robo47_DirectoryHasher_Result_FileTest extends PHPUnit_Framework_TestCase {


    /**
     * @covers Robo47_DirectoryHasher_Result_File::getFilename
     */
    public function testGetFilename() {
        $file = new Robo47_DirectoryHasher_Result_File('/some/file.php');
        $this->assertSame('/some/file.php', $file->getFilename());
    }

    /**
     * @covers Robo47_DirectoryHasher_Result_File::addHash
     */
    public function testAddHash() {
        $file = new Robo47_DirectoryHasher_Result_File('/some/file.php');
        $file->addHash('md5', 'foo');
        $this->assertSame(array('md5' => 'foo'), $file->getHashes());
    }

    /**
     * @covers Robo47_DirectoryHasher_Result_File::getHashes
     */
    public function testGetHashes() {
        $file = new Robo47_DirectoryHasher_Result_File('/some/file.php');
        $file->addHash('md5', 'foo');
        $file->addHash('sha1', 'blub');
        $this->assertSame(array('md5' => 'foo','sha1' => 'blub'), $file->getHashes());
    }

}
