<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 09:31:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Thread
 * 
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $author
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Thread extends Eloquent
{
	protected $casts = [
		'author' => 'int'
	];

	protected $fillable = [
		'title',
		'content',
		'author'
	];

    public function user() {
        return $this->belongsTo(User::class, 'author');
    }
}
