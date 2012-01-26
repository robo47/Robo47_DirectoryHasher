<?php

class Robo47_DirectoryHasher_Comparator_Difference_WrongHash implements Robo47_DirectoryHasher_Comparator_Difference_Interface
{
    protected $file;
    protected $hashname;
    protected $value;
    protected $expectedValue;
    
    public function __construct($file, $hashname, $value, $expectedValue)
    {
        $this->file = $file;
        $this->hashname = $hashname;
        $this->value = $value;
        $this->expectedValue = $expectedValue;
    }
    
    public function toString() {
        return 'File "' . $this->file . '" has wrong "' . $this->hashname.'" of "' . $this->value . '" expected "' . $this->expectedValue.'"';
    }
    
}