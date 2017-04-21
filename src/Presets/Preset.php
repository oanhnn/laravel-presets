<?php

namespace Laravel\Presets\Presets;

use Illuminate\Filesystem\Filesystem;

abstract class Preset
{
    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * Preset constructor.
     *
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * Install the preset.
     *
     * @return void
     */
    abstract public function install();

    /**
     * Update the given package array.
     *
     * @param array $packages
     * @return array
     */
    abstract protected function updatePackageArray(array $packages): array;

    /**
     * Ensure the component directories we need exist.
     *
     * @return void
     */
    protected function ensureComponentDirectoryExists()
    {
        if (! $this->filesystem->isDirectory(resource_path('assets/js/components'))) {
            $this->filesystem->makeDirectory(resource_path('assets/js/components'), 0755, true);
        }
    }

    /**
     * Update the "package.json" file.
     *
     * @return void
     */
    protected function updatePackages()
    {
        if (! $this->filesystem->exists(base_path('package.json'))) {
            return;
        }

        $packages = json_decode(file_get_contents(base_path('package.json')), true);
        $packages['devDependencies'] = $this->updatePackageArray(
            $packages['devDependencies']
        );
        ksort($packages['devDependencies']);

        $this->filesystem->put(
            base_path('package.json'),
            json_encode($packages, JSON_PRETTY_PRINT)
        );
    }

    /**
     * Remove the installed Node modules.
     *
     * @return void
     */
    protected function removeNodeModules()
    {
        $this->filesystem->deleteDirectory(base_path('node_modules'));
        $this->filesystem->delete(base_path('yarn.lock'));
    }

    /**
     * @param string $path
     * @return string
     */
    protected function stubPath(string $path = ''): string
    {
        $preset = str_singular(preg_replace('/.*\\/', '', static::class));
        $path = ltrim($path, '\\/');

        return rtrim(__DIR__ . "/../../resources/stubs/{$preset}/{$path}", '\\/');
    }
}
