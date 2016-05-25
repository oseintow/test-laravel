<?php
/**
 * Created by oseintow.
 * User: oseintow
 * Date: 5/24/16
 * Time: 7:19 PM
 */

namespace App\Console\Commands;

use Illuminate\Filesystem\Filesystem as File;

class ModelGenerator
{

    /**
     * @var File
     */
    private $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function make($path)
    {
        $name = basename($path, '.php');
        $template = $this->getTemplate($name);

        if( ! $this->file->exists($path)){
            return $this->file->put($path, $template);
        }

        return false;
    }

    private function getTemplate($name)
    {
        $template = $this->file->get(__DIR__ . "/templates/model.txt");

        return str_replace('{{name}}', $name, $template);
    }


}