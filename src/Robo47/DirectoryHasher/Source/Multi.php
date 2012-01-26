<?php

class Robo47_DirectoryHasher_Source_Multi implements Robo47_DirectoryHasher_Source_Interface {

    /**
     * If the sources are already loaded
     *
     * @var boolean
     */
    protected $loaded = false;

    /**
     * @var Robo47_DirectoryHasher_Result
     */
    protected $result;

    /**
     * @param array|Robo47_DirectoryHasher_Source_Interface[] $sources
     * @param Robo47_DirectoryHasher_Result $result
     */
    public function __construct(array $sources, Robo47_DirectoryHasher_Result $result = null) {
        $this->sources = $sources;
        if ($result === null) {
            $result = new Robo47_DirectoryHasher_Result();
        }
        $this->result = $result;
    }

    /**
     * Fetches fileresults from all sources
     */
    protected function loadSources() {
        if ($this->loaded === true) {
            return;
        }
        foreach ($this->sources as $source) {
            /* @var $source Robo47_DirectoryHasher_Source_Interface */
            $this->result->addFileResults(
                    $source->getFileResults()
            );
        }
        $this->loaded = true;
    }

    /**
     * {@inheritdoc}
     */
    public function getFileResults() {
        $this->loadSources();
        return $this->result->getIterator()->getArrayCopy();
    }

    /**
     * @return Robo47_DirectoryHasher_Result
     */
    public function getResult()
    {
        return $this->result;
    }

}