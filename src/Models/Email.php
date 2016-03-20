<?php

namespace Andrefigueira\Laramailer\Models;

use Illuminate\Database\Eloquent\Model;
use Andrefigueira\Laramailer\Models\Traits\HasUuid;

/**
 * Class Email
 * @package App\Models\Email
 * @author Andre Figueira <andre@designfront.co.uk>
 */
class Email extends Model
{
    use HasUuid;

    /**
     * Fillable columns
     *
     * @var array
     */
    protected $fillable = [
        'to',
        'subject',
        'content',
        'template',
    ];

    /**
     * Get the content attribute as JSON
     *
     * @param $content
     * @return bool|mixed
     */
    public function getContentAttribute($content) {
        if ($content !== '') {
            return json_decode($content, true);
        }

        return false;
    }
}
