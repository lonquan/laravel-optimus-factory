<?php

namespace AntCool\OptimusFactory;

use AntCool\OptimusFactory\Exceptions\ConfigException;
use Jenssegers\Optimus\Optimus;

class Factory
{
    private array $instances = [];

    public function make(string $scene = 'default'): Optimus
    {
        $options = throw_unless(config('optimus-factory.' . $scene), ConfigException::class, 'Config key undefined.');

        return $this->instances[$scene] ?? $this->instances[$scene] = new Optimus(
                $options['prime'],
                $options['inverse'],
                $options['random'],
                $options['bits'] ?? Optimus::DEFAULT_SIZE
            );
    }

    public function encode(int $value, string $scene = 'default'): int
    {
        return $this->make($scene)->encode($value);
    }

    public function decode(int $value, string $scene = 'default'): int
    {
        return $this->make($scene)->decode($value);
    }
}
