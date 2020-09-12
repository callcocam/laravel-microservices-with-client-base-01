<?php

use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('translations')->delete();
        $Tenant =  \App\Tenant::query()->where([
            'name'=>"localhost"
        ])->first();
        $languages = $this->language(new \Illuminate\Filesystem\Filesystem());
        foreach (json_decode($languages, true) as $key => $language) {
            if (!\App\Translation::query()->where('name', $key)->first()) {
                factory(\App\Translation::class)->create([
                    'tenant_id' => $Tenant->id,
                    'name' => $key,
                    'language' => app()->getLocale(),
                    'description' => $language
                ]);
            }
        }
    }
    public function language(\Illuminate\Filesystem\Filesystem $filesystem)
    {
        return $filesystem->get(resource_path(sprintf("lang/%s.json", app()->getLocale())), true);
    }
}
