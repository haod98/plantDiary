<?php

namespace App\Http\Controllers;

use App\Models\PlantImage;
use Illuminate\Http\Request;

class PlantImageController extends Controller
{
    public function destroy(Request $request, $id)
    {
        $image = PlantImage::findOrFail($id);
        $image->delete();
        return redirect('/dashboard');
        // dd($request, $id);
    }
}
