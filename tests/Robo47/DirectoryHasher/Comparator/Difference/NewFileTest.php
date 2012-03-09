<?php

class Robo47_DirectoryHasher_Comparator_Difference_NewFileTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Comparator_Difference_NewFile::__construct
     * @covers Robo47_DirectoryHasher_Comparator_Difference_NewFile::toString
     */
    public function testNewFile() {
        $diff = new Robo47_DirectoryHasher_Comparator_Difference_NewFile(
                        'file'
        );

        $this->assertEquals(
                'Result contains new file "file"', $diff->toString()
        );
    }

}
