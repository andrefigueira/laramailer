# laramailer
A re-usable mailer component, which can send emails, and also store them for later use

## Installation

    composer require andrefigueira\laramailer

## Setup

### Service provider

Add the `LaramailerServiceProvider` to your `config/app.php`

    Andrefigueira\Laramailer\Providers\LaramailerServiceProvider::class
    
### Migrations and views publish
    
Run `php artisan vendor:publish` to copy the views and migrations

### Database table

Run `php artisan migrate` to install the emails table

## Usage

    use Andrefigueira\Laramailer\Utility\Mailer;
    
    $mailer = new Mailer();
    
    $mailer
        ->template('andrefigueira.laramailer.emails.default')
        ->to('andre@email.com')
        ->subject('Hey Andre!)
        ->with([
            'foo' => 'bar',
        ])
        ->send()
    ;