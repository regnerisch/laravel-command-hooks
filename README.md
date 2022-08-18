# Laravel Command Hooks

This package adds a `before` and `after` hook to Laravels command class.

## Usage
The methods are only called if they are defined inside you class. If you do not need them, do not implement them. 
The `after` method will get the exit code of the executed command, you can manipulate the exit code inside the `after` 
method and overwrite it by returning you own exit code. Returning `null` or nothing will keep the original exit code.
```php
use \Regnerisch\LaravelCommandHooks\Command;

class MyCustomCommand extends Command
{
    protected function before(): void
    {
        // Do something before the command
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
