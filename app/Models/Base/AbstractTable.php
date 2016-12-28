<?php

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rhumsaa\Uuid\Uuid;

/**
 * App\Models\Base\AbstractTable
 *
 * @mixin \Eloquent
 * @property-read mixed $created_at
 * @property-read mixed $updated_at
 * @property-read mixed $deleted_at
 */
class AbstractTable extends Model
{
	use SoftDeletes;

	const CREATED_AT = 'CreatedAt';
	const UPDATED_AT = 'UpdatedAt';
	const DELETED_AT = 'DeletedAt';

	public $timestamps = true;
	protected $guarded = [];
	protected $primaryKey = 'Id';
	public $incrementing = false;

	public function __toString() {
		return json_encode($this->attributes, JSON_UNESCAPED_UNICODE);
	}

	public static function findByName($idOrName) {
		$byName = static::whereName($idOrName);
		if ($byName->count() == 1) {
			return $byName->first();
		}
		$byId = static::whereId($idOrName)->first();
		if ($byId) {
			return $byId;
		}
		return null;
	}

	protected static function boot() {
		parent::boot();
		static::creating(function ($model) {
			$idField = $model->getKeyName();
			if (empty($model->$idField)) {
				$model->$idField = $model->generateNewId();
			}
		});
	}

	public function generateNewId() {
		return (string)Uuid::uuid4();
	}

	public function getDates() {
		return [];
	}

	/* Implements "Public Morozov" antipattern for debug purposes */
	public function getAttributes() {
		return $this->attributes;
	}

	public function getCreatedAtAttribute($value) {
		return new Carbon($value);
	}
	public function getUpdatedAtAttribute($value) {
		return new Carbon($value);
	}
	public function getDeletedAtAttribute($value) {
		return new Carbon($value);
	}
	//
}
