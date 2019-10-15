<?php

namespace Appdb\Map;

use Appdb\Geotag;
use Appdb\GeotagQuery;
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
 * This class defines the structure of the 'geotag' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class GeotagTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Appdb.Map.GeotagTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'appdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'geotag';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Appdb\\Geotag';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Appdb.Geotag';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the geotag_id field
     */
    const COL_GEOTAG_ID = 'geotag.geotag_id';

    /**
     * the column name for the sekolah_id field
     */
    const COL_SEKOLAH_ID = 'geotag.sekolah_id';

    /**
     * the column name for the status_geotag_id field
     */
    const COL_STATUS_GEOTAG_ID = 'geotag.status_geotag_id';

    /**
     * the column name for the pengguna_id field
     */
    const COL_PENGGUNA_ID = 'geotag.pengguna_id';

    /**
     * the column name for the tgl_pengambilan field
     */
    const COL_TGL_PENGAMBILAN = 'geotag.tgl_pengambilan';

    /**
     * the column name for the lintang field
     */
    const COL_LINTANG = 'geotag.lintang';

    /**
     * the column name for the bujur field
     */
    const COL_BUJUR = 'geotag.bujur';

    /**
     * the column name for the petugas_link field
     */
    const COL_PETUGAS_LINK = 'geotag.petugas_link';

    /**
     * the column name for the sekolah_link field
     */
    const COL_SEKOLAH_LINK = 'geotag.sekolah_link';

    /**
     * the column name for the tgl_pengiriman field
     */
    const COL_TGL_PENGIRIMAN = 'geotag.tgl_pengiriman';

    /**
     * the column name for the status_data field
     */
    const COL_STATUS_DATA = 'geotag.status_data';

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
        self::TYPE_PHPNAME       => array('GeotagId', 'SekolahId', 'StatusGeotagId', 'PenggunaId', 'TglPengambilan', 'Lintang', 'Bujur', 'PetugasLink', 'SekolahLink', 'TglPengiriman', 'StatusData', ),
        self::TYPE_CAMELNAME     => array('geotagId', 'sekolahId', 'statusGeotagId', 'penggunaId', 'tglPengambilan', 'lintang', 'bujur', 'petugasLink', 'sekolahLink', 'tglPengiriman', 'statusData', ),
        self::TYPE_COLNAME       => array(GeotagTableMap::COL_GEOTAG_ID, GeotagTableMap::COL_SEKOLAH_ID, GeotagTableMap::COL_STATUS_GEOTAG_ID, GeotagTableMap::COL_PENGGUNA_ID, GeotagTableMap::COL_TGL_PENGAMBILAN, GeotagTableMap::COL_LINTANG, GeotagTableMap::COL_BUJUR, GeotagTableMap::COL_PETUGAS_LINK, GeotagTableMap::COL_SEKOLAH_LINK, GeotagTableMap::COL_TGL_PENGIRIMAN, GeotagTableMap::COL_STATUS_DATA, ),
        self::TYPE_FIELDNAME     => array('geotag_id', 'sekolah_id', 'status_geotag_id', 'pengguna_id', 'tgl_pengambilan', 'lintang', 'bujur', 'petugas_link', 'sekolah_link', 'tgl_pengiriman', 'status_data', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('GeotagId' => 0, 'SekolahId' => 1, 'StatusGeotagId' => 2, 'PenggunaId' => 3, 'TglPengambilan' => 4, 'Lintang' => 5, 'Bujur' => 6, 'PetugasLink' => 7, 'SekolahLink' => 8, 'TglPengiriman' => 9, 'StatusData' => 10, ),
        self::TYPE_CAMELNAME     => array('geotagId' => 0, 'sekolahId' => 1, 'statusGeotagId' => 2, 'penggunaId' => 3, 'tglPengambilan' => 4, 'lintang' => 5, 'bujur' => 6, 'petugasLink' => 7, 'sekolahLink' => 8, 'tglPengiriman' => 9, 'statusData' => 10, ),
        self::TYPE_COLNAME       => array(GeotagTableMap::COL_GEOTAG_ID => 0, GeotagTableMap::COL_SEKOLAH_ID => 1, GeotagTableMap::COL_STATUS_GEOTAG_ID => 2, GeotagTableMap::COL_PENGGUNA_ID => 3, GeotagTableMap::COL_TGL_PENGAMBILAN => 4, GeotagTableMap::COL_LINTANG => 5, GeotagTableMap::COL_BUJUR => 6, GeotagTableMap::COL_PETUGAS_LINK => 7, GeotagTableMap::COL_SEKOLAH_LINK => 8, GeotagTableMap::COL_TGL_PENGIRIMAN => 9, GeotagTableMap::COL_STATUS_DATA => 10, ),
        self::TYPE_FIELDNAME     => array('geotag_id' => 0, 'sekolah_id' => 1, 'status_geotag_id' => 2, 'pengguna_id' => 3, 'tgl_pengambilan' => 4, 'lintang' => 5, 'bujur' => 6, 'petugas_link' => 7, 'sekolah_link' => 8, 'tgl_pengiriman' => 9, 'status_data' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $this->setName('geotag');
        $this->setPhpName('Geotag');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Appdb\\Geotag');
        $this->setPackage('Appdb');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('geotag_id', 'GeotagId', 'CHAR', true, 16, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'CHAR', 'sekolah', 'sekolah_id', true, 16, null);
        $this->addForeignKey('status_geotag_id', 'StatusGeotagId', 'SMALLINT', 'ref.status_geotag', 'status_geotag_id', true, 2, null);
        $this->addForeignKey('pengguna_id', 'PenggunaId', 'CHAR', 'pengguna', 'pengguna_id', true, 16, null);
        $this->addColumn('tgl_pengambilan', 'TglPengambilan', 'TIMESTAMP', false, 16, null);
        $this->addColumn('lintang', 'Lintang', 'NUMERIC', false, 13, null);
        $this->addColumn('bujur', 'Bujur', 'NUMERIC', false, 13, null);
        $this->addColumn('petugas_link', 'PetugasLink', 'CHAR', false, 16, null);
        $this->addColumn('sekolah_link', 'SekolahLink', 'CHAR', false, 16, null);
        $this->addColumn('tgl_pengiriman', 'TglPengiriman', 'TIMESTAMP', false, 16, null);
        $this->addColumn('status_data', 'StatusData', 'SMALLINT', false, 2, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Pengguna', '\\Appdb\\Pengguna', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':pengguna_id',
    1 => ':pengguna_id',
  ),
), null, null, null, false);
        $this->addRelation('Sekolah', '\\Appdb\\Sekolah', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':sekolah_id',
    1 => ':sekolah_id',
  ),
), null, null, null, false);
        $this->addRelation('StatusGeotag', '\\Appdb\\StatusGeotag', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':status_geotag_id',
    1 => ':status_geotag_id',
  ),
), null, null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GeotagId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GeotagId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GeotagId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GeotagId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GeotagId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GeotagId', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('GeotagId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? GeotagTableMap::CLASS_DEFAULT : GeotagTableMap::OM_CLASS;
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
     * @return array           (Geotag object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = GeotagTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = GeotagTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + GeotagTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = GeotagTableMap::OM_CLASS;
            /** @var Geotag $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            GeotagTableMap::addInstanceToPool($obj, $key);
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
            $key = GeotagTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = GeotagTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Geotag $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                GeotagTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(GeotagTableMap::COL_GEOTAG_ID);
            $criteria->addSelectColumn(GeotagTableMap::COL_SEKOLAH_ID);
            $criteria->addSelectColumn(GeotagTableMap::COL_STATUS_GEOTAG_ID);
            $criteria->addSelectColumn(GeotagTableMap::COL_PENGGUNA_ID);
            $criteria->addSelectColumn(GeotagTableMap::COL_TGL_PENGAMBILAN);
            $criteria->addSelectColumn(GeotagTableMap::COL_LINTANG);
            $criteria->addSelectColumn(GeotagTableMap::COL_BUJUR);
            $criteria->addSelectColumn(GeotagTableMap::COL_PETUGAS_LINK);
            $criteria->addSelectColumn(GeotagTableMap::COL_SEKOLAH_LINK);
            $criteria->addSelectColumn(GeotagTableMap::COL_TGL_PENGIRIMAN);
            $criteria->addSelectColumn(GeotagTableMap::COL_STATUS_DATA);
        } else {
            $criteria->addSelectColumn($alias . '.geotag_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.status_geotag_id');
            $criteria->addSelectColumn($alias . '.pengguna_id');
            $criteria->addSelectColumn($alias . '.tgl_pengambilan');
            $criteria->addSelectColumn($alias . '.lintang');
            $criteria->addSelectColumn($alias . '.bujur');
            $criteria->addSelectColumn($alias . '.petugas_link');
            $criteria->addSelectColumn($alias . '.sekolah_link');
            $criteria->addSelectColumn($alias . '.tgl_pengiriman');
            $criteria->addSelectColumn($alias . '.status_data');
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
        return Propel::getServiceContainer()->getDatabaseMap(GeotagTableMap::DATABASE_NAME)->getTable(GeotagTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(GeotagTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(GeotagTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new GeotagTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Geotag or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Geotag object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(GeotagTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Appdb\Geotag) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(GeotagTableMap::DATABASE_NAME);
            $criteria->add(GeotagTableMap::COL_GEOTAG_ID, (array) $values, Criteria::IN);
        }

        $query = GeotagQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            GeotagTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                GeotagTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the geotag table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return GeotagQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Geotag or Criteria object.
     *
     * @param mixed               $criteria Criteria or Geotag object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GeotagTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Geotag object
        }


        // Set the correct dbName
        $query = GeotagQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // GeotagTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
GeotagTableMap::buildTableMap();
