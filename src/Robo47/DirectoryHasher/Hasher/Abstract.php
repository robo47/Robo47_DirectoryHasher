<?php

/**
 * Abstract Implementation for Hasher
 */
abstract class Robo47_DirectoryHasher_Hasher_Abstract implements Robo47_DirectoryHasher_Hasher_Interface {

    /**
     * {@inheritdoc}
     */
    public function addHashsToFileResult(Robo47_DirectoryHasher_Result_File $file) {

        $hashs = $this->getHashsForFile($file->getFilename());
        foreach ($hashs as $name => $value) {
            $file->addHash($name, $value);
        }
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addHashsToResult(Robo47_DirectoryHasher_Result $result) {

        foreach ($result as $file) {
            $this->addHashsToFileResult($file);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    abstract public function getHashsForFile($file);
}