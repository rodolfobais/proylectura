<?php



/**
 * This class defines the structure of the 'notificacion' table.
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
class NotificacionTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'proylectura.model.map.NotificacionTableMap';

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
		$this->setName('notificacion');
		$this->setPhpName('Notificacion');
		$this->setClassname('Notificacion');
		$this->setPackage('proylectura.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_EMISOR', 'Id_emisor', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addForeignKey('ID_RECEPTOR', 'Id_receptor', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addColumn('DESCRIPCION', 'Descripcion', 'CHAR', true, 255, null);
		$this->addForeignKey('ID_TIPO_NOTIFICACION', 'Id_tipo_notificacion', 'INTEGER', 'tipo_notificacion', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('UsuarioRelatedById_emisor', 'Usuario', RelationMap::MANY_TO_ONE, array('id_emisor' => 'id', ), null, null);
		$this->addRelation('UsuarioRelatedById_receptor', 'Usuario', RelationMap::MANY_TO_ONE, array('id_receptor' => 'id', ), null, null);
		$this->addRelation('Tipo_notificacion', 'Tipo_notificacion', RelationMap::MANY_TO_ONE, array('id_tipo_notificacion' => 'id', ), null, null);
	} // buildRelations()

} // NotificacionTableMap
