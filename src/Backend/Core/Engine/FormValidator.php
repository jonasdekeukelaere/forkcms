<?php
namespace Backend\Core\Engine;

class FormValidator
{
    /**
     * @var Form
     */
    protected $form;

    /**
     * @var array
     */
    protected $rules = array();

    /**
     * @param ModelForm  $form
     * @param array      $rules
     */
    public function __construct(ModelForm $form, array $rules)
    {
        $this->form = $form;
        $this->rules = $rules;
    }

    public function isValid()
    {
        foreach ($this->rules as $fieldName => $rule) {
            $field = $this->form->getField($fieldName);
            $method = 'is' . \SpoonFilter::toCamelCase($rule['rule']);

            $field->$method($rule['message']);
        }

        return $this->form->isCorrect();
    }
}
