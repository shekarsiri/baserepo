# Base Repository

## Example
### Repository
```

use ShekarSiri\BaseRepo\Crudable;
use ShekarSiri\BaseRepo\Pagination;
use ShekarSiri\BaseRepo\Repo;


/**
 * Interface LocationRepository
 *
 */
interface LocationRepository extends Crudable, Repo, Pagination
{

}

```

### Implementation
```

use Location;
use ShekarSiri\BaseRepo\CrudableTrait;
use ShekarSiri\BaseRepo\PaginationTrait;
use ShekarSiri\BaseRepo\RepoTrait;

/**
 * Class LocationRepositoryEloquent
 * 
 */
class LocationRepositoryEloquent implements LocationRepository
{
    use CrudableTrait, PaginationTrait, RepoTrait;

    private $queries = [
        'name' => 'LIKE'
    ];

    function __construct(Location $model)
    {
        $this->model = $model;
    }

}

```

```
use LocationRepository;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    /**
     * @var LocationRepository
     */
    private $repo;

    function __construct(LocationRepository $repo)
    {
        $this->middleware('auth', ['except' => ['autoComplete']]);
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $locations = $this->repo->pagination(10, [], $request->all());
        return response()->json($locations, 200);
    }

   
}
```