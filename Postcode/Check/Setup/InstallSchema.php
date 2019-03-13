<?php

/**
* Copyright © 2016 Magento. All rights reserved.
* See COPYING.txt for license details.
*/

namespace Postcode\Check\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
    * {@inheritdoc}
    * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
    */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
          /**
          * Create table 'greeting_message'
          */

          $installer = $setup;

          $installer->startSetup();

          if (!$installer->tableExists('postcode_check')) {

          $table = $setup->getConnection()
              ->newTable($setup->getTable('postcode_check'))
              ->addColumn(
                  'id',
                  \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                  null,
                  ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                  'id'
              )
              ->addColumn(
                  'postcode',
                  \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                  255,
                  ['nullable' => false, 'default' => ''],
                    'postcode'
              )
              ->addColumn(
                  'status',
                  \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                  255,
                  ['nullable' => false, 'default' => ''],
                  'status'
              )->setComment("Postcode service check");
          $setup->getConnection()->createTable($table);
      }

      $installer->endSetup();

    }
}