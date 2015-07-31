<?php

abstract class factory {
    static public function reader(ireader $reader) {
        $firstLine = $reader -> getNextLine();
        $dataObject = new dataObject(count($firstLine));

        if($reader -> firstLineAsNames === true) {
            foreach($firstLine as $fieldIndex => $fieldName) {
                $dataObject -> setColumnName($fieldIndex, $fieldName);
            }
        } else {
            $dataObject -> setLine($firstLine);
        }

        while(($lineData = $reader -> getNextLine()) !== false) {
            $dataObject -> setLine($lineData);
        }

        return($dataObject);
    }

    static public function writer(dataObject $dataObject, iwriter $writer) {
        foreach($dataObject -> getAllLines() as $line) {
            $writer -> writeNextLine($line);
        }
    }
}

?>
