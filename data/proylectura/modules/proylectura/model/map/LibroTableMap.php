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
		$this->addColumn('ID_GENERO', 'Id_genero', 'INTEGER', false, null, null);
		$this->addColumn('AUTOR', 'Autor', 'CHAR', false, 255, null);
		$this->addColumn('IMAGE', 'Image', 'CHAR', false, 255, null);
		$this->addColumn('SINOPSIS', 'Sinopsis', 'CHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Audiolibro', 'Audiolibro', RelationMap::ONE_TO_MANY, array('id' => 'idlibro', ), null, null, 'Audiolibros');
		$this->addRelation('Libro_colaborador', 'Libro_colaborador', RelationMap::ONE_TO_MANY, array('id' => 'idlibro', ), null, null, 'Libro_colaboradors');
		$this->addRelation('Libro_version', 'Libro_version', RelationMap::ONE_TO_MANY, array('id' => 'idlibro', ), null, null, 'Libro_versions');
		$this->addRelation('Slider_mae', 'Slider_mae', RelationMap::ONE_TO_MANY, array('id' => 'id_libro', ), null, null, 'Slider_maes');
		$this->addRelation('Postulantes', 'Postulantes', RelationMap::ONE_TO_MANY, array('id' => 'id_libro', ), null, null, 'Postulantess');
		$this->addRelation('Clasificados', 'Clasificados', RelationMap::ONE_TO_MANY, array('id' => 'id_libro', ), null, null, 'Clasificadoss');
	} // buildRelations()

} // LibroTableMap
