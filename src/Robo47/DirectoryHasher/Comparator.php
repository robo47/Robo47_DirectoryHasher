<?php

class Robo47_DirectoryHasher_Comparator {

    /**
     * Compares two Results
     * 
     * @param Robo47_DirectoryHasher_Result $old
     * @param Robo47_DirectoryHasher_Result $new
     * @return Robo47_DirectoryHasher_Comparator_Result
     */
    public function compare(Robo47_DirectoryHasher_Result $old, Robo47_DirectoryHasher_Result $new) {
        $result = new Robo47_DirectoryHasher_Comparator_Result();

        foreach ($old->getIterator() as $fileResult) {
            /* @var $fileResult Robo47_DirectoryHasher_Result_File */
            if (!$new->hasFileResultFor($fileResult->getFilename())) {
                $result->addDifference(
                        new Robo47_DirectoryHasher_Comparator_Difference_MissingFile(
                                $fileResult->getFilename()
                        )
                );
            } else {
                $result->addDifferences(
                        $this->getHashDifferences(
                                $fileResult, $new->getFileResultFor($fileResult->getFilename()
                                )
                        )
                );
            }
        }

        foreach ($new->getIterator() as $fileResult) {
            /* @var $fileResult Robo47_DirectoryHasher_Result_File */
            if (!$old->hasFileResultFor($fileResult->getFilename())) {
                $result->addDifference(
                        new Robo47_DirectoryHasher_Comparator_Difference_NewFile(
                                $fileResult->getFilename()
                        )
                );
            }
        }

        return $result;
    }

    /**
     * Returns differences of hashes
     *
     * @param Robo47_DirectoryHasher_Result_File $oldFileResult
     * @param Robo47_DirectoryHasher_Result_File $newFileResult
     * @return \Robo47_DirectoryHasher_Comparator_Difference_WrongHash
     */
    public function getHashDifferences(Robo47_DirectoryHasher_Result_File $oldFileResult, Robo47_DirectoryHasher_Result_File $newFileResult) {
        $differences = array();

        $oldHashes = $oldFileResult->getHashes();
        $newHashes = $newFileResult->getHashes();

        foreach ($oldHashes as $hashname => $value) {
            if (!isset($newHashes[$hashname])) {
                $differences[] = new Robo47_DirectoryHasher_Comparator_Difference_MissingHash(
                                $oldFileResult->getFilename(), $hashname
                );
            } elseif ($oldHashes[$hashname] !== $newHashes[$hashname]) {
                $differences[] = new Robo47_DirectoryHasher_Comparator_Difference_WrongHash(
                                $oldFileResult->getFilename(), $hashname, $newHashes[$hashname], $oldHashes[$hashname]
                );
            }
        }
        return $differences;
    }

}