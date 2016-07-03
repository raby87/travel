<?php

namespace App\Contracts;

interface OAuthContract
{
    public function authorize();

    public function getUser();
}