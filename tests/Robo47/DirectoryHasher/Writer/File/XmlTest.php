<?php

class Robo47_DirectoryHasher_Writer_File_XmlTest extends PHPUnit_Framework_TestCase {


    public function setUp()
    {
        @unlink(dirname(__FILE__) . '/output.xml');
    }

    public function tearDown()
    {
        @unlink(dirname(__FILE__) . '/output.xml');
    }

    /**
     * @covers Robo47_DirectoryHasher_Writer_File_Xml::write
     */
    public function testWrite() {
        $writer = new Robo47_DirectoryHasher_Writer_File_Xml();

        $result = new Robo47_DirectoryHasher_Result(
                array(
                    new Robo47_DirectoryHasher_Result_File('/baa/foo.php', array('md5' => 'baa'))
                )
                );

        $writer->write($result, dirname(__FILE__) . '/output.xml');

        $this->assertFileExists(dirname(__FILE__) . '/output.xml');
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/output.xml', '<?xml version="1.0"?><files><file name="/baa/foo.php"><hash hash="md5">baa</hash></file></files>');
    }

}
