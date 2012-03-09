<?php

/**
 * Hasher which generates SHA1-Hashes of the files
 */
class Robo47_DirectoryHasher_Hasher_SHA1 extends Robo47_DirectoryHasher_Hasher_Abstract
{
    /**
     * {@inheritdoc}
     */
    public function getHashsForFile($file) {
        return array('sha1' => sha1_file($file));
    }
}
