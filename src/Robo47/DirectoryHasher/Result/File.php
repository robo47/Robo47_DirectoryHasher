<?php

/**
 * Representation of a single File-Resulst 
 */
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
     * @param array $hashes
     */
    public function __construct($filename, array $hashes = array())
    {
        $this->filename = $filename;
        $this->hashes = $hashes;
    }

    /**
     * Returns filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Adds a hash
     *
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
     * Returns hashs
     *
     * @return array
     */
    public function getHashes()
    {
        return $this->hashes;
    }

}