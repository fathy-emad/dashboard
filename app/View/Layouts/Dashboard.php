<?php

namespace App\View\Layouts;

use Closure;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Dashboard extends Component
{
    /**
     * Menu items.
     */
    public array $menu = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        foreach (config('menu') as $key => $value) {
            $this->menu[] = $this->formatMenuItem($key, $value);
        }
    }

    /**
     * Format menu item.
     */
    public function formatMenuItem(string $key, array $value): array
    {
        $title = __("menu.$key");
        if (isset($value['external']) && $value['external']) {
            $title .= ' <i class="ti ti-external-link ms-auto"></i>';
        }

        $url = isset($value['children']) ? '#' : ($value['url'] ?? route($value['route']));
        $active = isset($value['children']) ? false : $this->isActive($url);

        $item = [
            'url' => $url,
            'active' => $active,
            'title' => $title,
            'icon' => $value['icon'] ?? null,
            'external' => $value['external'] ?? false,
        ];

        if (isset($value['children'])) {
            $item['children'] = [];

            foreach ($value['children'] as $childKey => $childValue) {
                $item['children'][] = $this->formatMenuItem("$key.$childKey", $childValue);
            }
        }

        if (array_reduce($item['children'] ?? [], fn ($carry, $item) => $carry || $item['active'], false)) {
            $item['active'] = true;
        }

        return $item;
    }

    /**
     * Check if the current route is active.
     */
    public function isActive(string $url): bool
    {
        if ($url === url('/')) {
            return request()->is('/');
        }

        return str_starts_with(request()->url(), $url);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): ViewContract|Closure|string
    {
        return View::file(resource_path('layouts/dashboard.blade.php'), [
            'menu' => $this->menu,
            'user' => auth()->user(),
        ]);
    }
}
