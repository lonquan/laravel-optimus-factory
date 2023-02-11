<?php

namespace AntCool\OptimusFactory\Traits;

use AntCool\OptimusFactory\Factory;
use Illuminate\Database\Eloquent\Model;

trait UseOptimusId
{
    public static function bootUseOptimusId(): void
    {
        static::created(function (Model $model): void {
            if (!$model->getAttribute($model->getAttribute($model->getEncodeKey()))) {
                $model->{$model->getEncodeKey()} = app(Factory::class)->encode($model->getKey(), $model->getEncodeScene());
                $model->saveQuietly(['timestamps' => false]);
            }
        });
    }

    public function getEncodeKey(): string
    {
        return $this->encodeKey ?? 'encode_id';
    }

    public function getEncodeScene(): string
    {
        return $this->encodeScene ?? 'default';
    }
}
