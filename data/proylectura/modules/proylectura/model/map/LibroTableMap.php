<?php



/**
 * This class defines the structure of the 'libro' table.
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
class LibroTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'proylectura.model.map.LibroTableMap';

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
		$this->setName('libro');
		$this->setPhpName('Libro');
		$this->setClassname('Libro');
		$this->setPackage('proylectura.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOMBRE', 'Nombre', 'CHAR', true, 50, null);
		$this->addColumn('FECHA', 'Fecha', 'DATE', false, null, null);
		$this->addForeignKey('ID_GENERO', 'Id_genero', 'INTEGER', 'genero', 'ID', false, null, null);
		$this->addColumn('AUTOR', 'Autor', 'CHAR', false, 255, null);
		$this->addColumn('IMAGE', 'Image', 'CHAR', false, 255, null);
		$this->addColumn('SINOPSIS', 'Sinopsis', 'CHAR', false, 255, null);
		$this->addColumn('FECHA_ULT_ACC', 'Fecha_ult_acc', 'DATE', false, null, null);
		$this->addColumn('HORA_ULT_ACC', 'Hora_ult_acc', 'CHAR', false, 8, null);
		$this->addForeignKey('USUARIO_ULT_ACC', 'Usuario_ult_acc', 'INTEGER', 'usuario', 'ID', false, null, null);
		$this->addForeignKey('ID_PRIVACIDAD', 'Id_privacidad', 'INTEGER', 'privacidad', 'ID', false, null, null);
		$this->addColumn('ES_EDITABLE', 'Es_editable', 'CHAR', false, 1, null);
		$this->addForeignKey('ID_USUARIO', 'Id_usuario', 'INTEGER', 'usuario', 'ID', false, null, null);
		$this->addColumn('DEBAJA', 'Debaja', 'CHAR', false, 1, null);
		$this->addColumn('ESTADO', 'Estado', 'CHAR', false, 1, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('UsuarioRelatedByUsuario_ult_acc', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_ult_acc' => 'id', ), null, null);
		$this->addRelation('Privacidad', 'Privacidad', RelationMap::MANY_TO_ONE, array('id_privacidad' => 'id', ), null, null);
		$this->addRelation('Genero', 'Genero', RelationMap::MANY_TO_ONE, array('id_genero' => 'id', ), null, null);
		$this->addRelation('UsuarioRelatedById_usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('id_usuario' => 'id', ), null, null);
		$this->addRelation('Audiolibro', 'Audiolibro', RelationMap::ONE_TO_MANY, array('id' => 'idlibro', ), null, null, 'Audiolibros');
		$this->addRelation('Calificacion', 'Calificacion', RelationMap::ONE_TO_MANY, array('id' => 'id_libro', ), null, null, 'Calificacions');
		$this->addRelation('Comentario', 'Comentario', RelationMap::ONE_TO_MANY, array('id' => 'id_libro', ), null, null, 'Comentarios');
		$this->addRelation('Libro_colaborador', 'Libro_colaborador', RelationMap::ONE_TO_MANY, array('id' => 'idlibro', ), null, null, 'Libro_colaboradors');
		$this->addRelation('Libro_version', 'Libro_version', RelationMap::ONE_TO_MANY, array('id' => 'idlibro', ), null, null, 'Libro_versions');
		$this->addRelation('Solicitud', 'Solicitud', RelationMap::ONE_TO_MANY, array('id' => 'id_libro', ), null, null, 'Solicituds');
		$this->addRelation('Slider_mae', 'Slider_mae', RelationMap::ONE_TO_MANY, array('id' => 'id_libro', ), null, null, 'Slider_maes');
		$this->addRelation('Postulantes', 'Postulantes', RelationMap::ONE_TO_MANY, array('id' => 'id_libro', ), null, null, 'Postulantess');
		$this->addRelation('Clasificados', 'Clasificados', RelationMap::ONE_TO_MANY, array('id' => 'id_libro', ), null, null, 'Clasificadoss');
	} // buildRelations()

} // LibroTableMap
