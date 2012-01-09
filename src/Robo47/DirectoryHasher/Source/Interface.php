<?php

interface Robo47_DirectoryHasher_Source_Interface
{
    /**
     * Returns an array with an Robo47_DirectoryHasher_Result_File for each file
     *
     * @return array|Robo47_DirectoryHasher_Result_File[]
     */
    public function getFileResults();
}