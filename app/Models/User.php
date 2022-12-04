<?php

namespace App\Models;

use App\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'phone',
        'photo',
        'code',
        'is_blocked',
        'email',
        'password',
    ];

    protected $with = ['roles.permissions'];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_blocked' => 'boolean'
    ];

    public function getLongNameAttribute()
    {
        $full = "{$this->firstname} {$this->middlename} {$this->lastname}";
        return Str::title($full);
    }

    public function getIsBlockedAttribute($value){
        return (bool) $value;
    }

    public function setIsBlockedAttribute($value)
    {
        $this->attributes['is_blocked'] = (int) $value;
    }

//    public function getRouteKeyName()
//    {
//        return 'username';
//    }

    public function setCodeAttribute($value){
        $code = time();
        while(User::whereCode($code)->exists())
        {
            $code = time();
        }
        $this->attributes['code'] = $code;
    }

    public function getDateOfBirthAttribute($value){
        return Carbon::parse($value)->format('F j, Y');
    }

    /**
     * Get the user's avatar.
     *
     * @return string
     */
    public function getPhotoAttribute()
    {
        return $this->photo ?? 'https://harde.s3.us-east-2.amazonaws.com/uiux.png';
    }
    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function storeWebsite(){
        return $this->store()->exists() ? $this->store()->name : 'You do not have any store yet.';
    }

    public function storeExists(){
        return $this->store()->exists();
    }

    /**
     * Get all of the page's images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'user_id', 'id');
    }

    public function store(){
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function preferences(){
        return $this->hasOne(UserPreferences::class, 'user_id', 'id');
    }

    public function resources(){
        return $this->morphMany(Resource::class, 'resourceable');
    }

    public function applicationUrl(){
        if($this->application()){
            return url('/resources/', $this->id.'/'.$this->application()->filename );
        }
        return '#';
    }

    public function application(){
        return $this->resources()->where('type', 'application')->first();
    }

    public function setUsernameAttribute($value)
    {
        $username = $value;
        if (User::whereUsername($value)->exists() && $value != null) {
            $firstName = Str::lower($this->attributes['firstname']);
            $lastName = Str::lower($this->attributes['lastname']);

            $username = $firstName.'.'.$lastName;

            $i = 0;
            while (User::whereUsername($username)->exists()) {
                $i++;
                $username = $firstName.'.'.$lastName.$i;
            }
        }

        $this->attributes['username'] = $username;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    /**
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }

    /**
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function isAdministration(){
        return $this->hasRoles(['admin', 'moderator',
            'community-manager', 'editor','application', 'advertiser', 'super-admin']);
    }
    public function joinedDate(){
        return Carbon::parse($this->created_at)->format('F j, Y');
    }
    public function joinedTime(){
        return Carbon::parse($this->created_at)->format('h:i:s A');
    }

    public function isBlocked(){

        $this->update([ 'is_blocked' => !$this->is_blocked ]);
    }
    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
        ])->save();
    }
    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markPhoneAsVerified()
    {
        return $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function storeUrl()
    {
        if ($this->store()->exists()){
            return $this->store->domains()->first()?->domain;
        }else{
            return '#';
        }
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['storeSearch'] ?? false, function ($q, $search){
            $q->where('firstname', 'like','%'.$search.'%')
                ->orWhere('lastname', 'like','%'.$search.'%')
                ->orWhere('middlename', 'like','%'.$search.'%')
                ->orWhere('code', 'like','%'.$search.'%');
        })->when($filters['field'] ?? false, function ($query, $field) use($filters){
            $query->orderBy($field, $filters['sortAsc'] ? 'asc' : 'desc');
        })->when($filters['active'] ?? false, function ($q, $active){
            $q->where('is_blocked', $active);
        })->when($filters['storeId'] ?? false, function ($q, $store){
            $q->whereHas('store', function ($q) use($store){
                $q->where('id', $store);
            });
        })->where(function($q){
            $q->whereHas('roles', function ($q){
                $q->where('name', '<>', 'super-admin');
            });
        });

    }
}
