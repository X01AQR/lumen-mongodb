<?php

namespace App\Traits;

use Jenssegers\Mongodb\Eloquent\Model;

trait Sluggable
{
    protected static function bootSluggable()
    {
        $callAddSlug = function (Model $model) {
            $model->addSlug('en');
            $model->addSlug('ar');
        };

        static::creating($callAddSlug);
        static::updating($callAddSlug);
    }

    protected function addSlug(string $lang)
    {
        if (!isset($this->name) || !isset($this->name[$lang])) {
            return;
        }

        $pureSlug = $this->generateSlug($this->name[$lang]);
        $slug = $pureSlug;

        $slug_id = 0;
        while ($this->slugExists($slug, $lang)) {
            $slug = $pureSlug . '-' . (++$slug_id);
        }

        $this->slug = $this->slug ?? [];
        $this->slug = array_merge($this->slug, [$lang => $slug]);
    }

    protected function generateSlug($str, $limit = null)
    {
        if ($limit) {
            $str = mb_substr($str, 0, $limit, "utf-8");
        }

        $text = html_entity_decode($str, ENT_QUOTES, 'UTF-8');
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        // trim
        $text = trim($text, '-');
        return strtolower($text);
    }

    protected function slugExists(string $slug, string $lang): bool
    {
        $query = static::withTrashed()->where('slug.' . $lang, $slug)
            ->where('_id', '!=', $this->_id);
        return $query->exists();
    }
}
