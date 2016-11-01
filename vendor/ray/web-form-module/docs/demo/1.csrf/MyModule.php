<?php

namespace Ray\WebFormModule;

use Ray\Di\AbstractModule;

class MyModule extends AbstractModule
{
    protected function configure()
    {
        $this->install(new AuraInputModule);
        $this->bind(FormInterface::class)->annotatedWith('contact_form')->to(ContactForm::class);
    }
}
