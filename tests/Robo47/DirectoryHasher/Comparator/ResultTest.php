<?php

class Robo47_DirectoryHasher_Comparator_ResultTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Comparator_Result::addDifference
     */
    public function testAddDifference() {
        $result = new Robo47_DirectoryHasher_Comparator_Result();

        $result->addDifference($difference = new Robo47_DirectoryHasher_Comparator_Difference_NewFile('/baa/foo.php'));

        $this->assertCount(1, $result->getDifferences());
        $this->assertContains($difference, $result->getDifferences());
    }

    /**
     * @covers Robo47_DirectoryHasher_Comparator_Result::addDifferences
     */
    public function testAddDifferences() {
        $result = new Robo47_DirectoryHasher_Comparator_Result();

        $differences = array(
            new Robo47_DirectoryHasher_Comparator_Difference_NewFile('/baa/foo.php'),
            new Robo47_DirectoryHasher_Comparator_Difference_NewFile('/baa/blub.php')
        );

        $result->addDifferences($differences);

        $this->assertCount(2, $result->getDifferences());
        $this->assertContains($differences[0], $result->getDifferences());
        $this->assertContains($differences[1], $result->getDifferences());
    }

    /**
     * @covers Robo47_DirectoryHasher_Comparator_Result::getDifferences
     */
    public function testGetDifference() {
        $result = new Robo47_DirectoryHasher_Comparator_Result();

        $this->assertEquals(array(), $result->getDifferences());

        $result->addDifference($difference = new Robo47_DirectoryHasher_Comparator_Difference_NewFile('/baa/foo.php'));

        $this->assertEquals(array($difference), $result->getDifferences());
    }

}