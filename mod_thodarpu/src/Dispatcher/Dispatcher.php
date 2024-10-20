<?php
/**
 * @package    thodarpu
 *
 * @version    1.0.0
 * @author     Kannan Naidu Venugopal <kannannaidu@gmail.com>
 * @copyright  Copyright (c) 2008 - 2024 Kannan Naidu Venugopal. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       https://www.kannannaidu.my
 */

namespace Kn\Module\Thodarpu\Site\Dispatcher;


\defined('_JEXEC') or die;

use Joomla\CMS\Dispatcher\AbstractModuleDispatcher;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Application\CMSApplicationInterface;
use Joomla\Input\Input;
use Joomla\Registry\Registry;
use Joomla\CMS\Helper\HelperFactoryAwareInterface;
use Joomla\CMS\Helper\HelperFactoryAwareTrait;

class Dispatcher extends AbstractModuleDispatcher implements HelperFactoryAwareInterface
{
    use HelperFactoryAwareTrait;

    protected function getLayoutData(): array
    {
        $data = parent::getLayoutData();

        $data['list'] = $this->getHelperFactory()->getHelper('ThodarpuHelper')->getContact($data['params'], $this->getApplication());

        return $data;
    }
}