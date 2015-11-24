<?php



/**
 * This class defines the structure of the 'mensaje' table.
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
class MensajeTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'proylectura.model.map.MensajeTableMap';

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
		$this->setName('mensaje');
		$this->setPhpName('Mensaje');
		$this->setClassname('Mensaje');
		$this->setPackage('proylectura.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_USUARIO_DESTINATARIO', 'Id_usuario_destinatario', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addForeignKey('ID_USUARIO_REMITENTE', 'Id_usuario_remitente', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addColumn('MENSAJE', 'mensaje', 'CHAR', true, 800, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('UsuarioRelatedById_usuario_destinatario', 'Usuario', RelationMap::MANY_TO_ONE, array('id_usuario_destinatario' => 'id', ), null, null);
		$this->addRelation('UsuarioRelatedById_usuario_remitente', 'Usuario', RelationMap::MANY_TO_ONE, array('id_usuario_remitente' => 'id', ), null, null);
	} // buildRelations()

} // MensajeTableMap
