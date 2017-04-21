<?php

namespace Laravel\Presets\Presets;

use Illuminate\Support\Arr;

class React extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public function install()
    {
        $this->ensureComponentDirectoryExists();
        $this->updatePackages();
        $this->updateWebpackConfiguration();
        $this->updateBootstrapping();
        $this->updateComponent();
        $this->removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected function updatePackageArray(array $packages): array
    {
        return [
                'babel-preset-react' => '^6.23.0',
                'react' => '^15.4.2',
                'react-dom' => '^15.4.2',
            ] + Arr::except($packages, ['vue']);
    }

    /**
     * Update the Webpack configuration.
     *
     * @return void
     */
    protected function updateWebpackConfiguration()
    {
        $this->filesystem->copy($this->stubPath('/webpack.mix.js'), base_path('webpack.mix.js'));
    }

    /**
     * Update the example component.
     *
     * @return void
     */
    protected function updateComponent()
    {
        $this->filesystem->delete(resource_path('assets/js/components/Example.vue'));
        $this->filesystem->copy($this->stubPath('/Example.js'), resource_path('assets/js/components/Example.js'));
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected function updateBootstrapping()
    {
        $this->filesystem->copy($this->stubPath('/app.js'), resource_path('assets/js/app.js'));
    }
}
