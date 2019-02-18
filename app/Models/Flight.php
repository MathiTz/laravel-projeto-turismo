<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'plane_id',
        'airport_origin_id',
        'airport_destination_id',
        'date',
        'time_duration',
        'hour_output',
        'arrival_time',
        'old_price',
        'price',
        'total_plots',
        'is_promotion',
        'image',
        'qty_stops',
        'description',
    ];

    public function newFlight($request, $nameFile = '')
    {
        $data = $request->all();
        $data['airport_origin_id'] = $request->origin;
        $data['airport_destination_id'] = $request->destination;
        $data['image'] = $nameFile;

        return $this->create($data);
    }

    public function updateFlight($request)
    {
        $data = $request->all();
        $data['airport_origin_id'] = $request->origin;
        $data['airport_destination_id'] = $request->destination;


        return $this->update($data);
    }

    public function origin()
    {
        return $this
            ->belongsTo(Airport::class,
                'airport_origin_id');
    }

    public function destination()
    {
        return $this
            ->belongsTo(Airport::class,
                'airport_destination_id');
    }

//    public function getDateAttribute($value)
//    {
//        return \Carbon\Carbon::parse($value)->format('d/m/Y');
//    }
}
