<?php

class Robo47_DirectoryHasher {

    /**
     *
     * @var Robo47_DirectoryHasher_Result
     */
    protected $result;

    /**
     *
     * @var type
     */
    protected $hasher;

    /**
     * @var Robo47_DirectoryHasher_Source_Interface
     */
    protected $source;

    public function __construct(Robo47_DirectoryHasher_Source_Interface $source, Robo47_DirectoryHasher_Hasher_Interface $hasher, Robo47_DirectoryHasher_Result $result = null) {
        $this->source = $source;
        $this->hasher = $hasher;
        if (null === $result) {
            $result = new Robo47_DirectoryHasher_Result();
        }
        $this->result = $result;
    }

    /**
     * @return Robo47_DirectoryHasher_Result
     */
    public function run() {
        $this->result->addFileResults($this->source->getFileResults());
        $this->hasher->addHashsToResult($this->result);
    }

    /**
     * @return Robo47_DirectoryHasher_Result
     */
    public function getResult() {
        return $this->result;
    }

}