<?php


namespace App\Validator;


use Symfony\Component\Validator\Constraint;

class EmailDomain extends Constraint
{
    public $message = 'Provided email address domain is blacklisted.';
}