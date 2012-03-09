<?php

class Robo47_DirectoryHasher_Result_Factory_XmlTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers Robo47_DirectoryHasher_Result_Factory_Xml::buildResultFromDOM
     * @covers Robo47_DirectoryHasher_Result_Factory_Xml::buildResultFromFile
     * @covers Robo47_DirectoryHasher_Result_Factory_Xml::getHashesFromFileNode
     */
    public function testbuildResultFromFile()
    {
        $factory = new Robo47_DirectoryHasher_Result_Factory_Xml();

        $result = $factory->buildResultFromFile(dirname(__FILE__).'/../../../../fixtures/result/fixture1.xml');

        $this->assertCount(1, $result);

        $resultFile = $result->getIterator()->current();
        /* @var $resultFile Robo47_DirectoryHasher_Result_File */
        $this->assertEquals('/some/path/Xml.php', $resultFile->getFilename());
        $hashes = $resultFile->getHashes();
        $this->assertCount(4, $hashes);

        $this->assertArrayHasKey('md5', $hashes);
        $this->assertArrayHasKey('sha1', $hashes);
        $this->assertArrayHasKey('size', $hashes);
        $this->assertArrayHasKey('mtime', $hashes);

        $this->assertEquals('1a2a2fdad558101c11919fd3ceff48c1', $hashes['md5']);
        $this->assertEquals('9b41feb8a6c885e62afaf389e46646d742e67b0b', $hashes['sha1']);
        $this->assertEquals('1000', $hashes['size']);
        $this->assertEquals('1326082206', $hashes['mtime']);
    }
}
