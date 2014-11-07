<?php
namespace Backend\Core\Engine;

use Backend\Core\Engine\Form;

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
     * @param Form  $form
     * @param array $rules
     */
    public function __construct(Form $form, array $rules)
    {
        $this->setForm($form);
        $this->setRules($rules);
    }

    /**
     * @return Form
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param Form $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }

    /**
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @param array $rules
     */
    public function setRules(array $rules)
    {
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
