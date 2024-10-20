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

namespace Kn\Module\Thodarpu\Site\Helper;

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\Database\DatabaseInterface;
use Joomla\Database\DatabaseQuery;
use Joomla\CMS\Language\Text;
use Joomla\Registry\Registry;
use Joomla\CMS\Application\SiteApplication;


class ThodarpuHelper
{
    public function getContact(Registry $params, SiteApplication $app)
    {
        // Get the Dbo and User object
        $db = Factory::getContainer()->get('DatabaseDriver');
        $user = $app->getIdentity();
        $cid   = $params->get('main_contact');

        $query = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('#__contact_details'))
            ->where($db->quoteName('id') . ' = :contactid')
            ->bind(':contactid', $cid);

        try {
            $db->setQuery($query);
            $thodar = $db->loadObject();
        } catch (\RuntimeException $e) {
            $app->enqueueMessage(Text::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');
            return [];
        }
        return $thodar;
    }

}
