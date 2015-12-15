<?php



/**
 * This class defines the structure of the 'postulantes' table.
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
class PostulantesTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'proylectura.model.map.PostulantesTableMap';

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
		$this->setName('postulantes');
		$this->setPhpName('Postulantes');
		$this->setClassname('Postulantes');
		$this->setPackage('proylectura.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_LIBRO', 'Id_libro', 'INTEGER', 'libro', 'ID', true, null, null);
		$this->addForeignKey('ID_POSTULANTE', 'Id_postulante', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addColumn('ESTADO', 'Estado', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Libro', 'Libro', RelationMap::MANY_TO_ONE, array('id_libro' => 'id', ), null, null);
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('id_postulante' => 'id', ), null, null);
	} // buildRelations()

} // PostulantesTableMap
