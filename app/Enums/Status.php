<?php

    namespace App\Enums;

    enum Status: string
    {
        case DONE = 'done';
        case FAILED = 'failed';
        case WAITING = 'waiting';

        public function state(): string
        {
            return match ($this) {
                Status::WAITING => 'waiting',
                Status::DONE => 'done',
                Status::FAILED => 'failed',
            };

        }

        public static function values(): array
        {
            return [
                self::DONE->value,
                self::FAILED->value,
                self::WAITING->value
            ];

        }
    }
