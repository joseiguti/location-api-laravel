<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\JsonResponse;

/**
 * Controller to handle location-related API requests.
 */
class LocationController extends Controller
{
    /**
     * Returns a JSON response containing all locations.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $locations = Location::all([
            'id as code',
            'name',
            'image',
            'creation_date as creationDate',
        ]);

        return response()->json($locations);
    }
}
