<?php

/**
 * Comparator Result
 */
class Robo47_DirectoryHasher_Comparator_Result
{
    /**
     * @var array|Robo47_DirectoryHasher_Comparator_Difference_Interface[]
     */
    protected $differences = array();

    /**
     * @param Robo47_DirectoryHasher_Comparator_Difference_Interface $difference
     * @return Robo47_DirectoryHasher_Comparator_Result *Provides fluent interface*
     */
    public function addDifference(Robo47_DirectoryHasher_Comparator_Difference_Interface $difference)
    {
        $this->differences[] = $difference;
        return $this;
    }

    /**
     * @param array|Robo47_DirectoryHasher_Comparator_Difference_Interface[] $differences
     * @return Robo47_DirectoryHasher_Comparator_Result *Provides fluent interface*
     */
    public function addDifferences(array $differences)
    {
        foreach($differences as $difference)
        {
            $this->addDifference($difference);
        }
        return $this;
    }

    /**
     * @return array|Robo47_DirectoryHasher_Comparator_Difference_Interface[]
     */
    public function getDifferences()
    {
        return $this->differences;
    }
}