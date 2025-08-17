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
        'organization',
        'designation',
        'department',
        'phone_number',
        'address',
        'state',
        'country',
        'zip_code',
        'language',
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

    public function getPasswordAttribute()
    {
        return null;
    }

    // public function getNameAttribute()
    // {
    //     return $this->name;
    // }

    // public function getFullAddressAttribute()
    // {
    //     return $this->address . ', ' . $this->state . ', ' . $this->country . ', ' . $this->zip_code;
    // }

    // public function getFullDetailsAttribute()
    // {
    //     return $this->name  . ', ' . $this->email . ', ' . $this->organization . ', '
    //         . $this->designation . ', ' . $this->phone_number . ', ' . $this->address . ',
    //         ' . $this->state . ', ' . $this->country . ', ' . $this->zip_code . ',
    //          ' . $this->language . ', ' . $this->timezone;
    // }

    // public function getFullNameAndEmailAttribute()
    // {
    //     return $this->name . ' (' . $this->email . ')';
    // }

    public static function getAccountDetails()
    {
        return self::all();
    }

    public static function storeAccountDetails($request)

    {

    $validated_data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'nullable|string|min:6',
        'organization' => 'nullable|string|max:255|unique:users,organization',
        'designation' => 'nullable|string|max:255',
        'phone_number' => 'required|string|max:20|unique:users,phone_number',
        'address' => 'nullable|string|max:500',
        'state' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'zip_code' => 'nullable|string|max:20',
        'language' => 'nullable|string|max:255',
        'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $account = new self();
    $account->name = $validated_data['name'];
    $account->email = $validated_data['email'];
    if (isset($validated_data['password'])) {
        $account->password = bcrypt($validated_data['password']);
    }
    if (isset($validated_data['profile_pic'])) {
        $account->profile_pic = $validated_data['profile_pic'];
    }
    $account->organization = $validated_data['organization'];
    $account->designation = $validated_data['designation'];
    $account->phone_number = $validated_data['phone_number'];
    $account->address = $validated_data['address'];
    $account->state = $validated_data['state'];
    $account->country = $validated_data['country'];
    $account->zip_code = $validated_data['zip_code'];
    $account->language = $validated_data['language'];


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
