<?php

namespace App\Models\RealEstate;

use App\Models\User;
use App\Traits\HasFeatured;
use App\Traits\HasGallery;
use App\Traits\HasRealEstateStatus;
use App\Traits\HasThumbnail;
use Conner\Tagging\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia, Viewable
{
    use HasFactory;
    use InteractsWithMedia;
    use Taggable;
    use Sluggable;
    use InteractsWithViews;
    use SluggableScopeHelpers;
    use HasRealEstateStatus;
    use HasThumbnail;
    use HasFeatured;
    use HasGallery;

    protected $table = 'r_e_projects';

    protected $fillable = [
        'name',
        'contents',
        'location',
        'number_block',
        'number_floor',
        'number_flat',
        'date_finish',
        'date_sell',
        'description',
        'price_from',
        'price_to',
        'latitude',
        'longitude',
        'is_featured',
        'status',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'r_e_project_category', 'project_id', 'category_id');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'r_e_project_feature', 'project_id', 'feature_id');
    }

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'r_e_project_facility', 'project_id', 'facility_id')->withPivot('distance');
    }

    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }

    public function city()
    {
        return $this->belongsTo(Investor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->fit(Manipulations::FIT_STRETCH, 850, 650)
            ->performOnCollections('thumbnail');

        $this->addMediaConversion('gallery')
            ->fit(Manipulations::FIT_STRETCH, 1904, 1006)
            ->performOnCollections('gallery');
    }
}
