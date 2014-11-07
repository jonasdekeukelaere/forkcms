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

    protected $correctedRules = array(
        'required' => 'filled',
        'url' => 'URL',
    );

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
        foreach ($this->rules as $fieldName => $rules) {
            // get field
            if (!$this->form->existsField($fieldName)) {
                throw new Exception('Field ' . $fieldName . ' does not exist');
            }
            $field = $this->form->getField($fieldName);

            // get rules
            if (empty($rules)) {
                throw new Exception('Rules not set for field ' . $fieldName);
            }

            // validate
            foreach ($rules as $rule => $error) {
                // get error message
                $errorMessage = Language::err('FormError');
                if (isset($error)) {
                    $errorMessage = $error;
                } else {
                    $rule = $error;
                }

                // validate field
                if (array_key_exists($rule, $this->correctedRules)) {
                    $rule = $this->correctedRules[$rule];
                }
                $method = 'is' . \SpoonFilter::toCamelCase($rule, '-');
                if (!method_exists($field, $method)) {
                    throw new Exception('Rule ' . $rule . ' does not exist for field ' . $fieldName);
                }
                if (!$field->$method($errorMessage)) {
                    // stop when field has error
                    break;
                }
            }
        }

        return $this->form->isCorrect();
    }
}
