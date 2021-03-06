<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 09:31:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Post
 * 
 * @property int $id
 * @property string $post_content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $author
 *
 * @package App\Models
 */
class Post extends Eloquent
{
	protected $casts = [
		'author' => 'int'
	];

	protected $fillable = [
		'post_content',
		'author'
	];

    public function user() {
        return $this->belongsTo(User::class, 'author');
    }
}
