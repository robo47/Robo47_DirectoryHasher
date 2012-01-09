<?php

class Robo47_DirectoryHasher_Source_Multi implements Robo47_DirectoryHasher_Source_Interface {

    /**
     * If the sources are already loaded
     *
     * @var boolean
     */
    protected $loaded = false;

    /**
     *
     * @param array $sources
     * @param array|Robo47_DirectoryHasher_Source_Interface[] $sources
     */
    public function __construct(array $sources, Robo47_DirectoryHasher_Result $result = null) {
        $this->sources = $sources;
        if ($result === null) {
            $result = new Robo47_DirectoryHasher_Result();
        }
        $this->result = $result;
    }

    protected function loadSources() {
        foreach ($this->sources as $source) {
            /* @var $source Robo47_DirectoryHasher_Source_Interface */
            $this->result->addFileResults(
                    $source->getFileResults()
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getFileResults() {
        $this->loadSources();
        return $this->result->getIterator()->getArrayCopy();
    }

}