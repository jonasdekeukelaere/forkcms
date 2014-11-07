<?php
namespace Backend\Modules\Faq\Engine;

use Backend\Core\Engine\ModelForm;

class AddForm extends ModelForm
{
    public function __construct(array $record = array(), $name = 'add')
    {
        parent::__construct($name);

        $this->setRecord($record);
    }
}
