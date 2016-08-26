<?php

namespace Modules\Seeders\Entities;

function faker(): Faker
{
    return app(Faker::class);
}
