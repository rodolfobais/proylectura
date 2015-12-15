<?php



/**
 * This class defines the structure of the 'solicitud' table.
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
class SolicitudTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'proylectura.model.map.SolicitudTableMap';

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
		$this->setName('solicitud');
		$this->setPhpName('Solicitud');
		$this->setClassname('Solicitud');
		$this->setPackage('proylectura.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_LIBRO', 'Id_libro', 'INTEGER', 'libro', 'ID', true, null, null);
		$this->addForeignKey('ID_USUARIO_SOLICITANTE', 'Id_usuario_solicitante', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addForeignKey('ID_ESTADO', 'Id_estado', 'INTEGER', 'solicitud_estado', 'ID', true, null, null);
		$this->addColumn('FECHA_SOLIC', 'Fecha_solic', 'DATE', false, null, null);
		$this->addColumn('HORA_SOLIC', 'Hora_solic', 'CHAR', false, 8, null);
		$this->addColumn('FECHA_APROB', 'Fecha_aprob', 'DATE', false, null, null);
		$this->addColumn('HORA_APROB', 'Hora_aprob', 'CHAR', false, 8, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Libro', 'Libro', RelationMap::MANY_TO_ONE, array('id_libro' => 'id', ), null, null);
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('id_usuario_solicitante' => 'id', ), null, null);
		$this->addRelation('Solicitud_estado', 'Solicitud_estado', RelationMap::MANY_TO_ONE, array('id_estado' => 'id', ), null, null);
	} // buildRelations()

} // SolicitudTableMap
