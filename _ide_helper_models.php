<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Brand
 *
 */
	class Brand extends \Eloquent {}
}

namespace App{
/**
 * App\cate
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $product
 */
	class cate extends \Eloquent {}
}

namespace App{
/**
 * App\Color
 *
 */
	class Color extends \Eloquent {}
}

namespace App{
/**
 * App\Madein
 *
 */
	class Madein extends \Eloquent {}
}

namespace App{
/**
 * App\Material
 *
 */
	class Material extends \Eloquent {}
}

namespace App{
/**
 * App\Order
 *
 */
	class Order extends \Eloquent {}
}

namespace App{
/**
 * App\Product
 *
 * @property-read \App\cate $cate
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product_image[] $pimage
 * @property-read \App\User $user
 */
	class Product extends \Eloquent {}
}

namespace App{
/**
 * App\Product_image
 *
 * @property-read \App\Product $product
 */
	class Product_image extends \Eloquent {}
}

namespace App{
/**
 * App\Sale
 *
 */
	class Sale extends \Eloquent {}
}

namespace App{
/**
 * App\Size
 *
 */
	class Size extends \Eloquent {}
}

namespace App{
/**
 * App\Transaction
 *
 */
	class Transaction extends \Eloquent {}
}

namespace App{
/**
 * App\Type
 *
 */
	class Type extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $product
 */
	class User extends \Eloquent {}
}

