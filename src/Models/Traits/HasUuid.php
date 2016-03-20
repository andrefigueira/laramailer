<?php

namespace Andrefigueira\Laramailer\Models\Traits;

use Uuid;

/**
 * Class HasUuid
 * @package Andrefigueira\Laramailer\Traits
 * @author Andre Figueira <andre@designfront.co.uk>
 */
trait HasUuid
{
    /**
     * Boot the Uuid trait for the model
     *
     * return @void
     */
    public static function bootHasUuid()
    {
        static::creating(function($model) {
            $model->incrementing = false;
            $model->{$model->getKeyName()} = (string) Uuid::uuid4();
        });
    }
}