<?php

class Robo47_DirectoryHasher_ComparatorTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers Robo47_DirectoryHasher_Comparator::compare
     * @covers Robo47_DirectoryHasher_Comparator::getHashDifferences
     */
    public function testCompareWithMissingFile() {
        $result = new Robo47_DirectoryHasher_Comparator();

        $old = new Robo47_DirectoryHasher_Result(
                        array(
                            new Robo47_DirectoryHasher_Result_File('/baa/foo.php'),
                        )
        );

        $new = new Robo47_DirectoryHasher_Result();

        $compareResult = $result->compare($old, $new);

        $this->assertCount(1, $compareResult->getDifferences());

        $difference = new Robo47_DirectoryHasher_Comparator_Difference_MissingFile('/baa/foo.php');

        $this->assertContains($difference, $compareResult->getDifferences(), '', true, false);
    }

    /**
     * @covers Robo47_DirectoryHasher_Comparator::compare
     * @covers Robo47_DirectoryHasher_Comparator::getHashDifferences
     */
    public function testCompareWithNewFile() {
        $result = new Robo47_DirectoryHasher_Comparator();

        $old = new Robo47_DirectoryHasher_Result( );

        $new = new Robo47_DirectoryHasher_Result(
                        array(
                            new Robo47_DirectoryHasher_Result_File('/baa/foo.php'),
                        )
        );

        $compareResult = $result->compare($old, $new);

        $this->assertCount(1, $compareResult->getDifferences());

        $difference = new Robo47_DirectoryHasher_Comparator_Difference_NewFile('/baa/foo.php');

        $this->assertContains($difference, $compareResult->getDifferences(), '', true, false);
    }

    /**
     * @covers Robo47_DirectoryHasher_Comparator::compare
     * @covers Robo47_DirectoryHasher_Comparator::getHashDifferences
     */
    public function testCompareWithMissingHash() {
        $result = new Robo47_DirectoryHasher_Comparator();

        $old = new Robo47_DirectoryHasher_Result(array(
                    new Robo47_DirectoryHasher_Result_File('/baa/foo.php', array('md5' => 'asdf')),
                        )
        );

        $new = new Robo47_DirectoryHasher_Result(
                        array(
                            new Robo47_DirectoryHasher_Result_File('/baa/foo.php'),
                        )
        );

        $compareResult = $result->compare($old, $new);

        $this->assertCount(1, $compareResult->getDifferences());

        $difference = new Robo47_DirectoryHasher_Comparator_Difference_MissingHash('/baa/foo.php', 'md5');

        $this->assertContains($difference, $compareResult->getDifferences(), '', true, false);
    }

    /**
     * @covers Robo47_DirectoryHasher_Comparator::compare
     * @covers Robo47_DirectoryHasher_Comparator::getHashDifferences
     */
    public function testCompareWithWrongHash() {
        $result = new Robo47_DirectoryHasher_Comparator();

        $old = new Robo47_DirectoryHasher_Result(array(
                    new Robo47_DirectoryHasher_Result_File('/baa/foo.php', array('md5' => 'asdf')),
                        )
        );

        $new = new Robo47_DirectoryHasher_Result(
                        array(
                            new Robo47_DirectoryHasher_Result_File('/baa/foo.php', array('md5' => 'blub')),
                        )
        );

        $compareResult = $result->compare($old, $new);

        $this->assertCount(1, $compareResult->getDifferences());

        $difference = new Robo47_DirectoryHasher_Comparator_Difference_WrongHash('/baa/foo.php', 'md5', 'blub', 'asdf');

        $this->assertContains($difference, $compareResult->getDifferences(), '', true, false);
    }

}
