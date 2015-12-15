<?php



/**
 * This class defines the structure of the 'libro_version' table.
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
class Libro_versionTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'proylectura.model.map.Libro_versionTableMap';

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
		$this->setName('libro_version');
		$this->setPhpName('Libro_version');
		$this->setClassname('Libro_version');
		$this->setPackage('proylectura.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('IDLIBRO', 'Idlibro', 'INTEGER', 'libro', 'ID', true, null, null);
		$this->addColumn('FECHA', 'Fecha', 'DATE', true, null, null);
		$this->addColumn('HORA', 'Hora', 'CHAR', true, 8, null);
		$this->addForeignKey('IDUSUARIO', 'Idusuario', 'INTEGER', 'usuario', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Libro', 'Libro', RelationMap::MANY_TO_ONE, array('idlibro' => 'id', ), null, null);
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('idusuario' => 'id', ), null, null);
	} // buildRelations()

} // Libro_versionTableMap
