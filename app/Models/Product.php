<?php

namespace App\Models;

use App\Scopes\StoreScope;
use App\Services\Stores;
use App\Traits\BelongsToStore;
use http\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Product extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'brand_id', 'shipping_weight', 'description', 'price', 'discounted_price',
        'return_policy_id', 'colour_id', 'fabric_pattern_id', 'gender_id', 'condition_id',
        'clothing_material_id', 'has_warranty', 'warranty_detail',
        'feature', 'seo_key_word','return_policy_id', 'brand_id', 'category_id', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean'
    ];
    public function setIsActiveAttribute($value)
    {
        $this->attributes['is_active'] = (int) $value;
    }

    public function condition(){
        return $this->belongsTo(Condition::class);
    }

    public function clothingMaterial(){
        return $this->belongsTo(ClothingMaterial::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function colour(){
        return $this->belongsTo(Colour::class);
    }

    public function returnPolicy(){
        return $this->belongsTo(ReturnPolicy::class);
    }

    public function productOptions(){
        return $this->hasMany(ProductOption::class, 'product_id', 'id');
    }

    public function productOption(){
        return $this->hasOne(ProductOption::class, 'product_id', 'id');
    }

    public function isInStock(){
        return !!$this->productOptions()->count();
    }

    public function isNew(){
        return Carbon::parse($this->created_at)->diffInDays(now()) < 7;
    }


    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function fabricPattern(){
        return $this->belongsTo(FabricPattern::class);
    }

    public function resources(){
        return $this->morphMany(Resource::class, 'resourceable');
    }
    public function resource(){
        return $this->morphOne(Resource::class, 'resourceable');
    }

    public function banner(){
        return $this->resources()->where('is_banner', true)->first();
    }

    public function thumbnail(){
        return $this->resources()->where('is_banner', false)->first();
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function scopeProductBanners($query){
        $query->whereHas('resources', function ($q){
            $q->where('is_banner', true);
        });
    }

    public function reviews(){
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function rate($star, $comment = null, $user = null){
        if ($star >5 || $star < 1){
            throw  new InvalidArgumentException('Rating must be between 1-5');
        }
        $this->reviews()
            ->firstOrNew([
                'user_id' => $user ? $user->id : auth()->id(),
            ])
            ->fill([
                'star' => $star,
                'comment' => $comment,
                'store_id' => $user ? auth()->user()->store_id : null
            ])->save();
    }

    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function ($q, $search){
            $q->where('name', 'like','%'.$search.'%');

        });
    }


}
