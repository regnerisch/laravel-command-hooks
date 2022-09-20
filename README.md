# Laravel Command Hooks

This package adds a `before` and `after` hook to Laravels command class.

## Usage
The methods are only called if they are defined inside you class. If you do not need them, do not implement them. 
Returning a none zero value inside you `before` method will exit the execution immediately. Neither `handle`/ `__invoke`
nor the `after` method will be called.
The `after` method will get the exit code of the executed `handle`/ `__invoke` method, you can manipulate the exit code 
inside the `after` method and overwrite it by returning you own exit code. Returning `null` or nothing will keep the 
original exit code.
```php
use \Regnerisch\LaravelCommandHooks\Command;

class MyCustomCommand extends Command
{
    protected function before(): ?int
    {
        // Do something before the command
        
        return $code;
    }
    
    protected function after(int $code): ?int
    {
        // Do something after the command
        
        return $code;
    }
    
    // ...
}
```
## Contributors

- [@regnerisch](https://github.com/regnerisch)
- [@alexgaal](https://github.com/alexgaal)

## License

[ISC](LICENSE.md)
