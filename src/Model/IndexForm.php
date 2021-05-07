<?php


namespace App\Model;


class IndexForm
{
    private ?string $name;

    private ?string $surname;

    private ?int $age;

    private ?string $email;

    private ?bool $agree;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return IndexForm
     */
    public function setName(?string $name): IndexForm
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname;
    }

    /**
     * @param string|null $surname
     * @return IndexForm
     */
    public function setSurname(?string $surname): IndexForm
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * @param int|null $age
     * @return IndexForm
     */
    public function setAge(?int $age): IndexForm
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return IndexForm
     */
    public function setEmail(?string $email): IndexForm
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAgree(): ?bool
    {
        return $this->agree;
    }

    /**
     * @param bool|null $agree
     * @return IndexForm
     */
    public function setAgree(?bool $agree): IndexForm
    {
        $this->agree = $agree;
        return $this;
    }

}