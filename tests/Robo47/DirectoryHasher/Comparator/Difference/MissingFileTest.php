<?php

class Robo47_DirectoryHasher_Comparator_Difference_MissingFileTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Comparator_Difference_MissingFile::__construct
     * @covers Robo47_DirectoryHasher_Comparator_Difference_MissingFile::toString
     */
    public function testMissingFile() {
        $diff = new Robo47_DirectoryHasher_Comparator_Difference_MissingFile(
                        'file'
        );

        $this->assertEquals(
                'Result is missing file "file"', $diff->toString()
        );
    }

}