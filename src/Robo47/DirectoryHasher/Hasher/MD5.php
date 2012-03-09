<?php

/**
 * Hasher which generates MD5-Hashes of the files
 */
class Robo47_DirectoryHasher_Hasher_MD5 extends Robo47_DirectoryHasher_Hasher_Abstract
{
    /**
     * {@inheritdoc}
     */
    public function getHashsForFile($file) {
        return array('md5' => md5_file($file));
    }
}
