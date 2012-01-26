<?php

/**
 * Builds results from xml-files 
 */
class Robo47_DirectoryHasher_Result_Factory_Xml {

    /**
     *
     * @param string $filename
     * @return Robo47_DirectoryHasher_Result
     */
    public function buildResultFromFile($filename) {
        $document = new DOMDocument();
        $document->load($filename);
        return $this->buildResultFromDOM($document);
    }

    /**
     *
     * @param DOMDocument $document
     * @return Robo47_DirectoryHasher_Result
     */
    public function buildResultFromDOM(DOMDocument $document) {
        $result = new Robo47_DirectoryHasher_Result();
        $xpath = new DOMXPath($document);
        
        $entries = $xpath->query('//files/file');

        foreach ($entries as $entry) {

            $filenameAttr = $entry->attributes->getNamedItem('name');
            if ($filenameAttr !== null) {
                $fileResult = new Robo47_DirectoryHasher_Result_File($filenameAttr->value);
                foreach ($this->getHashesFromFileNode($entry) as $name => $value) {
                    $fileResult->addHash($name, $value);
                }
                $result->addFileResult($fileResult);
            }
        }
        return $result;
    }

    /**
     *
     * @param DomNode $node
     * @return array
     */
    public function getHashesFromFileNode(DomNode $node) {
        $hashes = array();
        if ($node->hasChildNodes()) {
            $children = $node->childNodes;
            /* @var $children DOMNodeList */
            foreach ($children as $childnode) {
                /* @var $childnode DOMNode */
                if ($childnode->nodeName === 'hash') {
                    $attributes = $childnode->attributes;
                    /* @var $attributes DOMNamedNodeMap */
                    $hash = $attributes->getNamedItem('hash');
                    /* @var $hash DOMAttr */
                    $hashes[$hash->value] = $childnode->nodeValue;
                }
            }
        }
        return $hashes;
    }

}