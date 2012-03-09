<?php

/**
 * Writer for exporting Result into an xml-file
 */
class Robo47_DirectoryHasher_Writer_File_Xml implements Robo47_DirectoryHasher_Writer_File_Interface
{
    /**
     * {@inheritdoc}
     */
    public function write(Robo47_DirectoryHasher_Result $result, $file) {
        $dom = new DOMDocument();
        $hashes = $dom->createElement('files');
        $dom->appendChild($hashes);

                foreach($result as $resultfile)
        {
            /* @var $resultfile Robo47_DirectoryHasher_Result_File */
            $resultnode = $dom->createElement('file');
            $resultnode->setAttribute('name',$resultfile->getFilename());

            foreach($resultfile->getHashes() as $hash => $value) {
                $hashnode = $dom->createElement('hash', $value);
                $hashnode->setAttribute('hash', $hash);
                $resultnode->appendChild($hashnode);
            }
            $hashes->appendChild($resultnode);
        }
        $dom->save($file);
    }
}
