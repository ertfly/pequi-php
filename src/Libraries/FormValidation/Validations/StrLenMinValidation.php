<?php

namespace Pequi\Libraries\FormValidation\Validations;

use Pequi\Translate;

class StrLenMinValidation extends AbstractValidation
{
    private $message;

    public function validate()
    {
        $this->message = Translate::get('validation', 'StrLenMinValidation', 'O campo %s deve conter no mínimo %s caracteres');
        if (trim($this->value) == '') {
            return;
        }

        if (!isset($this->options['size_min'])) {
            throw new \Exception('Informe a quantidade mínima dos caracteres');
        }
        if (mb_strlen($this->value) < $this->options['size_min']) {
            throw new \Exception(sprintf($this->message, $this->description, $this->options['size_min']));
        }
        return;
    }
}
