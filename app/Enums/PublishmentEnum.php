<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Attributes\Description;

final class PublishmentEnum extends Enum
{
    #[Description('Draft')]
    const DRAFT = 1;

    #[Description('Review')]
    const REVIEW = 2;

    #[Description('Published')]
    const PUBLISHED = 3;

    #[Description('Archived')]
    const ARCHIVED = 4;
}
