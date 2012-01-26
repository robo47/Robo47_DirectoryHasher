<?php

/**
 *
 */
class Robo47_DirectoryHasher_Result implements IteratorAggregate, Countable {

    /**
     * @var array|Robo47_DirectoryHasher_Result_File[]
     */
    protected $results;

    /**
     * @param array|Robo47_DirectoryHasher_Result_File[] $results
     */
    public function __construct(array $results = array()) {
        $this->results = $results;
    }

    /**
     * Adds a FileResult
     *
     * @param Robo47_DirectoryHasher_Result_File $fileResult
     * @return Robo47_DirectoryHasher_Result *Provides fluent interface*
     */
    public function addFileResult(Robo47_DirectoryHasher_Result_File $fileResult) {
        $this->results[] = $fileResult;
        return $this;
    }

    /**
     * Adds a FileResult
     *
     * @param Robo47_DirectoryHasher_Result_File $fileResult
     * @return Robo47_DirectoryHasher_Result *Provides fluent interface*
     */
    public function addFileResults(array $fileResults) {
        foreach ($fileResults as $fileResult) {
            /* @var $fileResult Robo47_DirectoryHasher_Result_File */
            $this->addFileResult($fileResult);
        }
        return $this;
    }

    /**
     * Returns an ArrayIterator
     *
     * @return ArrayIterator
     */
    public function getIterator() {
        return new ArrayIterator($this->results);
    }

    /**
     * Checks if there is a FileResult for a specific filename
     *
     * @param string $filename
     * @return boolean
     */
    public function hasFileResultFor($filename) {
        foreach ($this->results as $result) {
            /* @var $result Robo47_DirectoryHasher_Result_File */

            if ($filename === $result->getFilename()) {
                return true;
            }
        }
        return false;
    }

    /**
     * Returns a FileResult for a specific filename
     *
     * @param string $filename
     * @return Robo47_DirectoryHasher_Result_File|null
     */
    public function getFileResultFor($filename) {
        foreach ($this->results as $result) {
            /* @var $result Robo47_DirectoryHasher_Result_File */
            if ($filename === $result->getFilename()) {
                return $result;
            }
        }
        return null;
    }

    /**
     * Implements SPL::Countable
     *
     * @return integer
     */
    public function count() {
        return count($this->results);
    }

}