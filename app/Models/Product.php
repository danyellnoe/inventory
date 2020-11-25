<?php

namespace App\Models;

use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'short_description',
        'description',
        'price',
        'on_layaway',
    ];

    /**
     * Get the Comments for the Product.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Get the Store to which the Product belongs.
     *
     * @return BelongsTo
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Get the Category to which the Product belongs.
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Format the product's price
     *
     * @return string
     */
    public function getFormattedPriceAttribute()
    {
        return money($this->price);
    }

    /**
     * Create a new product using information gathered from the form on the product inventory page
     *
     * @param array $productData
     * @return Product
     */
    public static function createFromInventory(array $productData)
    {
        // create comment if necessary
        $comment = isset($productData['comment']) && !empty(trim($productData['comment'])) ?
            new Comment(['body' => $productData['comment']]) : null;
        unset($productData['comment']);

        // storing money as an integer, so need to normalize
        $productData['price'] = Money::parseByDecimal((string) $productData['price'], config('money.defaultCurrency'))->getAmount();

        // normalize on_layaway flag
        if (isset($productData['on_layaway'])) {
            $productData['on_layaway'] = $productData['on_layaway'] == true ? 1 : 0;
        }

        // create new product and associate to store and category
        $product = new Product($productData);
        $product->store()->associate(Store::find($productData['store_id']));
        $product->category()->associate(Category::find($productData['category_id']));
        $product->save();

        // save related comment if applicable
        if ($comment) {
            $product->comments()->save($comment);
        }

        return $product;
    }
}
