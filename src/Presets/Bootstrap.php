<?php

namespace Laravel\Presets\Presets;

class Bootstrap extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public function install()
    {
        $this->updatePackages();
        $this->updateSass();
        $this->removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array $packages
     * @return array
     */
    protected function updatePackageArray(array $packages): array
    {
        return [
                'bootstrap-sass' => '^3.3.7',
                'jquery' => '^3.1.1',
            ] + $packages;
    }

    /**
     * Update the Sass files for the application.
     *
     * @return void
     */
    protected function updateSass()
    {
        $this->filesystem->copy($this->stubPath('/_variables.scss'), resource_path('assets/sass/_variables.scss'));
        $this->filesystem->copy($this->stubPath('/app.scss'), resource_path('assets/sass/app.scss'));
    }
}
