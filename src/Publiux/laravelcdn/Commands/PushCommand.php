<?php

namespace Publiux\laravelcdn\Commands;

use Illuminate\Console\Command;
use Publiux\laravelcdn\Contracts\CdnInterface;

/**
 * Class PushCommand.
 *
 * @category Command
 *
 * @author   Mahmoud Zalt <mahmoud@vinelab.com>
 * @author   Raul Ruiz <publiux@gmail.com>
 */
class PushCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'cdn:push {--ver= : The version number to append to the base path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Push assets to CDN';

    /**
     * an instance of the main Cdn class.
     *
     * @var Vinelab\Cdn\Cdn
     */
    protected $cdn;

    public function __construct(CdnInterface $cdn)
    {
        $this->cdn = $cdn;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!empty($this->option('ver'))) {
            $this->cdn->version($this->option('ver'));
        }

        $this->cdn->push();
    }
}
