<?php

class Robo47_DirectoryHasher_Source_Directory implements Robo47_DirectoryHasher_Source_Interface {

    /**
     * Directory
     *
     * @var string
     */
    protected $directory;

    /**
     * Array of SplFileInfo Objects
     *
     * @var array|Robo47_DirectoryHasher_Result_File[]
     */
    protected $results = array();

    /**
     * If the files are already loaded
     *
     * @var boolean
     */
    protected $loaded = false;

    /**
     *
     * @param string $directory
     */
    public function __construct($directory) {
        $this->directory = $directory;
    }

    /**
     *
     */
    protected function loadFiles() {
        if ($this->loaded) {
            return;
        }
        $iter = new RecursiveIteratorIterator(
                        new RecursiveDirectoryIterator(
                                $this->directory
                        )
        );
        while ($iter->valid()) {
        /* @var $file SplFileInfo */
            if ($iter->isFile() && !$iter->isDot()) {
                $this->results[] = new Robo47_DirectoryHasher_Result_File($iter->current());
            }
        $iter->next();
        }
        $this->loaded = true;
    }

    public function getFileResults() {
        $this->loadFiles();
        return $this->results;
    }

}