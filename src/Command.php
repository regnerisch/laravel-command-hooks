<?php

namespace Regnerisch\LaravelCommandHooks;

use Illuminate\Console\Command as BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends BaseCommand
{
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $code = null;

        if (method_exists($this, 'before')) {
            $this->before();
        }

        $method = method_exists($this, 'handle') ? 'handle' : '__invoke';

        $originalCode = (int) $this->laravel->call([$this, $method]);

        if (method_exists($this, 'after')) {
            $code = $this->after($originalCode);
        }

        return is_null($code) ? $originalCode : (int) $code;
    }
}
