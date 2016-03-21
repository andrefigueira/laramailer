# laramailer
A re-usable mailer component, which can send emails, and also store them for later use

## Installation

    composer require andrefigueira\laramailer

## Setup

### Service provider

Add the `LaramailerServiceProvider` to your `config/app.php`

    Laramailer\Providers\LaramailerServiceProvider::class
    
Add the `Uuid` class as an alias in your `config/app.php`

    'Uuid'      => Rhumsaa\Uuid\Uuid::class,
    
### Migrations and views publish
    
Run `php artisan vendor:publish` to copy the views and migrations

### Database table

Run `php artisan migrate` to install the emails table

### Add the config variables to your env file
    
    MAIL_NOREPLY=noreply@email.com
    MAIL_NOREPLY_NAME=ServiceName

## Usage

    use Laramailer\Utility\Mailer;
    
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
