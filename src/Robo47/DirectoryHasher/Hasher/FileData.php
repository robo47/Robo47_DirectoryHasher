<?php

/**
 * Hasher which provides file size and mtime
 */
class Robo47_DirectoryHasher_Hasher_FileData extends Robo47_DirectoryHasher_Hasher_Abstract {

    /**
     * {@inheritdoc}
     */
    public function getHashsForFile($file) {
        return array(
            'size' => filesize($file),
            'mtime' => filemtime($file)
        );
    }

}
