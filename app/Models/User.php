<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getFullAddressAttribute()
    {
        return $this->address . ', ' . $this->state . ', ' . $this->country . ', ' . $this->zip_code;
    }

    public function getFullDetailsAttribute()
    {
        return $this->first_name . ' ' . $this->last_name . ', ' . $this->email . ', ' . $this->organization . ', '
            . $this->designation . ', ' . $this->phone_number . ', ' . $this->address . ',
            ' . $this->state . ', ' . $this->country . ', ' . $this->zip_code . ',
             ' . $this->language . ', ' . $this->timezone;
    }

    public function getFullNameAndEmailAttribute()
    {
        return $this->first_name . ' ' . $this->last_name . ' (' . $this->email . ')';
    }

    public static function getAccountDetails()
    {
        return self::all();
    }
}
