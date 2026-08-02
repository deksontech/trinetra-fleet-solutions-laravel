<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array
    {
        return [
            'service_type' => ['required', 'string', 'max:160'],
            'customer_type' => ['nullable', 'string', 'max:40'],
            'company_name' => ['nullable', 'string', 'max:160'],
            'full_name' => ['required', 'string', 'min:2', 'max:160'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['required', 'string', 'min:7', 'max:24'],
            'pickup_location' => ['nullable', 'string', 'max:190'],
            'destination' => ['nullable', 'string', 'max:190'],
            'trip_type' => ['nullable', 'string', 'max:80'],
            'pickup_date' => ['nullable', 'date'],
            'pickup_time' => ['nullable', 'date_format:H:i'],
            'return_date' => ['nullable', 'date'],
            'return_time' => ['nullable', 'date_format:H:i'],
            'passenger_count' => ['nullable', 'integer', 'min:1', 'max:10000'],
            'luggage_count' => ['nullable', 'integer', 'min:0', 'max:10000'],
            'vehicle_preference' => ['nullable', 'string', 'max:160'],
            'number_of_vehicles' => ['nullable', 'integer', 'min:1', 'max:1000'],
            'billing_type' => ['nullable', 'string', 'max:100'],
            'duration' => ['nullable', 'string', 'max:120'],
            'special_requirements' => ['nullable', 'string', 'max:3000'],
            'consent' => ['accepted'],
            'employee_count' => ['nullable', 'string', 'max:120'],
            'number_of_shifts' => ['nullable', 'string', 'max:120'],
            'office_locations' => ['nullable', 'string', 'max:500'],
            'pickup_zones' => ['nullable', 'string', 'max:500'],
            'contract_duration' => ['nullable', 'string', 'max:120'],
            'required_vehicle_types' => ['nullable', 'string', 'max:300'],
            'event_name' => ['nullable', 'string', 'max:190'],
            'venue' => ['nullable', 'string', 'max:190'],
            'event_dates' => ['nullable', 'string', 'max:190'],
            'delegate_count' => ['nullable', 'string', 'max:120'],
            'hotels' => ['nullable', 'string', 'max:500'],
            'airports' => ['nullable', 'string', 'max:500'],
            'coordinator_required' => ['nullable', 'string', 'max:40'],
            'wedding_date' => ['nullable', 'string', 'max:120'],
            'venues' => ['nullable', 'string', 'max:500'],
            'guest_count' => ['nullable', 'string', 'max:120'],
            'airport_transfers' => ['nullable', 'string', 'max:120'],
            'luxury_car_requirement' => ['nullable', 'string', 'max:300'],
            'bus_requirement' => ['nullable', 'string', 'max:300'],
            'monthly_kilometres' => ['nullable', 'string', 'max:120'],
            'chauffeur_required' => ['nullable', 'string', 'max:40'],
            'utm_source' => ['nullable', 'string', 'max:120'],
            'utm_medium' => ['nullable', 'string', 'max:120'],
            'utm_campaign' => ['nullable', 'string', 'max:120'],
        ];
    }
}
