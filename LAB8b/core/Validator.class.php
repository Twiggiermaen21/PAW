<?php

namespace core;

/**
 * Parameter validation tool
 *
 * @author Przemysław Kudłacik
 */
class Validator {

    private $message_type = 'error';
    private $last_validation = false;

    public function generateErrors() {
        $this->message_type = 'error';
    }

    public function generateWarnings() {
        $this->message_type = 'warning';
    }

    public function generateInfos() {
        $this->message_type = 'info';
    }
    
    public function isLastOK() {
        return $this->last_validation;
    }

    private function _validate(&$source, $idx, $config) {
        $this->last_validation = true;
        if (empty($idx)) {
            $value = isset($source) ? $source : null;
        } else {
            $value = isset($source[$idx]) ? $source[$idx] : null;
        }
        $empty = false;
        $msgs = array();

        if (isset($value)) {
            if (isset($config['trim'])) {
                $value = trim($value);
            }
            if (empty($value) && $value != "0") {
                $empty = true;
            } else { //not empty => validate
                // MINIMUM
                if (isset($config['min_length']) && strlen($value) < $config['min_length']) {
                    $this->last_validation = false;
                    if (isset($config['validator_message']))
                        $msgs [] = $config['validator_message'];
                    else
                        $msgs [] = "Minimum length of '$idx' is " . $config['min_length'];
                }
                // MAXIMUM
                if (isset($config['max_length']) && strlen($value) > $config['max_length']) {
                    $this->last_validation = false;
                    if (isset($config['validator_message']))
                        $msgs [] = $config['validator_message'];
                    else
                        $msgs [] = "Maximum length of '$idx' is " . $config['max_length'];
                }
                // MAIL
                if (isset($config['email']) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->last_validation = false;
                    if (isset($config['validator_message']))
                        $msgs [] = $config['validator_message'];
                    else
                        $msgs [] = "Wrong email format in '$idx'";
                }
                // NUMERIC
                if (isset($config['numeric']) && !is_numeric($value)) {
                    $this->last_validation = false;
                    if (isset($config['validator_message']))
                        $msgs [] = $config['validator_message'];
                    else
                        $msgs [] = "Parameter '$idx' is not a number";
                }
                // INT
                if (isset($config['int'])) {
                    if (filter_var($value, FILTER_VALIDATE_INT) === false) {
                        $this->last_validation = false;
                        if (isset($config['validator_message']))
                            $msgs [] = $config['validator_message'];
                        else
                            $msgs [] = "Parameter '$idx' is not an integer";
                    } else {
                        $value = intval($value);
                    }
                }
                // FLOAT
                if (isset($config['float'])) {
                    if (filter_var($value, FILTER_VALIDATE_FLOAT) === false) {
                        $this->last_validation = false;
                        if (isset($config['validator_message']))
                            $msgs [] = $config['validator_message'];
                        else
                            $msgs [] = "Parameter '$idx' is not a float";
                    } else {
                        $value = floatval($value);
                    }
                }
                // URL
                if (isset($config['url']) && !filter_var($value, FILTER_VALIDATE_URL)) {
                    $this->last_validation = false;
                    if (isset($config['validator_message']))
                        $msgs [] = $config['validator_message'];
                    else
                        $msgs [] = "Parameter '$idx' is not valid url";
                }
                // DATE
                if (isset($config['date_format'])) {
                    $d = \DateTime::createFromFormat($config['date_format'], $value);
                    if ($d !== false)
                        $value = $d;
                    else {
                        $this->last_validation = false;
                        if (isset($config['validator_message']))
                            $msgs [] = $config['validator_message'];
                        else
                            $msgs [] = "Parameter '$idx' - incorect date format";
                    }
                }
                // REGEXP
                if (isset($config['regexp']) && !preg_match($config['regexp'], $value)) {
                    $this->last_validation = false;
                    if (isset($config['validator_message']))
                        $msgs [] = $config['validator_message'];
                    else
                        $msgs [] = "Parameter '$idx' does not match";
                }
            }
        } else {
            $empty = true;
        }
        if ($empty && isset($config['required'])) {
            $this->last_validation = false;
            if (isset($config['required_message']))
                $msgs [] = $config['required_message'];
            else
                $msgs [] = "Prameter '$idx' is required";
        }
        $message_type = $this->message_type;
        if (isset($config['message_type'])) {
            if ($config['message_type'] == 'warning')
                $message_type = 'warning';
            elseif ($config['message_type'] == 'info')
                $message_type = 'info';
        }
        foreach ($msgs as $msg) {
            switch ($message_type) {
                case 'error': Utils::addErrorMessage($msg);
                    break;
                case 'warning': Utils::addWarningMessage($msg);
                    break;
                case 'info': Utils::addInfoMessage($msg);
                    break;
            }
        }

        return $value;
    }

    /**
     *  Validate and process $value according to the secified $config:
     *  [ 
     *    'trim' => true,
     *    'required' => true,
     *    'required_message' => 'message...',
     *    'min_length' => value,
     *    'max_length' => value,
     *    'email' => true,
     *    'numeric' => true,
     *    'int' => true,
     *    'float' => true,
     *    'date_format' => format,
     *    'regexp' => expression,
     *    'validator_message' => 'message...',
     *    'message_type' => error | warning | info,
     *  ]
     * @return $value value after validation and optional processing (trim,int,float,date)
     */
    public function validate($value, $config) {
        return $this->_validate($value, null, $config);
    }

    public function validateFromCleanURL($param_number, $config = null) {
        global $_PARAMS;
        return $this->_validate($_PARAMS, $param_number, $config);
    }

    public function validateFromRequest($param_name, $config = null) {
        return $this->_validate($_REQUEST, $param_name, $config);
    }

    public function validateFromGet($param_name, $config = null) {
        return $this->_validate($_GET, $param_name, $config);
    }

    public function validateFromPost($param_name, $config = null) {
        return $this->_validate($_POST, $param_name, $config);
    }

    public function validateFromCookies($param_name, $config = null) {
        return $this->_validate($_COOKIE, $param_name, $config);
    }

}
