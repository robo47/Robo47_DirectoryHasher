<?php

class Robo47_DirectoryHasher_Source_Directory implements Robo47_DirectoryHasher_Source_Interface {

    /**
     * Directory
     *
     * @var string
     */
    protected $directory;

    /**
     * Ignored directories
     *
     * @var string
     */
    protected $ignoredDirectories;

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
     * @param string $directory
     * @param array $ignoredDirectories
     */
    public function __construct($directory, array $ignoredDirectories = array())
    {
        $this->directory = realpath($directory);
        if (false === $directory) {
            $message = sprintf('Path "%s" does not exist', $directory);
            throw new Exception($message);
        }

        foreach ($ignoredDirectories as $key => $ignoredDirectory)
        {
            $ignoredDirectories[$key] = realpath($ignoredDirectory);
            if (false === $directory) {
                $message = sprintf(
                    'Ignored Path "%s" does not exist', $ignoredDirectory
                );
                throw new Exception($message);
            }
        }
        $this->ignoredDirectories = $ignoredDirectories;
    }

    /**
     * Returns directory
     *
     * @return string
     */
    public function getDirectory() {
        return $this->directory;
    }

    /**
     * Ignored directories
     *
     * @return array
     */
    public function getIgnoredDirectories() {
        return $this->ignoredDirectories;
    }

    /**
     * Uses iterator to create array of Result_File
     */
    protected function loadFiles() {
        if ($this->loaded === true) {
            return;
        }
        $iter = new RecursiveDirectoryIterator($this->directory);
        $this->iterateFiles($iter);
        $this->loaded = true;
    }

    /**
     * Not using recursiveDirectoryIterator to savely ignore unreadable directories
     * 
     * @param RecursiveDirectoryIterator $iter
     */
    protected function iterateFiles(RecursiveDirectoryIterator $iter)
    {
        foreach ($iter as $file) {
            if (!is_readable($file)) {
                continue;
            } else if(!$iter->isDot()) {
                if (is_file((string) $file)) {
                    if (!$this->isIgnored($file) && !$this->isIgnoredDirectory($file)) {
                        $this->results[] = new Robo47_DirectoryHasher_Result_File($file);
                    }
                } else if (is_dir(($file))) {
                    $this->iterateFiles(new RecursiveDirectoryIterator((string) $file));
                }
            }
        }
    }

    /**
     * is dot File
     *
     * @param SplFileInfo $file
     * @return boolean
     */
    protected function isIgnored(SplFileInfo $file) {
        return ($file->getFilename() === '.' || $file->getFilename() === '..');
    }

    /**
     * @param string $file
     */
    protected function isIgnoredDirectory(SplFileInfo $file) {
        foreach ($this->ignoredDirectories as $directory) {
            if (0 === strpos((string)$file, $directory)) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function getFileResults() {
        $this->loadFiles();

        return $this->results;
    }

}
