<?php

namespace App\Enums;

enum FilterType: string {
    case CHECKBOX = '1';
    case RADIO = '2';
    case SLIDER = '3';

    public function label(): string {
        return match ($this) {
            FilterType::CHECKBOX => 'Чекбокс',
            FilterType::RADIO => 'Радиокнопка',
            FilterType::SLIDER => 'Слайдер'
        };
    }
}
