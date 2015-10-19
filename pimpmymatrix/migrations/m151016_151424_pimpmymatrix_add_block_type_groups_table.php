<?php
namespace Craft;

/**
 * The class name is the UTC timestamp in the format of mYYMMDD_HHMMSS_pluginHandle_migrationName
 */
class m151016_151424_pimpmymatrix_add_block_type_groups_table extends BaseMigration
{
	/**
	 * Any migration code in here is wrapped inside of a transaction.
	 *
	 * @return bool
	 */
	public function safeUp()
	{
		// Create the craft_pimpmymatrix_blocktypegroups table
		craft()->db->createCommand()->createTable('pimpmymatrix_blocktypegroups', array(
			'fieldId'           => array('column' => 'integer', 'required' => true),
			'matrixBlockTypeId' => array('column' => 'integer', 'required' => true),
			'tabName'           => array('maxLength' => 255, 'column' => 'varchar', 'required' => true),
			'context'           => array('required' => true),
		), null, true);

		// Add foreign keys to craft_pimpmymatrix_blocktypegroups
		craft()->db->createCommand()->addForeignKey('pimpmymatrix_blocktypegroups', 'fieldId', 'fields', 'id', 'CASCADE', null);
		craft()->db->createCommand()->addForeignKey('pimpmymatrix_blocktypegroups', 'matrixBlockTypeId', 'matrixblocktypes', 'id', 'CASCADE', null);

		return true;
	}
}
