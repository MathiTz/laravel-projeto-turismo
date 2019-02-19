<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $casts = [
        'is_promotion' => 'boolean'
    ];

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
//        $data['airport_origin_id'] = $request->origin;
//        $data['airport_destination_id'] = $request->destination;
        $data = $request->all();
        $data['image'] = $nameFile;

        return $this->create($data);
    }

    public function updateFlight($request, $nameFile = '')
    {
//        $data['airport_origin_id'] = $request->origin;
//        $data['airport_destination_id'] = $request->destination;
        $data = $request->all();
        $data['image'] = $nameFile;

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

    public function search($request, $totalPage)
    {
        $flights = $this->where(function($query) use($request){
            if($request->code && isset($request->code)){
                $query->where('id', $request->code);
            }

            if($request->date && isset($request->date)){
                $query->where('date', '>=', $request->date);
            }

            if($request->hour_output && isset($request->hour_output)){
                $query->where('hour_output', $request->hour_output);
            }

            if($request->total_stops && isset($request->total_stops)){
                $query->where('total_stops', $request->total_stops);
            }

            if($request->origin && isset($request->origin)){
                $query->where('airport_origin_id',
                    $request->airport_origin_id);
            }

            if($request->destination && isset($request->destination)){
                $query->where('airport_destination_id',
                    $request->airport_destination_id);
            }
        })->paginate($totalPage);
        dd($request);
        return $flights;
    }

//    public function getDateAttribute($value)
//    {
//        return \Carbon\Carbon::parse($value)->format('d/m/Y');
//    }
}
