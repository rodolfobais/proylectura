<?php



/**
 * This class defines the structure of the 'tipo_notificacion' table.
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
class Tipo_notificacionTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'proylectura.model.map.Tipo_notificacionTableMap';

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
		$this->setName('tipo_notificacion');
		$this->setPhpName('Tipo_notificacion');
		$this->setClassname('Tipo_notificacion');
		$this->setPackage('proylectura.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOMBRE', 'Nombre', 'CHAR', true, 50, null);
		$this->addColumn('IMAGEN', 'Imagen', 'CHAR', true, 150, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Notificacion', 'Notificacion', RelationMap::ONE_TO_MANY, array('id' => 'id_tipo_notificacion', ), null, null, 'Notificacions');
	} // buildRelations()

} // Tipo_notificacionTableMap
