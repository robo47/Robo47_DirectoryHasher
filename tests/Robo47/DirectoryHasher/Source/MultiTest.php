<?php

class Robo47_DirectoryHasher_Source_MultiTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Source_Multi::getFileResults
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
    }

}