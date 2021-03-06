<?php
/**
 * [EMAIL] MOBILE メール送信データ
 *
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright 2008 - 2015, baserCMS Users Community <http://sites.google.com/site/baserusers/>
 *
 * @copyright		Copyright 2008 - 2015, baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Mail.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */
?>
<?php $group_field = null; ?>
<?php foreach($mailFields as $fields): ?>
<?php if ($field['use_field'] && $field['type'] != 'file' && isset($message[$field['field_name']]) && ($group_field != $field['group_field'] || (!$group_field && !$field['group_field']))) : ?>


◇◆ <?php echo $fields['MailField']['head']; ?> 
----------------------------
<?php endif; ?>
<?php if ($field['type'] != 'file' && !empty($fields['MailField']['before_attachment']) && !empty($message[$fields['MailField']['field_name']])): ?>
<?php echo " " . $fields['MailField']['before_attachment'] ?>
<?php endif; ?>
<?php if ($field['type'] != 'file' && !empty($message[$fields['MailField']['field_name']]) && !$fields['MailField']['no_send']): ?>
<?php echo $this->Maildata->control($fields['MailField']['type'], $message[$fields['MailField']['field_name']], $this->Mailfield->getOptions($fields)); ?>
<?php endif; ?>
<?php if ($field['type'] != 'file' && !empty($fields['MailField']['after_attachment']) && !empty($message[$fields['MailField']['field_name']])): ?>
<?php echo " " . $fields['MailField']['after_attachment']; ?>
<?php endif; ?>
<?php $group_field = $fields['MailField']['group_field']; ?>
<?php endforeach; ?>