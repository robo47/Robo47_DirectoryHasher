<?php

interface Robo47_DirectoryHasher_Writer_File_Interface
{
    /**
     * Write a Result to file
     *
     * @param  Robo47_DirectoryHasher_Result $result
     * @param  string $file
     *
     * @throws Robo47_DirectoryHasher_Writer_Exception
     */
    public function write(Robo47_DirectoryHasher_Result $result, $file);
}
