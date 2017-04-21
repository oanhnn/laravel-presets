<?php

namespace Laravel\Presets;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Traits\Macroable;
use InvalidArgumentException;

class PresetCommand extends Command
{
    use Macroable;

    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'preset { type : The preset type (none, bootstrap, react, vue) }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Swap the front-end scaffolding for the application';

    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (static::hasMacro($this->argument('type'))) {
            return call_user_func(static::$macros[$this->argument('type')], $this);
        }

        if (! in_array($this->argument('type'), ['none', 'bootstrap', 'vue', 'react'])) {
            throw new InvalidArgumentException('Invalid preset.');
        }

        $this->filesystem = $this->laravel->make('files');

        return $this->{$this->argument('type')}();
    }

    /**
     * Install the "fresh" preset.
     *
     * @return void
     */
    protected function none()
    {
        (new Presets\None($this->filesystem))->install();
        $this->info('Frontend scaffolding removed successfully.');
    }
    /**
     * Install the "fresh" preset.
     *
     * @return void
     */
    protected function bootstrap()
    {
        (new Presets\Bootstrap($this->filesystem))->install();
        $this->info('Bootstrap scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
    }
    /**
     * Install the "vue" preset.
     *
     * @return void
     */
    public function vue()
    {
        (new Presets\Vue($this->filesystem))->install();
        $this->info('Vue scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
    }
    /**
     * Install the "react" preset.
     *
     * @return void
     */
    public function react()
    {
        (new Presets\React($this->filesystem))->install();
        $this->info('React scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
    }
}
