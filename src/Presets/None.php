<?php

namespace Laravel\Presets\Presets;

class None extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public function install()
    {
        $this->updatePackages();
        $this->updateBootstrapping();

        $this->filesystem->deleteDirectory(resource_path('assets/js/components'));
        $this->filesystem->delete(resource_path('assets/sass/_variables.scss'));
        $this->filesystem->deleteDirectory(base_path('node_modules'));
        $this->filesystem->deleteDirectory(public_path('css'));
        $this->filesystem->deleteDirectory(public_path('js'));
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected function updatePackageArray(array $packages): array
    {
        unset(
            $packages['bootstrap-sass'],
            $packages['jquery'],
            $packages['vue'],
            $packages['babel-preset-react'],
            $packages['react'],
            $packages['react-dom']
        );

        return $packages;
    }

    /**
     * Write the stubs for the Sass and JavaScript files.
     *
     * @return void
     */
    protected function updateBootstrapping()
    {
        $this->filesystem->put(resource_path('assets/sass/app.scss'), '' . PHP_EOL);
        $this->filesystem->copy($this->stubPath('/app.js'), resource_path('assets/js/app.js'));
    }
}
