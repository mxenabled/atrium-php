# Atrium-PHP

A PHP wrapper for the [MX Atrium API](https://atrium.mx.com). In order to make requests, you will need to [sign up for the MX Atrium API](https://atrium.mx.com/developers/sign_up) and get a `MX-API-KEY` and a  `MX-CLIENT-ID`.

### Usage

Then configure your instance with the following. (The `ENVIRONMENT` will be either `vestibule.mx.com` for the development environment or `atrium.mx.com` for the production environment.)
```php
use AtriumMX\AtriumClient;
$atriumClient = new AtriumClient('ENVIRONMENT', 'YOUR_MX_API_KEY', 'YOUR_MX_CLIENT_ID');
```

### Examples

The `/examples` directory contains various workflows and code snippets. You will first need to modify the line shown below in each example with the environment, YOUR-MX-API-KEY, and YOUR-MX-CLIENT-ID before running.
```php
$atriumClient = new AtriumClient('ENVIRONMENT', 'YOUR_MX_API_KEY', 'YOUR_MX_CLIENT_ID');
```
