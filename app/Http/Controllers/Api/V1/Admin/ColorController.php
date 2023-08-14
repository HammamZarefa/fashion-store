namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();

        return response()->json($colors);
    }

    public function store(Request $request)
    {
        $color = Color::create($request->all());

        return response()->json($color, 201);
    }

    public function show($id)
    {
        $color = Color::findOrFail($id);

        return response()->json($color);
    }

    public function update(Request $request, $id)
    {
        $color = Color::findOrFail($id);
        $color->update($request->all());

        return response()->json($color, 200);
    }

    public function destroy($id)
    {
        Color::destroy($id);

        return response()->json(null, 204);
    }
}

