<?php

namespace App\Traits;

use App\Enums\PublishmentEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait PublishmentTrait
{
  /**
   * Scope for draft
   */
  public function scopeDraft($query)
  {
    return $query->where('publishment', PublishmentEnum::DRAFT);
  }

  /**
   * Scope for review
   */
  public function scopeReview($query)
  {
    return $query->where('publishment', PublishmentEnum::REVIEW);
  }

  /**
   * Scope for published
   */
  public function scopePublished($query)
  {
    return $query->where('publishment', PublishmentEnum::PUBLISHED);
  }

  /**
   * Scope for archived
   */
  public function scopeArchived($query)
  {
    return $query->where('publishment', PublishmentEnum::ARCHIVED);
  }

  /**
   * Get publishment description
   */
  public function publishmentDescription(): Attribute
  {
    return Attribute::make(fn () => PublishmentEnum::getDescription($this->publishment));
  }
}
