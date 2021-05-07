<?php


namespace App\Tests\Validator;


use App\Validator\EmailDomain;
use App\Validator\EmailDomainValidator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * EmailDomainValidator service test.
 * @covers \App\Validator\EmailDomainValidator
 */
class EmailDomainValidatorTest extends KernelTestCase
{
    public function testValidEmailDomain(): void
    {
        self::bootKernel();
        $container = self::$container;

        $contextMock = $this->getMockBuilder(ExecutionContextInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $contextMock->expects($this->exactly(0))
            ->method('addViolation')
            ->will($this->returnValue($contextMock));

        /** @var EmailDomainValidator $validator */
        $validator = $container->get(EmailDomainValidator::class);
        $validator->initialize($contextMock);

        $constraint = $this->getMockBuilder(EmailDomain::class)->getMock();
        $validator->validate('test@wp.pl', $constraint);
    }

    public function testInvalidEmailDomain(): void
    {
        self::bootKernel();
        $container = self::$container;

        $contextMock = $this->getMockBuilder(ExecutionContextInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $contextMock->expects($this->once())
            ->method('addViolation')
            ->will($this->returnValue($contextMock));

        /** @var EmailDomainValidator $validator */
        $validator = $container->get(EmailDomainValidator::class);
        $validator->initialize($contextMock);

        $constraint = $this->getMockBuilder(EmailDomain::class)->getMock();
        $validator->validate('jmt17446@zwoho.com', $constraint);
    }
}