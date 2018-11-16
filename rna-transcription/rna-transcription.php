<?php


const MAPPING_DNA = array('A', 'C', 'G', 'T');
const MAPPING_RNA = array('U', 'G', 'C', 'A');

function toRna($strand)
{
        $rna = array();

        foreach(str_split($strand) as $strandChar)
        {
            if (in_array($strandChar, MAPPING_DNA))
            {
                $index = array_search($strandChar, MAPPING_DNA);
                $rna[] = MAPPING_RNA[$index];
            }
            else {
                throw new Exception('Strand element not found');
            }
        }

        return implode('', $rna);
}