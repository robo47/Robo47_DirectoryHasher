<?php

/**
 * Runs multiple hashers
 */
class Robo47_DirectoryHasher_Hasher_Multi implements Robo47_DirectoryHasher_Hasher_Interface {

    /**
     *
     * @var array|Robo47_DirectoryHasher_Hasher_Interface[]
     */
    protected $hasher = array();

    /**
     * @param array|Robo47_DirectoryHasher_Hasher_Interface[] $hasher
     */
    public function __construct(array $hasher) {
        $this->hasher = $hasher;
    }

    /**
     * {@inheritdoc}
     */
    public function addHashsToFileResult(Robo47_DirectoryHasher_Result_File $file) {
        foreach ($this->hasher as $hasher) {
            /* @var $hasher Robo47_DirectoryHasher_Hasher_Interface */
            $hasher->addHashsToFileResult($file);
        }
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addHashsToResult(Robo47_DirectoryHasher_Result $result) {
        foreach ($this->hasher as $hasher) {
            /* @var $hasher Robo47_DirectoryHasher_Hasher_Interface */
            $hasher->addHashsToResult($result);
        }
        return $this;
    }

}