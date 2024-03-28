<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class InformativeComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'created_at',
        'updated_at',
        'name',
        'message',
        'informativeId',
    ];
    protected $table = 'informative_comments';

//    protected $casts = [
//        'expires_at' => 'datetime'
//    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    public function getFormatedCreatedAt()
    {
        $data = Carbon::parse($this->created_at)->tz(Config::get('app.default_timezone'));
        return $data->format('d/m/Y H:i') . ' - ' . $data->diffForHumans();
    }

    public function getFormatedUpdatedAt()
    {

        $data = Carbon::parse($this->updated_at)->tz(Config::get('app.default_timezone'));
        return $data->format('d/m/Y H:i') . ' - ' . $data->diffForHumans();
    }
}
