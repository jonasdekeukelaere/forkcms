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

        $this->record = $record;
    }
}
