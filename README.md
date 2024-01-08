## Installation

You can install the package via composer:

```bash
composer require open-nebel/ewallet
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish "OpenNebel\EWallet\Providers\PackageServiceProvider"  
php artisan migrate
```

[//]: # ()

[//]: # (```bash)

[//]: # (php artisan vendor:publish --tag="wallet-config")

[//]: # (```)

## Usage

### Prepare User Model

```php

use Stephenjude\Wallet\Interfaces\Wallet;
use Stephenjude\Wallet\Traits\HasWallet;

class User extends Authenticatable implements Wallet
{
    use HasWallet;
}
```
