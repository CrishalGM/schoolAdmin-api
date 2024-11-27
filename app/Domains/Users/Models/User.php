<?php

namespace App\Domains\Users\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Domains\Institutes\Models\Institute;
//use Fixico\Business\Models\Business;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
    public function institute(): BelongsTo
    {
        return $this->belongsTo(Institute::class);
    }
//    public function businessIds(): Collection
//    {
//        $businessIds = $this->businesses()->with('parent')->pluck('businesses.id');
//
//        $childrenIds = \Fixico\B2B\Domain\Business\Models\Business::query()
//            ->whereIn('parent_id', $businessIds) //User businesses ids as parents of any business
//            ->pluck('id');
//
//        return $businessIds->merge($childrenIds);
//    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
