<?php



/**
 * This class defines the structure of the 'clasificados' table.
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
class ClasificadosTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'proylectura.model.map.ClasificadosTableMap';

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
		$this->setName('clasificados');
		$this->setPhpName('Clasificados');
		$this->setClassname('Clasificados');
		$this->setPackage('proylectura.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_LIBRO', 'Id_libro', 'INTEGER', 'libro', 'ID', true, null, null);
		$this->addColumn('TEXTO_CORTO', 'Texto_corto', 'CHAR', true, 100, null);
		$this->addColumn('TEXTO_LARGO', 'Texto_largo', 'CHAR', true, 250, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Libro', 'Libro', RelationMap::MANY_TO_ONE, array('id_libro' => 'id', ), null, null);
	} // buildRelations()

} // ClasificadosTableMap
