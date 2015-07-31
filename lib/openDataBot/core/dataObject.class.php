<?php

class dataObject {
    protected $columnsCount = 0;
    protected $columnsNaming = array();
    protected $lineData = array();

    public function __construct($columnsCount) {
        $this -> columnsCount = $columnsCount;
    }

    public function setLine(array $data) {
        if(count($data) == $this -> columnsCount) {
            return(array_push($this -> lineData, $data) - 1);
        } else {
            return(false);
        }
    }

    public function getLine($index = null) {
        if(is_null($index)) {
            $index = count($this -> lineData) - 1;
        }

        if(array_key_exists($index, $this -> lineData)) {
            $lineData = $this -> lineData[$index];
            $indexedLineData = array();

            foreach($lineData as $fieldIndex => $fieldValue) {
                if(($columnName = $this -> getColumnName($fieldIndex)) != null) {
                    $indexedLineData[$columnName] = $fieldValue;
                } else {
                    $indexedLineData[$fieldIndex] = $fieldValue;
                }
            }

            return($indexedLineData);
        } else {
            return(null);
        }
    }

    public function getAllLines() {
        $lineIndex = 0;
        $lines = array();
        while(($lineData = $this -> getLine($lineIndex)) != null) {
            array_push($lines, $lineData);

            $lineIndex++;
        }

        return($lines);
    }

    public function setColumnName($index, $name) {
        if(($index >= 0) && $index <= ($this -> columnsCount - 1)) {
            $this -> columnsNaming[$index] = $name;
            return(true);
        } else {
            return(false);
        }
    }

    public function getColumnName($index) {
        if(array_key_exists($index, $this -> columnsNaming)) {
            return($this -> columnsNaming[$index]);
        } else {
            return(null);
        }
    }
}

?>
