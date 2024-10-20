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

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\CMS\Installer\InstallerScriptInterface;
use Joomla\CMS\Language\Text;

return new class () implements InstallerScriptInterface {

    private string $minimumJoomla = '5.1.0';
    private string $minimumPhp    = '8.2.0';

    public function install(InstallerAdapter $adapter): bool
    {
        echo Text::_('MOD_THODARPU_INSTALLERSCRIPT_INSTALL');
        return true;
    }

    public function update(InstallerAdapter $adapter): bool
    {

        echo Text::_('MOD_THODARPU_INSTALLERSCRIPT_UPDATE');
        return true;
    }

    public function uninstall(InstallerAdapter $adapter): bool
    {
        echo Text::_('MOD_THODARPU_INSTALLERSCRIPT_UNINSTALL');
        return true;
    }

    public function preflight(string $type, InstallerAdapter $adapter): bool
    {

        if (version_compare(PHP_VERSION, $this->minimumPhp, '<')) {
            Factory::getApplication()->enqueueMessage(sprintf(Text::_('JLIB_INSTALLER_MINIMUM_PHP'), $this->minimumPhp), 'error');
            return false;
        }

        if (version_compare(JVERSION, $this->minimumJoomla, '<')) {
            Factory::getApplication()->enqueueMessage(sprintf(Text::_('JLIB_INSTALLER_MINIMUM_JOOMLA'), $this->minimumJoomla), 'error');
            return false;
        }

        return true;
    }

    public function postflight(string $type, InstallerAdapter $adapter): bool
    {
        return true;
    }
};
