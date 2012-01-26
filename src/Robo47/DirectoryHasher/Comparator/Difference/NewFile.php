<?php

class Robo47_DirectoryHasher_Comparator_Difference_NewFile implements Robo47_DirectoryHasher_Comparator_Difference_Interface
{
    protected $file;
    
    public function __construct($file)
    {
        $this->file = $file;
    }
    
    public function toString() {
        return 'Result contains new file "' . $this->file . '"';
    }
}