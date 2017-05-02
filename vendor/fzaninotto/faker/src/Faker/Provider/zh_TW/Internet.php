<?php

namespace Faker\Provider\zh_TW;

class Internet extends \Faker\Provider\Internet
{
    public function roll_no()
    {
        return \Faker\Factory::create('en_US')->roll_no();
    }

    public function domainWord()
    {
        return \Faker\Factory::create('en_US')->domainWord();
    }
}
