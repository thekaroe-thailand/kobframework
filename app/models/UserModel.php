<?php

class UserModel
{
    /** @var string */
    public $name;

    /** @var string */
    public $email;

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }
}
