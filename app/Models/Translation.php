<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'translation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'from_language',
        'to_language',
        'original_text',
        'translated_text',
        'suggested_text',
        'translatable',
        'suggestion_approved',
    ];

    public function user() {

        return $this->belongsTo('App\Models\User');
    }


    public function getFromLanguage() {
        return $this->getLabelForLanguage($this->from_language);
    }

    public function getToLanguage() {
        return $this->getLabelForLanguage($this->to_language);
    }

    public function getLabelForLanguage($key) {
        
        switch ($key) {
            case 'en':
                return 'English';
            case 'zu':
                return 'Zulu';
            case 'st':
                return 'Sesotho';
            default:
                return 'Unknown';
        }
    }
}
