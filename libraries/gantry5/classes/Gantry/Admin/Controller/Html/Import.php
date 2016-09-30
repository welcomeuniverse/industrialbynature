<?php
/**
 * @package   Gantry5
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2016 RocketTheme, LLC
 * @license   Dual License: MIT or GNU/GPLv2 and later
 *
 * http://opensource.org/licenses/MIT
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Gantry Framework code that extends GPL code is considered GNU/GPLv2 and later
 */

namespace Gantry\Admin\Controller\Html;

use Gantry\Component\Controller\HtmlController;
use Gantry\Framework\Gantry;
use Gantry\Framework\Importer;
use RocketTheme\Toolbox\File\YamlFile;

class Import extends HtmlController
{
    protected $httpVerbs = [
        'GET' => [
            '/'                 => 'index',
        ],
        'POST' => [
            '/'                 => 'import',
        ]
    ];

    public function index()
    {
        return $this->container['admin.theme']->render('@gantry-admin/pages/import/import.html.twig', $this->params);
    }

    public function import()
    {
        if (!isset($_FILES['file']['error']) || is_array($_FILES['file']['error'])) {
            throw new \RuntimeException('No file sent', 400);
        }

        // Check $_FILES['file']['error'] value.
        switch ($_FILES['file']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new \RuntimeException('No file sent', 400);
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new \RuntimeException('Exceeded filesize limit.', 400);
            default:
                throw new \RuntimeException('Unkown errors', 400);
        }

        $filename = $_FILES['file']['tmp_name'];
        
        if (!is_uploaded_file($filename)) {
            throw new \RuntimeException('No file sent', 400);
        }

        $file = YamlFile::instance($filename);
        $importer = new Importer;
        $importer->positions($file->content());
        $file->free();

        $this->params['success'] = true;

        return $this->container['admin.theme']->render('@gantry-admin/pages/import/import.html.twig', $this->params);
    }
}
