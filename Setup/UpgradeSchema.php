<?php
namespace Mageget\Enquire\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
		$installer = $setup;

		$installer->startSetup();

		if(version_compare($context->getVersion(), '1.1.0')) {
			if (!$installer->tableExists('deep_mageget_message')) {
				$table = $installer->getConnection()->newTable(
					$installer->getTable('deep_mageget_message')
				)
				->addColumn(
					'id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					['identity' => true, 'nullable' => false, 'primary' => true],
					'Record Id'
				)->addColumn(
					'name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable' => false],
					'Sender Name'
				)->addColumn(
					'email',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'255',
					['nullable' => false],
					'Sender Email'
				)->addColumn(
					'phonenumber',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'255',
					['nullable' => false],
					'Sender phonenumber'
				)  
				->addColumn(
					'phonenumber',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'255',
					['nullable' => false],
					'Sender phonenumber'
				)  
				->addColumn(
					'dob',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'255',
					['nullable' => false],
					'Sender dob'
				)   
				->addColumn(
					'upload_file',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'255',
					['nullable' => false],
					'upload_file'
				)   
				->addColumn(
					'status',
					\Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
					null,
					['nullable' => false, 'default' => 0],
					'Status'
				)
				->addColumn(
					'created_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
					'Created At'
				)->addColumn(
					'update_time',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
					'Updated At'
				)->setComment(
					'Data Table'
				);
				$installer->getConnection()->createTable($table);

				$installer->getConnection()->addIndex(
					$installer->getTable('deep_mageget_message'),
					$setup->getIdxName(
						$installer->getTable('deep_mageget_message'),
						['name','email','phonenumber','dob','upload_file'],
						\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
					),
					['name','email','phonenumber','dob','upload_file'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				);
			}
		}

		$installer->endSetup();
	}
}