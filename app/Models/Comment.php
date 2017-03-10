<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 14:07:09 +0100.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Comment
 * 
 * @property int $id
 * @property string $content
 * @property int $author
 * @property int $thread
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Comment extends Eloquent
{
	protected $casts = [
		'author' => 'int',
		'thread' => 'int'
	];

	protected $fillable = [
		'content',
		'author',
		'thread'
	];

    public function user() {
        return $this->belongsTo(User::class, 'author');
    }

    public function threadId() {
        return $this->belongsTo(Thread::class, 'thread');
    }

}
