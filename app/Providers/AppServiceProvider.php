<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * validation rule that checks if the time range 
     * between time_from and time_to is unique and greater 
     * than the existing records,.
     */
    public function boot()
    {
        Validator::extend('unique_time_range', function ($attribute, $value, $parameters, $validator) {
            // Extract input values
            $timeFrom = $validator->getData()['time_from'];
            $timeTo = $validator->getData()['time_to'];
    
            // Query the database to check uniqueness of the time range
            $uniqueTimeRange = \DB::table('reservations')
                ->where('time_from', '<', $timeTo)
                ->where('time_to', '>', $timeFrom)
                ->where(function ($query) use ($timeFrom, $timeTo) {
                    $query->where(function ($subQuery) use ($timeFrom) {
                        $subQuery->where('time_from', '>=', $timeFrom)
                            ->orWhere('time_to', '>=', $timeFrom);
                    })
                    ->orWhere(function ($subQuery) use ($timeTo) {
                        $subQuery->where('time_from', '<=', $timeTo)
                            ->orWhere('time_to', '<=', $timeTo);
                    });
                })
                ->exists();
    
            // Return true if the time range is unique, false otherwise
            return !$uniqueTimeRange;
        });
    }
}
