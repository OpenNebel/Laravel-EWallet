<p align="center"><img src="./art/social-card.png" alt="Social Card of Laravel E-wallet"></p>

# Manage Wallet and More with Eloquent Models
    


## Installation

You can install the package via composer:

```bash
composer require open-nebel/ewallet
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish "OpenNebel\EWallet\Providers\EWalletServiceProvider"  
php artisan migrate
```

[//]: # ()

[//]: # (```bash)

[//]: # (php artisan vendor:publish OpenNebel\EWallet\Providers\EWalletServiceProvider")

[//]: # (php artisan migrate)

[//]: # (```)

## Usage

### Prepare User Model

* app/Models/User.php

```php

use OpenNebel\EWallet\Interfaces\Wallet;
use OpenNebel\EWallet\Traits\HasWallet;

class User extends Authenticatable implements Wallet
{
    use HasWallet;
}
```

* config/wallet.php

```php
<?php

return [
    "owner_model" => "App\Models\User",
];


```

### Manage Wallets

```php
    $user = User::find(1);
    
    // Add Wallet with default name and default currency
    $user->addWallet();
    
    // or Add Wallet with name and currency
    $user->addWallet(name: "Text", currency: $currency->id);
    
    // Or Add Wallet with balance
    $user->addWallet(balance: 1000);

    $user->getWallets();
    // RESULTAT
    [
        {
            "id": 1,
            "name": "US Dollar Wallet",
            "owner_type": "App\\Models\\User",
            "owner_id": 1,
            "balance": "0.00",
            "currency_id": 7,
            "created_at": "2024-01-09T09:38:25.000000Z",
            "updated_at": "2024-01-09T09:38:25.000000Z"
        },
        {
            "id": 2,
            "name": "Text",
            "owner_type": "App\\Models\\User",
            "owner_id": 1,
            "balance": "0.00",
            "currency_id": 10,
            "created_at": "2024-01-09T09:56:43.000000Z",
            "updated_at": "2024-01-09T09:56:43.000000Z"
        }
    ]

    // Retrieve a specific wallet
    $wallet = Wallet::find(1);
    
    $user->getWallet($wallet); // by instance
    
    $user->getWallet(1); // by ID
    
    $user->getWallet("US Dollar Wallet"); // by name

    // RESULT
    {
        "id": 1,
        "name": "US Dollar Wallet",
        "owner_type": "App\\Models\\User",
        "owner_id": 1,
        "balance": "0.00",
        "currency_id": 7,
        "created_at": "2024-01-09T09:38:25.000000Z",
        "updated_at": "2024-01-09T09:38:25.000000Z"
    }

```

