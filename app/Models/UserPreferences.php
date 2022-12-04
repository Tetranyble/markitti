<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreferences extends Model
{
    use HasFactory;

    protected $fillable = ['want_sms_notification', 'want_news_letter'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected $casts = [
      'want_news_letter' => 'boolean',
      'want_sms_notification' => 'boolean',
    ];

    public function setWantNewsLetterAttribute($value){
        $this->attributes['want_news_letter'] = (int) $value;
    }
    public function setWantSmsNotificationAttribute($value){

        $this->attributes['want_sms_notification'] = (int) $value;
    }

    public function wantNewsLetter(){
        return $this->want_news_letter ? 'ON' : 'OFF';
    }

    public function wantSmsNotification(){
        return $this->want_sms_notification ? 'ON' : 'OFF';
    }
}
