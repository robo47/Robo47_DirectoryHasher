<?php

class Robo47_DirectoryHasher_Comparator_Difference_MissingHash implements Robo47_DirectoryHasher_Comparator_Difference_Interface
{
    protected $file;
    protected $hashname;

    public function __construct($file, $hashname)
    {
        $this->file = $file;
        $this->hashname = $hashname;
    }

    public function toString() {
        return 'File "' . $this->file . '" misses "' . $this->hashname.'"';
    }
}