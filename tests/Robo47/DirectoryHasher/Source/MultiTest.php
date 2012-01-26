<?php

class Robo47_DirectoryHasher_Source_MultiTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Source_Multi::getFileResults
     * @covers Robo47_DirectoryHasher_Source_Multi::loadSources
     */
    public function testGetFileResults() {
        $source = new Robo47_DirectoryHasher_Source_Multi(
                        array(
                            new Robo47_DirectoryHasher_Source_Directory(
                                    dirname(__FILE__) . '/../../../fixtures/files/'
                            ),
                            new Robo47_DirectoryHasher_Source_Directory(
                                    dirname(__FILE__) . '/../../../fixtures/files2/'
                            )
                        )
        );

        $this->assertCount(5, $source->getFileResults());
        // Second time should still be 5
        $this->assertCount(5, $source->getFileResults());
    }

    /**
     * @covers Robo47_DirectoryHasher_Source_Multi::__construct
     * @covers Robo47_DirectoryHasher_Source_Multi::getResult
     */
    public function test__construct() {

        $source = new Robo47_DirectoryHasher_Source_Multi(
                        array()
        );

        $this->assertInstanceOf('Robo47_DirectoryHasher_Result', $source->getResult());

        $result = new Robo47_DirectoryHasher_Result();
        $source = new Robo47_DirectoryHasher_Source_Multi(
                        array(),
                        $result
        );

        $this->assertSame($result, $source->getResult());
    }

}