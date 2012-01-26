<?php

class Robo47_DirectoryHasher_Comparator_Difference_MissingHashTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Comparator_Difference_MissingHash::__construct
     * @covers Robo47_DirectoryHasher_Comparator_Difference_MissingHash::toString
     */
    public function testMissingHash() {
        $diff = new Robo47_DirectoryHasher_Comparator_Difference_MissingHash(
                        'file', 'hashname'
        );

        $this->assertEquals(
                'File "file" misses "hashname"', $diff->toString()
        );
    }

}
