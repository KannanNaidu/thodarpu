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

use Joomla\CMS\Component\ComponentHelper;

$cparams = ComponentHelper::getParams('com_contact');



?>
<?php if($cparams->get('show_misc',1)): ?>
    <p class="text-gray-500 dark:text-gray-200 text-base"><?php echo str_replace(['<p>', '</p>'], '', $list->misc); ?></p>
<?php endif; ?>

<h3><?php echo $list->name; ?></h3>


<p class="text-gray-800 dark:text-gray-100" translate="no" typeof="PostalAddress">
    <?php if($cparams->get('show_name',1)): ?>
        <span class="font-bold" property="name"><?php echo $list->name; ?>,</span>
        <br>
    <?php endif; ?>
    <?php if($cparams->get('show_street_address',1)): ?>
        <span property="streetAddress"><?php echo $list->address; ?>,</span>
        <br>
    <?php endif; ?>
    <?php if($cparams->get('show_suburb',1)): ?>
        <span property="addressLocality"><?php echo $list->suburb; ?>,</span>
    <?php endif; ?>
    <?php if($cparams->get('show_postcode',1)): ?>
        <span property="postalCode"><?php echo $list->postcode; ?>,</span>
    <?php endif; ?>
    <?php if($cparams->get('show_state',1)): ?>
        <span property="addressRegion"><?php echo $list->state; ?>,</span>
        <br>
    <?php endif; ?>
    <?php if($cparams->get('show_country',1)): ?>
        <span property="addressCountry"><?php echo $list->country; ?></span>
    <?php endif; ?>
</p>
