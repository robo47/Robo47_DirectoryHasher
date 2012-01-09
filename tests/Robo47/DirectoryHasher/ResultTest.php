<?php

class Robo47_DirectoryHasher_ResultTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Result::addFileResult
     */
    public function testAddFileResult() {
        $result = new Robo47_DirectoryHasher_Result();

        $this->assertCount(0, $result->getIterator());
        $result->addFileResult(
                new Robo47_DirectoryHasher_Result_File('/baa/foo.php')
        );
        $this->assertCount(1, $result->getIterator());
    }

    /**
     * @covers Robo47_DirectoryHasher_Result::addFileResults
     */
    public function testAddFileResults() {
        $result = new Robo47_DirectoryHasher_Result();

        $this->assertCount(0, $result->getIterator());
        $result->addFileResults(
                array(
                    new Robo47_DirectoryHasher_Result_File('/baa/foo.php'),
                    new Robo47_DirectoryHasher_Result_File('/baa/blub.php')
                )
        );
        $this->assertCount(2, $result->getIterator());
    }

    /**
     * @covers Robo47_DirectoryHasher_Result::getIterator
     */
    public function testGetIterator() {
        $result = new Robo47_DirectoryHasher_Result();
        $this->assertInstanceOf('ArrayIterator', $result->getIterator());
    }

}