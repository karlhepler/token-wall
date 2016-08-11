Laravel Token Wall Middleware
------------------------------

## Installation

1. `composer require oldtimeguitarguy/token-wall`
2. Add the following to `config/app.php` providers array: `OldTimeGuitarGuy\Laravel\TokenWallServiceProvider::class,`
3. Run `php artisan vendor:publish`
4. Add `OldTimeGuitarGuy\Laravel\Middleware\TokenWall::class` to the line you require in `Http/Kernel.php`
5. Configure settings `config/token-wall.php`
