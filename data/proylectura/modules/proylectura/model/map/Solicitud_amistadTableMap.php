<?php



/**
 * This class defines the structure of the 'solicitud_amistad' table.
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
class Solicitud_amistadTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'proylectura.model.map.Solicitud_amistadTableMap';

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
		$this->setName('solicitud_amistad');
		$this->setPhpName('Solicitud_amistad');
		$this->setClassname('Solicitud_amistad');
		$this->setPackage('proylectura.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_USUARIO_SOLICITADO', 'Id_libro', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addForeignKey('ID_USUARIO_SOLICITANTE', 'Id_usuario_solicitante', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addColumn('ESTADO', 'estado', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('UsuarioRelatedById_libro', 'Usuario', RelationMap::MANY_TO_ONE, array('id_usuario_solicitado' => 'id', ), null, null);
		$this->addRelation('UsuarioRelatedById_usuario_solicitante', 'Usuario', RelationMap::MANY_TO_ONE, array('id_usuario_solicitante' => 'id', ), null, null);
	} // buildRelations()

} // Solicitud_amistadTableMap
