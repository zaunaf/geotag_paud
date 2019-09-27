<?php

namespace Appdb\Map;

use Appdb\JenisFoto;
use Appdb\JenisFotoQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'ref.jenis_foto' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class JenisFotoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Appdb.Map.JenisFotoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'appdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'ref.jenis_foto';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Appdb\\JenisFoto';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Appdb.JenisFoto';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the jenis_foto_id field
     */
    const COL_JENIS_FOTO_ID = 'ref.jenis_foto.jenis_foto_id';

    /**
     * the column name for the nama_jenis_foto field
     */
    const COL_NAMA_JENIS_FOTO = 'ref.jenis_foto.nama_jenis_foto';

    /**
     * the column name for the instruksi field
     */
    const COL_INSTRUKSI = 'ref.jenis_foto.instruksi';

    /**
     * the column name for the status_isian field
     */
    const COL_STATUS_ISIAN = 'ref.jenis_foto.status_isian';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('JenisFotoId', 'NamaJenisFoto', 'Instruksi', 'StatusIsian', ),
        self::TYPE_CAMELNAME     => array('jenisFotoId', 'namaJenisFoto', 'instruksi', 'statusIsian', ),
        self::TYPE_COLNAME       => array(JenisFotoTableMap::COL_JENIS_FOTO_ID, JenisFotoTableMap::COL_NAMA_JENIS_FOTO, JenisFotoTableMap::COL_INSTRUKSI, JenisFotoTableMap::COL_STATUS_ISIAN, ),
        self::TYPE_FIELDNAME     => array('jenis_foto_id', 'nama_jenis_foto', 'instruksi', 'status_isian', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('JenisFotoId' => 0, 'NamaJenisFoto' => 1, 'Instruksi' => 2, 'StatusIsian' => 3, ),
        self::TYPE_CAMELNAME     => array('jenisFotoId' => 0, 'namaJenisFoto' => 1, 'instruksi' => 2, 'statusIsian' => 3, ),
        self::TYPE_COLNAME       => array(JenisFotoTableMap::COL_JENIS_FOTO_ID => 0, JenisFotoTableMap::COL_NAMA_JENIS_FOTO => 1, JenisFotoTableMap::COL_INSTRUKSI => 2, JenisFotoTableMap::COL_STATUS_ISIAN => 3, ),
        self::TYPE_FIELDNAME     => array('jenis_foto_id' => 0, 'nama_jenis_foto' => 1, 'instruksi' => 2, 'status_isian' => 3, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('ref.jenis_foto');
        $this->setPhpName('JenisFoto');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Appdb\\JenisFoto');
        $this->setPackage('Appdb');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('jenis_foto_id', 'JenisFotoId', 'SMALLINT', true, 2, null);
        $this->addColumn('nama_jenis_foto', 'NamaJenisFoto', 'VARCHAR', false, 140, null);
        $this->addColumn('instruksi', 'Instruksi', 'LONGVARCHAR', false, 2147483647, null);
        $this->addColumn('status_isian', 'StatusIsian', 'INTEGER', false, 4, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Foto', '\\Appdb\\Foto', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':jenis_foto_id',
    1 => ':jenis_foto_id',
  ),
), null, null, 'Fotos', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('JenisFotoId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('JenisFotoId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('JenisFotoId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('JenisFotoId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('JenisFotoId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('JenisFotoId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('JenisFotoId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? JenisFotoTableMap::CLASS_DEFAULT : JenisFotoTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (JenisFoto object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = JenisFotoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = JenisFotoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + JenisFotoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = JenisFotoTableMap::OM_CLASS;
            /** @var JenisFoto $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            JenisFotoTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = JenisFotoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = JenisFotoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var JenisFoto $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                JenisFotoTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(JenisFotoTableMap::COL_JENIS_FOTO_ID);
            $criteria->addSelectColumn(JenisFotoTableMap::COL_NAMA_JENIS_FOTO);
            $criteria->addSelectColumn(JenisFotoTableMap::COL_INSTRUKSI);
            $criteria->addSelectColumn(JenisFotoTableMap::COL_STATUS_ISIAN);
        } else {
            $criteria->addSelectColumn($alias . '.jenis_foto_id');
            $criteria->addSelectColumn($alias . '.nama_jenis_foto');
            $criteria->addSelectColumn($alias . '.instruksi');
            $criteria->addSelectColumn($alias . '.status_isian');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(JenisFotoTableMap::DATABASE_NAME)->getTable(JenisFotoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(JenisFotoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(JenisFotoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new JenisFotoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a JenisFoto or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or JenisFoto object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(JenisFotoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Appdb\JenisFoto) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(JenisFotoTableMap::DATABASE_NAME);
            $criteria->add(JenisFotoTableMap::COL_JENIS_FOTO_ID, (array) $values, Criteria::IN);
        }

        $query = JenisFotoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            JenisFotoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                JenisFotoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the ref.jenis_foto table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return JenisFotoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a JenisFoto or Criteria object.
     *
     * @param mixed               $criteria Criteria or JenisFoto object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(JenisFotoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from JenisFoto object
        }


        // Set the correct dbName
        $query = JenisFotoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // JenisFotoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
JenisFotoTableMap::buildTableMap();
