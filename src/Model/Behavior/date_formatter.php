<?php

class DateFormatterBehavior extends ModelBehavior {
   
    var $dateFormat = 'dd/mm/yyyy';

    var $databaseFormat = 'yyyy-mm-dd';

    var $delimiterDateFormat = '/';

    var $delimiterDatabaseFormat = '-';

    var $delimiterDateTimeFormat = ' ';

    function setup(&$model) {

        $dateFormat = Configure::read('DateBehaviour.dateFormat');
        if($dateFormat != null){
            $this->dateFormat = $dateFormat;
        }
        $databaseFormat = Configure::read('DateBehaviour.databaseFormat');
        if($databaseFormat != null){
            $this->databaseFormat = $databaseFormat;
        }
        $delimiterDateFormat = Configure::read('DateBehaviour.delimiterDateFormat');
        if($delimiterDateFormat != null){
            $this->delimiterDateFormat = $delimiterDateFormat;
        }
        $delimiterDatabaseFormat = Configure::read('DateBehaviour.delimiterDatabaseFormat');
        if($delimiterDatabaseFormat != null){
            $this->delimiterDatabaseFormat = $delimiterDatabaseFormat;
        }
        $delimiterDateTimeFormat = Configure::read('DateBehaviour.delimiterDateTimeFormat');
        if($delimiterDateTimeFormat != null){
            $this->delimiterDateTimeFormat = $delimiterDateTimeFormat;
        }
        $this->model = $model;
    }
	
    function _convertDate($date, $format1, $format2, $delimiterDateFormat, $delimiterDatabaseFormat){
        if($date == null OR $date == ''){
            return '';
        }
    
        $date = explode($this->delimiterDateTimeFormat, $date);
        $date_array = explode($delimiterDateFormat, $date[0]);
        $format1_array = explode($delimiterDateFormat, $format1);
        $format2_array = explode($delimiterDatabaseFormat, $format2);
        
        $current_array = array_combine($format1_array, $date_array);
        $new_array = array_combine($format2_array, $date_array);
        foreach($new_array as $key=>$value){
            $new_array[$key] = $current_array[$key];
        }
        if(isset($date[1])){
        
            return implode($delimiterDatabaseFormat, $new_array).$this->delimiterDateTimeFormat.$date[1];
        }else{
            return implode($delimiterDatabaseFormat, $new_array);
        }
    }
   
 
    function _changeDate($data, $direction){
   
        if($data == false){
            return false;
        }
  
        switch($direction){
            case 1:
                $format1 = $this->dateFormat;
                $format2 = $this->databaseFormat;
                $delimiterDateFormat = $this->delimiterDateFormat;
                $delimiterDatabaseFormat = $this->delimiterDatabaseFormat;
                break;
            case 2:
                $format1 = $this->databaseFormat;
                $format2 = $this->dateFormat;
                $delimiterDateFormat = $this->delimiterDatabaseFormat;
                $delimiterDatabaseFormat = $this->delimiterDateFormat;
                break;
            default:
                return false;
        }
        
        foreach($data as $key=>$value){
            if($direction == 2){
                foreach($value as $key1=>$value1){
                    if($this->model->name == $key1){ 
                        $columns = $this->model->getColumnTypes();
                    } else {
                        
                        if(isset($this->model->{$key1})){
                            $columns = $this->model->{$key1}->getColumnTypes();
                        } else {
                            if($key1 != 'Parent'){
                                App::import('Model', $key1);
                                $model_on_the_fly = new $key1();
                                $columns = $model_on_the_fly->getColumnTypes();
                            }
                        }
                    }
                    foreach($value1 as $k=>$val){   
                        if(!is_array($val)){
                            if(in_array($k, array_keys($columns))){
                                if(($columns[$k] == 'date' || $columns[$k] == 'datetime') && ($k != 'created' && $k != 'modified')){
                                    if($val == '0000-00-00' || $val == '0000-00-00 00:00:00' || $val == ''){ 
                                        $data[$key][$key1][$k] = null;
                                    } else {
                                        $data[$key][$key1][$k] = $this->_convertDate($val, $format1, $format2, $delimiterDateFormat, $delimiterDatabaseFormat);
                                    }
                                }
                            }
                        }
                    }   
                }
            } else {
                if($this->model->name == $key){ 
                    $columns = $this->model->getColumnTypes();
                } else {
                   
                    if(isset($this->model->{$key})){
                        $columns = $this->model->{$key}->getColumnTypes();
                    } else {
                        if($key != 'Parent'){
                            App::import('Model', $key);
                            $model_on_the_fly = new $key();
                            $columns = $model_on_the_fly->getColumnTypes();
                        }
                    }
                }
                foreach($value as $k=>$val){   
                    if(!is_array($val)){
                        if(in_array($k, array_keys($columns))){
                            if(($columns[$k] == 'date' || $columns[$k] == 'datetime') && ($k != 'created' && $k != 'modified')){
                                if($val == '0000-00-00' || $val == '0000-00-00 00:00:00' || $val == ''){ 
                                    $data[$key][$k] = null;
                                } else {
                                    $data[$key][$k] = $this->_convertDate($val, $format1, $format2, $delimiterDateFormat, $delimiterDatabaseFormat);
                                }
                            }
                        }
                    }
                }
            }
        }
        return $data;
    }
   
    //Function before save.
    function beforeSave($model) {
        $model->data = $this->_changeDate($model->data, 1); //direction is from interface to database
        return true;
    }
   
    function afterFind(&$model, $results){
        $results = $this->_changeDate($results, 2); //direction is from database to interface
        return $results;
    }
}
?>