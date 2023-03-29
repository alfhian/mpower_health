<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Auth;

class LogManagement extends Model
{
    use HasFactory;

    protected $casts = [
        'id'            => 'encrypted',
        'ip'            => 'encrypted',
        'data_id'       => 'encrypted',
        'file_name'     => 'encrypted',
        'file_path'     => 'encrypted',
        'url'           => 'encrypted',
        'latitude'      => 'encrypted',
        'longitude'     => 'encrypted',
        'user_input'    => 'encrypted',
    ];

    public static function store($log_data, $log_detail) {
        if($log_data == false) {
            return true;
        }

        $data = new LogManagement;

        $data->ip           = $log_data->ip;
        $data->url          = $log_detail['url'];
        $data->log          = $log_detail['action'];
        $data->data_id      = array_key_exists('data_id', $log_detail) ? $log_detail['data_id'] : null;
        $data->file_name    = array_key_exists('file_name', $log_detail) ? $log_detail['file_name'] : null;
        $data->file_path    = array_key_exists('file_path', $log_detail) ? $log_detail['file_path'] : null;
        $data->latitude     = $log_data->latitude;
        $data->longitude    = $log_data->longitude;

        if(Auth::check()) {
            $data->user_input = Auth::id();
        } else {
            $data->user_input = $log_data->ip;
        }

        $data->save();

        return $data;
    }
}
