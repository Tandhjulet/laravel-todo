<?php

namespace App\Enums;

enum TaskPriority: string {
    case HIGH = "high";
	case MEDIUM = "medium";
	case LOW = "low";

	public function color(): string  {
		return match($this) {
			TaskPriority::HIGH => "red",
			TaskPriority::MEDIUM => "yellow",
			TaskPriority::LOW => "aqua",
		};
	}
}
