<?php

class Robo47_DirectoryHasher_Result_File
{
    /**
     * @var string
     */
    protected $filename;

    /**
     * @var array
     */
    protected $hashes;

    /**
     * @param string $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param string $name
     * @param string $value
     * @return Robo47_DirectoryHasher_Result_File *Provides fluent interface*
     */
    public function addHash($name, $value)
    {
        $this->hashes[$name] = $value;
        return $this;
    }

    /**
     * @return array
     */
    public function getHashes()
    {
        return $this->hashes;
    }

}