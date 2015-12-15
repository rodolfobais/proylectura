<?php



/**
 * This class defines the structure of the 'lista' table.
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
class ListaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'proylectura.model.map.ListaTableMap';

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
		$this->setName('lista');
		$this->setPhpName('Lista');
		$this->setClassname('Lista');
		$this->setPackage('proylectura.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOMBRE', 'Nombre', 'CHAR', true, 50, null);
		$this->addColumn('FECHA', 'Fecha', 'DATE', true, null, null);
		$this->addForeignKey('ID_USUARIO', 'Id_usuario', 'INTEGER', 'usuario', 'ID', true, null, null);
		$this->addForeignKey('ID_GENERO', 'Id_genero', 'INTEGER', 'genero', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('id_usuario' => 'id', ), null, null);
		$this->addRelation('Genero', 'Genero', RelationMap::MANY_TO_ONE, array('id_genero' => 'id', ), null, null);
		$this->addRelation('Lista_audiolibro', 'Lista_audiolibro', RelationMap::ONE_TO_MANY, array('id' => 'id_lista', ), null, null, 'Lista_audiolibros');
	} // buildRelations()

} // ListaTableMap
