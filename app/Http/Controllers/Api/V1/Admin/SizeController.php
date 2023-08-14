namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::all();

        return response()->json($sizes);
    }

    public function store(Request $request)
    {
        $size = Size::create($request->all());

        return response()->json($size, 201);
    }

    public function show($id)
    {
        $size = Size::findOrFail($id);

        return response()->json($size);
    }

    public function update(Request $request, $id)
    {
        $size = Size::findOrFail($id);
        $size->update($request->all());

        return response()->json($size, 200);
    }

    public function destroy($id)
    {
        Size::destroy($id);

        return response()->json(null, 204);
    }
}

