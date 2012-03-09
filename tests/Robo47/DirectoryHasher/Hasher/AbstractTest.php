<?php

class nonAbstract extends Robo47_DirectoryHasher_Hasher_Abstract
{
    public function getHashsForFile($file) {
        return array('nonAbstract' => 'foo');
    }

}

class Robo47_DirectoryHasher_Hasher_AbstractTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Hasher_Abstract::addHashsToFileResult
     */
    public function testAddHashsToFileResult()
    {
        $hasher = new nonAbstract();

        $file = new Robo47_DirectoryHasher_Result_File(__FILE__);
        $hasher->addHashsToFileResult($file);

        $hashes = $file->getHashes();

        $this->assertArrayHasKey('nonAbstract', $hashes);
    }

    /**
     * @covers Robo47_DirectoryHasher_Hasher_Abstract::addHashsToResult
     */
    public function testAddHashsToResult()
    {
        $hasher = new nonAbstract();

        $file = new Robo47_DirectoryHasher_Result_File(__FILE__);
        $result = new Robo47_DirectoryHasher_Result(array($file));
        $hasher->addHashsToResult($result);

        $hashes = $file->getHashes();

        $this->assertArrayHasKey('nonAbstract', $hashes);
    }

}
