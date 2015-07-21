# Halite 

Encrypted Cookies in PHP with Libsodium

An open source project by [Paragon Initiative Enterprises](https://paragonie.com).

## Usage Example

### Key Generation

First, you want to generate an encryption key.

```php
$key = new \ParagonIE\Halite\Key;
$key->generate();
echo \Sodium::bin2hex($key->getKey());
```
#### (Optional) Password-Based Encryption Keys

First, store a sufficiently large random value. Then use it in conjunction with
your password to derive a key.

```php
$key = new \ParagonIE\Halite\Key;
$key->derive(
    // Password:
    'correct horse battery staple is now very shabby',
    // Salt:
    YOUR_STATIC_HALITE_PW_SALT
);
```

### Encrypted Cookie Storage

Next, save your key somewhere you can simply do the following:

```php
$key = new \ParagonIE\Halite\Key(\Sodium::hex2bin(SAVED_ENCRYPTION_KEY));
$cookie = new \ParagonIE\Halite\Cookie($key);
$cookie->store($key, $value);
```

### Retrieving Values from Encrypted Cookies

Next, save your key somewhere you can simply do the following:

```php
$value = $cookie->fetch($key);
```