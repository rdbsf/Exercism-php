<?php

const MAPPING_DNA_TO_RNA = array('A' => 'U', 'C' => 'G', 'G' => 'C', 'T' => 'A');

function toRna($strand)
{
        $rna = array();

        foreach(str_split($strand) as $strandChar)
        {
            if (array_key_exists($strandChar, MAPPING_DNA_TO_RNA))
            {
                $rna[] = MAPPING_DNA_TO_RNA[$strandChar];
            }
            else {
                throw new Exception('Strand element not found');
            }
        }

        return implode('', $rna);
}