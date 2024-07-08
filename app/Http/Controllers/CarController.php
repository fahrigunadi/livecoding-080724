<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CarController extends Controller
{
    public function index(Request $request)
    {
        Paginator::useBootstrapFive();

        $cars = Car::when($request->search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('license_plate', 'like', "%{$search}%")
                    ->orWhere('model', 'like', "%{$search}%")
                    ->orWhere('color', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        })->paginate(5);

        return view('car.index', ['cars' => $cars]);
    }

    public function create()
    {
        $companies = Company::all();

        return view('car.create', ['companies' => $companies]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'license_plate' => 'required|max:255',
            'model' => 'required|max:255',
            'color' => 'required|max:255',
            'description' => 'required|max:6000',
            'company' => 'required|exists:companies,id',
        ]);

        Car::create([
            'name' => $request->name,
            'license_plate' => $request->license_plate,
            'model' => $request->model,
            'color' => $request->color,
            'description' => $request->description,
            'company_id' => $request->company,
        ]);

        return to_route('cars.index')->with('success', $request->name . ' created successfully');
    }

    public function edit(Car $car)
    {
        $companies = Company::all();

        return view('car.edit', ['car' => $car, 'companies' => $companies]);
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required|max:255',
            'license_plate' => 'required|max:255',
            'model' => 'required|max:255',
            'color' => 'required|max:255',
            'description' => 'required|max:6000',
            'company' => 'required|exists:companies,id',
        ]);

        $car->update([
            'name' => $request->name,
            'license_plate' => $request->license_plate,
            'model' => $request->model,
            'color' => $request->color,
            'description' => $request->description,
            'company_id' => $request->company,
        ]);

        return to_route('cars.index')->with('success', $request->name . ' updated successfully');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return to_route('cars.index')->with('success', $car->name . ' deleted successfully');
    }
}
