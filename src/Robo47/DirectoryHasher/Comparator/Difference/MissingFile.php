<?php

/**
 * Difference if a file is missing
 */
class Robo47_DirectoryHasher_Comparator_Difference_MissingFile implements Robo47_DirectoryHasher_Comparator_Difference_Interface {

    /**
     * @var string
     */
    protected $file;

    /**
     * @param string $file
     */
    public function __construct($file) {
        $this->file = $file;
    }

    /**
     * {@inheritDoc}
     */
    public function toString() {
        return 'Result is missing file "' . $this->file . '"';
    }

}