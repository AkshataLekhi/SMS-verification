<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;

use Sparrow;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    // public function branch()
    // {
    //     return $this->belongsTo(Branch::class);
    // }

    // public function department()
    // {
    //     return $this->belongsTo(Department::class);
    // }

    // public function designation()
    // {
    //     return $this->belongsTo(Designation::class);
    // }


    /**

     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'number',
        'verify_code',
        'password',
    ];

    /**

     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'number_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function booted()
    {
        static::creating(function ($user) {

            $otp_code = rand(11111, 99999);
            $user->verify_code = $otp_code;

            // Sparrow API HTTP client

            $response = Http::post('https://api.sparrowsms.com/v2/sms', [
                'token' => 'v2_VBVeVE6WkskKT7FiQhCa78tCCJM.3PVy',
                'from' => 'TheAlert',
                'to' => $user->number,
                'text' => 'Your otp verification code is: ' . $otp_code,
            ]);

        });
    }
}
