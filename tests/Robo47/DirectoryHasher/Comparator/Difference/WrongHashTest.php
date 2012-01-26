<?php

class Robo47_DirectoryHasher_Comparator_Difference_WrongHashTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Comparator_Difference_WrongHash::__construct
     * @covers Robo47_DirectoryHasher_Comparator_Difference_WrongHash::toString
     */
    public function testWrongHash() {
        $diff = new Robo47_DirectoryHasher_Comparator_Difference_WrongHash(
                        'file', 'hashname', 'value', 'expectedValue'
        );

        $this->assertEquals(
                'File "file" has wrong "hashname" of "value" expected "expectedValue"', $diff->toString()
        );
    }

}