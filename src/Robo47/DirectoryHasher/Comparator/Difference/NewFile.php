<?php

/**
 * Difference if a new file is detected
 */
class Robo47_DirectoryHasher_Comparator_Difference_NewFile implements Robo47_DirectoryHasher_Comparator_Difference_Interface {

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
        return 'Result contains new file "' . $this->file . '"';
    }

}
