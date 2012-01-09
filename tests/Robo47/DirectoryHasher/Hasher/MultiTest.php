<?php

class Robo47_DirectoryHasher_Hasher_MultiTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Hasher_Multi::addHashsToFileResult
     */
    public function testAddHashsToFileResult() {
        $hasher = new Robo47_DirectoryHasher_Hasher_Multi(array(
                    new Robo47_DirectoryHasher_Hasher_SHA1(),
                    new Robo47_DirectoryHasher_Hasher_MD5()
                ));

        $file = dirname(__FILE__) . '/../../../fixtures/files/file1.php';

        $fileResult = new Robo47_DirectoryHasher_Result_File($file);

        $hasher->addHashsToFileResult($fileResult);

        $this->assertEquals(
                array(
            'sha1' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
            'md5' => 'd41d8cd98f00b204e9800998ecf8427e'
                ), $fileResult->getHashes()
        );
    }

    /**
     * @covers Robo47_DirectoryHasher_Hasher_Multi::addHashsToResult
     */
    public function testAddHashsToResult() {
        $hasher = new Robo47_DirectoryHasher_Hasher_Multi(array(
                    new Robo47_DirectoryHasher_Hasher_SHA1(),
                    new Robo47_DirectoryHasher_Hasher_MD5()
                ));

        $file = dirname(__FILE__) . '/../../../fixtures/files/file1.php';

        $fileResult = new Robo47_DirectoryHasher_Result_File($file);
        $result = new Robo47_DirectoryHasher_Result(array($fileResult));
        $hasher->addHashsToResult($result);

        $this->assertEquals(
                array(
            'sha1' => 'da39a3ee5e6b4b0d3255bfef95601890afd80709',
            'md5' => 'd41d8cd98f00b204e9800998ecf8427e'
                ), $fileResult->getHashes()
        );
    }

}