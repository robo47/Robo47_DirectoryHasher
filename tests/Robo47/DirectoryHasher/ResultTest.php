<?php

class Robo47_DirectoryHasher_ResultTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Result::__construct
     */
    public function test__construct() {
        $result = new Robo47_DirectoryHasher_Result();

        $this->assertCount(0, $result);
        $result = new Robo47_DirectoryHasher_Result(
                        array(
                            $file = new Robo47_DirectoryHasher_Result_File('/baa/foo.php')
                        )
        );

        $this->assertCount(1, $result);
        $this->assertContains($file, $result->getIterator()->getArrayCopy());
    }

    /**
     * @covers Robo47_DirectoryHasher_Result::count
     */
    public function testCount()
    {
        $result = new Robo47_DirectoryHasher_Result();

        $this->assertCount(0, $result);

        $file = new Robo47_DirectoryHasher_Result_File('/baa/foo.php');
        $result->addFileResults(array($file,$file,$file));

        $this->assertCount(3, $result);
    }

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

    /**
     * @covers Robo47_DirectoryHasher_Result::hasFileResultFor
     */
    public function testHasFileResultFor()
    {
        $result = new Robo47_DirectoryHasher_Result(
                        array(
                            $file = new Robo47_DirectoryHasher_Result_File('/baa/foo.php')
                        )
        );

        $this->assertTrue($result->hasFileResultFor('/baa/foo.php'));
        $this->assertFalse($result->hasFileResultFor('/baa/blub.php'));
    }

    /**
     * @covers Robo47_DirectoryHasher_Result::getFileResultFor
     */
    public function testGetFileResultFor()
    {
        $result = new Robo47_DirectoryHasher_Result(
                        array(
                            $file = new Robo47_DirectoryHasher_Result_File('/baa/foo.php')
                        )
        );

        $this->assertSame($file, $result->getFileResultFor('/baa/foo.php'));
        $this->assertNull($result->getFileResultFor('/baa/blub.php'));
    }

}