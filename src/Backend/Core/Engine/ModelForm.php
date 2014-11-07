<?php

namespace Backend\Core\Engine;

class ModelForm extends Form
{
    /**
     * @var array
     */
    protected $record;

    /**
     * Make form instance with form data
     *
     * @param string $name
     * @param array  $record
     */
    public function __construct($name, array $record = array())
    {
        parent::__construct($name);
    }

    /**
     * @return array
     */
    public function getRecord()
    {
        return $this->record;
    }

    /**
     * @param array $record
     */
    public function setRecord($record)
    {
        $this->record = $record;
    }

    public function addText($name, $value = null, $maxLength = 255, $class = null, $classError = null, $HTML = false)
    {
        if ($value === null && isset($this->record[$name])) {
            $value = $this->record[$name];
        }

        return parent::addText($name, $value, $maxLength, $class, $classError, $HTML);
    }
}
