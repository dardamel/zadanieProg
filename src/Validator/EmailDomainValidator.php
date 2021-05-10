<?php


namespace App\Validator;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class EmailDomainValidator extends ConstraintValidator
{
    private string $urlCheck;

    /**
     * EmailDomainValidator constructor.
     * @param string $urlCheck
     */
    public function __construct(string $urlCheck)
    {
        $this->urlCheck = $urlCheck;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        $result = @file_get_contents($this->urlCheck . $value);
        $resultData = json_decode($result, true);

        if (is_array($resultData) && !empty($resultData['disposable']) && $resultData['disposable'] == 'false') {
            return;
        } else {
            $this->context->addViolation($constraint->message);
        }
    }
}