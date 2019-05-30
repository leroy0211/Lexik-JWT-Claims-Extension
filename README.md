# Lexik-JWT-Claims-Extension
Easily adding extra Claims to lexik/LexikJWTAuthenticationBundle

Work-In-Progress

# Built-in Claims

* IpAddressClaim - Will add the client's IP address to the claims

# Create your own claim

To create your own claim create a new claim class by implementing the `ClaimInterface`. 
Tag it as `flexsounds.lexik.claim` and your claim will be added. 

**note** If you use `autoconfigure`, you don't have to tag this service. It's being done for you.

Example

```php
# App\Claims\RandomNumberClaim
class RandomNumberClaim implements ClaimInterface
{
    public function getName()
    {
        return 'random_number';
    }

    public function getValue()
    {
        return rand(0, 100);
    }
}
```
