<?php



/**
 * This class defines the structure of the 'lista_audiolibro' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.proylectura.model.map
 */
class Lista_audiolibroTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'proylectura.model.map.Lista_audiolibroTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('lista_audiolibro');
		$this->setPhpName('Lista_audiolibro');
		$this->setClassname('Lista_audiolibro');
		$this->setPackage('proylectura.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('ID_AUDIOLIBRO', 'Id_audiolibro', 'INTEGER', true, null, null);
		$this->addColumn('ID_LISTA', 'Id_lista', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // Lista_audiolibroTableMap
