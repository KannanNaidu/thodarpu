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


defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Form\FormHelper;
use Joomla\CMS\Factory;

FormHelper::loadFieldClass('list');

class JFormFieldContacts extends JFormFieldList
{
    /**
     * The field type.
     * @var		string
     */
    protected $type = 'Contacts';

    /**
     * Method to get a list of options for a list input.
     * @return	array		An array of JHtml options.
     */
    protected function getOptions()
    {
        $db = Factory::getContainer()->get('DatabaseDriver');
        $query = $db->getQuery(true);

        $query->select('id,name');
        $query->from($db->quoteName('#__contact_details'));

        $db->setQuery((string)$query);
        $contacts = $db->loadObjectList();
        $options = array();

        if ($contacts) {
            foreach($contacts as $contact)
            {
                $options[] = JHtml::_('select.option', $contact->id, $contact->name);
            }
        }
        $options = array_merge(parent::getOptions(), $options);

        return $options;
    }
}
