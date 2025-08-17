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

    public static function storeAccountDetails($request)

    {

    $validated_data = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:atul_ipr_account,email',
        'organization' => 'nullable|string|max:255|unique:atul_ipr_account,organization',
        'designation' => 'nullable|string|max:255',
        'phone_number' => 'required|string|max:20|unique:atul_ipr_account,phone_number',
        'address' => 'nullable|string|max:500',
        'state' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'zip_code' => 'nullable|string|max:20',
        'language' => 'nullable|string|max:255',
        'timezone' => 'nullable|string|max:255',
        'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $account = new self();
    $account->first_name = $validated_data['first_name'];
    $account->last_name = $validated_data['last_name'];
    $account->email = $validated_data['email'];
    $account->organization = $validated_data['organization'];
    $account->designation = $validated_data['designation'];
    $account->phone_number = $validated_data['phone_number'];
    $account->address = $validated_data['address'];
    $account->state = $validated_data['state'];
    $account->country = $validated_data['country'];
    $account->zip_code = $validated_data['zip_code'];
    $account->language = $validated_data['language'];
    $account->timezone = $validated_data['timezone'];


        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $timestamp = time(); // Generate timestamp
            $filename = $timestamp . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profile_pics'), $filename);
            $account->profile_pic = $filename;
        }


        $account->save();

    return redirect()->route('account.index')->with('success', 'Account details saved successfully.');

    }

}
