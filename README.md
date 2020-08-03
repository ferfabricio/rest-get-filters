# rest-get-filters

Filters for GET requests to be used in Laravel projects

## Motivation

There are several approaches to create filters in GET requests, including this one more approach to the subject, but many of them generate a lot of work for the developer to do something simple.

The main objective of this package is to do something simplistic and that works well.

## Usage

Steps to setup this package:
1. Add the Filterable trait;
2. Define the filters;
3. Apply the filters in you query;

### Add the Filterable trait

As a example model:

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    protected $fillable = [
        'name'
    ];
}
```

Add the trait `FerFabricio\RestGetFilters\FilterFactory\Filterable`.

```php
<?php

namespace App;

use FerFabricio\RestGetFilters\FilterFactory\Filterable;
use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    use Filterable;
  
    protected $fillable = [
        'name'
    ];
}
```

### Define the filters

You can define filters adding a protected parameter `$filters` as an array with the column name in the `keys` and the `value` the type of the filter that you will apply.

Each Filter has a constant called `IDENTIFIER` that needs to be used into the `$filters` definition.

```php
<?php

namespace App;

use FerFabricio\RestGetFilters\Traits\Filterable;
use FerFabricio\RestGetFilters\Filters\Date as DateFilter;
use FerFabricio\RestGetFilters\Filters\Like as LikeFilter;
use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
  use Filterable;
  
  protected $fillable = [
      'name'
  ];
  
  $filters = [
      'created_at' => DateFilter::IDENTIFIER,
      'name' => LikeFilter::IDENTIFIER
  ];
}
```

### Apply the filters in you query

The `Filterable` trait add to the Model a scope that apply all filters configured on `$filters` variable, to apply the scope on your query you need to call the `filters` method;

```php
<?php

namespace App\Http\Controllers;

use App\Example;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * List all Examples with filters
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request) : JsonResponse
    {
        // You need validate the input values
        $filters = $request->get('filters', []);
        $examples = Example::filters($filters)->get();
        return response()->json($examples);
    }
}
```

## Available Filters

- [Comparison](./src/Filters/Comparison.php)
- [Date](./src/Filters/Date.php)
- [Equal (this is the default filter)](./src/Filters/Equal.php)
- [Like](./src/Filters/Like.php)
