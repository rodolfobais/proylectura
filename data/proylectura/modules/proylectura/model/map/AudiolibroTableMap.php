<?php



/**
 * This class defines the structure of the 'audiolibro' table.
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
class AudiolibroTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'proylectura.model.map.AudiolibroTableMap';

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
		$this->setName('audiolibro');
		$this->setPhpName('Audiolibro');
		$this->setClassname('Audiolibro');
		$this->setPackage('proylectura.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOMBRE', 'Nombre', 'CHAR', true, 50, null);
		$this->addColumn('FECHA', 'Fecha', 'DATE', true, null, null);
		$this->addColumn('HASH', 'Hash', 'CHAR', true, 250, null);
		$this->addForeignKey('IDLIBRO', 'Idlibro', 'INTEGER', 'libro', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Libro', 'Libro', RelationMap::MANY_TO_ONE, array('idlibro' => 'id', ), null, null);
		$this->addRelation('Lista_audiolibro', 'Lista_audiolibro', RelationMap::ONE_TO_MANY, array('id' => 'id_audiolibro', ), null, null, 'Lista_audiolibros');
	} // buildRelations()

} // AudiolibroTableMap
