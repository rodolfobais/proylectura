<?php



/**
 * This class defines the structure of the 'usuario' table.
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
class UsuarioTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'proylectura.model.map.UsuarioTableMap';

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
		$this->setName('usuario');
		$this->setPhpName('Usuario');
		$this->setClassname('Usuario');
		$this->setPackage('proylectura.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOMBRE', 'Nombre', 'CHAR', true, 255, null);
		$this->addColumn('MAIL', 'mail', 'CHAR', true, 100, null);
		$this->addColumn('PASSWORD', 'Password', 'CHAR', true, 255, null);
		$this->addColumn('ADMIN', 'Admin', 'INTEGER', true, null, null);
		$this->addColumn('EDUCACION', 'Educacion', 'CHAR', false, 255, null);
		$this->addColumn('LUGAR', 'Lugar', 'CHAR', false, 255, null);
		$this->addColumn('NOTA', 'Nota', 'CHAR', false, 255, null);
		$this->addColumn('ESTADO', 'Estado', 'CHAR', false, 1, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('AmistadRelatedById_usuario', 'Amistad', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario', ), null, null, 'AmistadsRelatedById_usuario');
		$this->addRelation('AmistadRelatedByid_usuarioamigo', 'Amistad', RelationMap::ONE_TO_MANY, array('id' => 'id_usuarioamigo', ), null, null, 'AmistadsRelatedByid_usuarioamigo');
		$this->addRelation('Calificacion', 'Calificacion', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario', ), null, null, 'Calificacions');
		$this->addRelation('Comentario', 'Comentario', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario', ), null, null, 'Comentarios');
		$this->addRelation('LibroRelatedByUsuario_ult_acc', 'Libro', RelationMap::ONE_TO_MANY, array('id' => 'usuario_ult_acc', ), null, null, 'LibrosRelatedByUsuario_ult_acc');
		$this->addRelation('LibroRelatedById_usuario', 'Libro', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario', ), null, null, 'LibrosRelatedById_usuario');
		$this->addRelation('Usuario_intereses', 'Usuario_intereses', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario', ), null, null, 'Usuario_interesess');
		$this->addRelation('Lista', 'Lista', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario', ), null, null, 'Listas');
		$this->addRelation('Libro_colaborador', 'Libro_colaborador', RelationMap::ONE_TO_MANY, array('id' => 'idusuario', ), null, null, 'Libro_colaboradors');
		$this->addRelation('Libro_version', 'Libro_version', RelationMap::ONE_TO_MANY, array('id' => 'idusuario', ), null, null, 'Libro_versions');
		$this->addRelation('MensajeRelatedById_usuario_destinatario', 'Mensaje', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario_destinatario', ), null, null, 'MensajesRelatedById_usuario_destinatario');
		$this->addRelation('MensajeRelatedById_usuario_remitente', 'Mensaje', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario_remitente', ), null, null, 'MensajesRelatedById_usuario_remitente');
		$this->addRelation('NotificacionRelatedById_emisor', 'Notificacion', RelationMap::ONE_TO_MANY, array('id' => 'id_emisor', ), null, null, 'NotificacionsRelatedById_emisor');
		$this->addRelation('NotificacionRelatedById_receptor', 'Notificacion', RelationMap::ONE_TO_MANY, array('id' => 'id_receptor', ), null, null, 'NotificacionsRelatedById_receptor');
		$this->addRelation('Solicitud_amistadRelatedById_libro', 'Solicitud_amistad', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario_solicitado', ), null, null, 'Solicitud_amistadsRelatedById_libro');
		$this->addRelation('Solicitud_amistadRelatedById_usuario_solicitante', 'Solicitud_amistad', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario_solicitante', ), null, null, 'Solicitud_amistadsRelatedById_usuario_solicitante');
		$this->addRelation('Solicitud', 'Solicitud', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario_solicitante', ), null, null, 'Solicituds');
		$this->addRelation('Postulantes', 'Postulantes', RelationMap::ONE_TO_MANY, array('id' => 'id_postulante', ), null, null, 'Postulantess');
	} // buildRelations()

} // UsuarioTableMap
