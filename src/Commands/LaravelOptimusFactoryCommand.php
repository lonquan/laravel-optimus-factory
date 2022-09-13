<?php

namespace AntCool\OptimusFactory\Commands;

use Illuminate\Console\Command;
use Jenssegers\Optimus\Energon;
use Jenssegers\Optimus\Exceptions\InvalidPrimeException;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class LaravelOptimusFactoryCommand extends Command
{
    public $signature = 'optimus:generate
        {scene : Your scene name}
        {bits=31 : The number of bits used to obfuscate the integer. E.g. 16 bits will produce numbers in the range 0 to 65535.}';

    public $description = 'Generate a new set of prime config';

    public function handle(): int
    {
        $bitLength = intval($this->argument('bits'));
        $minBitLength = 4;
        $maxBitLength = 62;

        if (!filter_var(
            $bitLength,
            FILTER_VALIDATE_INT,
            ['options' => ['min_range' => $minBitLength, 'max_range' => $maxBitLength]]
        )) {
            throw new \InvalidArgumentException(
                "The bits option must be an integer between $minBitLength and $maxBitLength."
            );
        }

        [$prime, $inverse, $rand] = Energon::generate(
            null,
            $bitLength
        );

        $this->info(sprintf(
            "'%s' => ['prime' => %s, 'inverse' => %s, 'random' => %s]",
            $this->argument('scene'),
            $prime,
            $inverse,
            $rand
        ));

        return self::SUCCESS;
    }
}
