<?php

/**
 * Difference if a hash is missing
 */
class Robo47_DirectoryHasher_Comparator_Difference_MissingHash implements Robo47_DirectoryHasher_Comparator_Difference_Interface
{
    /**
     * @var string
     */
    protected $file;

    /**
     * @var string
     */
    protected $hashname;

    /**
     * @param string $file
     * @param string $hashname
     */
    public function __construct($file, $hashname)
    {
        $this->file = $file;
        $this->hashname = $hashname;
    }

    /**
     * {@inheritDoc}
     */
    public function toString() {
        return 'File "' . $this->file . '" misses "' . $this->hashname.'"';
    }
}