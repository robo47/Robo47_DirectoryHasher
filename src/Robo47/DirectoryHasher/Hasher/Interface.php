<?php

interface Robo47_DirectoryHasher_Hasher_Interface
{
    /**
     * Adds the hashes to the file result
     *
     * @param Robo47_DirectoryHasher_Result_File $file
     * @return Robo47_DirectoryHasher_Hasher_Interface *Provides fluent interface*
     */
    public function addHashsToFileResult(Robo47_DirectoryHasher_Result_File $file);

    /**
     * Adds the hashes to the result
     *
     * @param Robo47_DirectoryHasher_Result $result
     * @return Robo47_DirectoryHasher_Hasher_Interface *Provides fluent interface*
     */
    public function addHashsToResult(Robo47_DirectoryHasher_Result $result);
}