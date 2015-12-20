<?php

/*
 * This file is part of Laravel Markdown.
 *
 * (c) Ganapathi Chidambaram <ganapathi.rj@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TechnoBureau\reStructuredText;

use TechnoBureau\reStructuredText\Compilers\reStructuredTextCompiler;
use TechnoBureau\reStructuredText\Engines\BladereStructuredTextEngine;
use TechnoBureau\reStructuredText\Engines\PhpreStructuredTextEngine;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Engines\CompilerEngine;
use League\CommonMark\Converter;
use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\HtmlRenderer;

/**
 * This is the markdown service provider class.
 *
 * @author Ganapathi Chidambaram <ganapathi.rj@gmail.com>
 */
class reStructuredTextServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();

        if ($this->app->config->get('reStructuredText.views')) {
            $this->enablereStructuredTextCompiler($this->app);
            $this->enablePhpreStructuredTextEngine($this->app);
            $this->enableBladereStructuredTextEngine($this->app);
        }
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/../config/reStructuredText.php');
        if (class_exists('Illuminate\Foundation\Application', false)) {
            $this->publishes([$source => config_path('reStructuredText.php')]);
        }

        $this->mergeConfigFrom($source, 'reStructuredText');
    }

    /**
     * Enable the markdown compiler.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function enablereStructuredTextCompiler(Application $app)
    {
        $app->view->getEngineResolver()->register('rst', function () use ($app) {
            $compiler = $app['reStructuredText.compiler'];

            return new CompilerEngine($compiler);
        });

        $app->view->addExtension('rst', 'rst');
    }

    /**
     * Enable the php markdown engine.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function enablePhpreStructuredTextEngine(Application $app)
    {
        $app->view->getEngineResolver()->register('phprst', function () use ($app) {
            $reStructuredText = $app['reStructuredText'];

            return new PhpreStructuredTextEngine($reStructuredText);
        });

        $app->view->addExtension('rst.php', 'phprst');
    }

    /**
     * Enable the blade markdown engine.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function enableBladereStructuredTextEngine(Application $app)
    {
        $app->view->getEngineResolver()->register('bladerst', function () use ($app) {
            $compiler = $app['blade.compiler'];
            $reStructuredText = $app['reStructuredText'];

            return new BladereStructuredTextEngine($compiler, $reStructuredText);
        });

        $app->view->addExtension('rst.blade.php', 'bladerst');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerEnvironment($this->app);
        $this->registerreStructuredText($this->app);
        $this->registerCompiler($this->app);
    }

    /**
     * Register the environment class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function registerEnvironment(Application $app)
    {
        $app->singleton('reStructuredText.environment', function ($app) {
            return Environment::createCommonMarkEnvironment();
        });

        $app->alias('reStructuredText.environment', Environment::class);
    }

    /**
     * Register the markdowm class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function registerreStructuredText(Application $app)
    {
        $app->singleton('reStructuredText', function ($app) {
            $environment = $app['reStructuredText.environment'];
            $docParser = new DocParser($environment);
            $htmlRenderer = new HtmlRenderer($environment);

            return new Converter($docParser, $htmlRenderer);
        });

        $app->alias('reStructuredText', Converter::class);
    }

    /**
     * Register the markdown compiler class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return void
     */
    protected function registerCompiler(Application $app)
    {
        $app->singleton('reStructuredText.compiler', function ($app) {
            $reStructuredText = $app['reStructuredText'];
            $files = $app['files'];
            $storagePath = $app->config->get('view.compiled');

            return new reStructuredTextCompiler($markdown, $files, $storagePath);
        });

        $app->alias('reStructuredText.compiler', reStructuredTextCompiler::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'reStructuredText.environment',
            'reStructuredText',
            'reStructuredText.compiler',
        ];
    }
}
