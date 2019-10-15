<?php

namespace Appdb\Map;

use Appdb\Foto;
use Appdb\FotoQuery;
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
 * This class defines the structure of the 'foto' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FotoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Appdb.Map.FotoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'appdb';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'foto';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Appdb\\Foto';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Appdb.Foto';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 13;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 13;

    /**
     * the column name for the foto_id field
     */
    const COL_FOTO_ID = 'foto.foto_id';

    /**
     * the column name for the jenis_foto_id field
     */
    const COL_JENIS_FOTO_ID = 'foto.jenis_foto_id';

    /**
     * the column name for the sekolah_id field
     */
    const COL_SEKOLAH_ID = 'foto.sekolah_id';

    /**
     * the column name for the pengguna_id field
     */
    const COL_PENGGUNA_ID = 'foto.pengguna_id';

    /**
     * the column name for the judul field
     */
    const COL_JUDUL = 'foto.judul';

    /**
     * the column name for the tgl_pengambilan field
     */
    const COL_TGL_PENGAMBILAN = 'foto.tgl_pengambilan';

    /**
     * the column name for the tinggi_pixel field
     */
    const COL_TINGGI_PIXEL = 'foto.tinggi_pixel';

    /**
     * the column name for the lebar_pixel field
     */
    const COL_LEBAR_PIXEL = 'foto.lebar_pixel';

    /**
     * the column name for the ukuran field
     */
    const COL_UKURAN = 'foto.ukuran';

    /**
     * the column name for the lintang field
     */
    const COL_LINTANG = 'foto.lintang';

    /**
     * the column name for the bujur field
     */
    const COL_BUJUR = 'foto.bujur';

    /**
     * the column name for the tgl_pengiriman field
     */
    const COL_TGL_PENGIRIMAN = 'foto.tgl_pengiriman';

    /**
     * the column name for the status_data field
     */
    const COL_STATUS_DATA = 'foto.status_data';

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
        self::TYPE_PHPNAME       => array('FotoId', 'JenisFotoId', 'SekolahId', 'PenggunaId', 'Judul', 'TglPengambilan', 'TinggiPixel', 'LebarPixel', 'Ukuran', 'Lintang', 'Bujur', 'TglPengiriman', 'StatusData', ),
        self::TYPE_CAMELNAME     => array('fotoId', 'jenisFotoId', 'sekolahId', 'penggunaId', 'judul', 'tglPengambilan', 'tinggiPixel', 'lebarPixel', 'ukuran', 'lintang', 'bujur', 'tglPengiriman', 'statusData', ),
        self::TYPE_COLNAME       => array(FotoTableMap::COL_FOTO_ID, FotoTableMap::COL_JENIS_FOTO_ID, FotoTableMap::COL_SEKOLAH_ID, FotoTableMap::COL_PENGGUNA_ID, FotoTableMap::COL_JUDUL, FotoTableMap::COL_TGL_PENGAMBILAN, FotoTableMap::COL_TINGGI_PIXEL, FotoTableMap::COL_LEBAR_PIXEL, FotoTableMap::COL_UKURAN, FotoTableMap::COL_LINTANG, FotoTableMap::COL_BUJUR, FotoTableMap::COL_TGL_PENGIRIMAN, FotoTableMap::COL_STATUS_DATA, ),
        self::TYPE_FIELDNAME     => array('foto_id', 'jenis_foto_id', 'sekolah_id', 'pengguna_id', 'judul', 'tgl_pengambilan', 'tinggi_pixel', 'lebar_pixel', 'ukuran', 'lintang', 'bujur', 'tgl_pengiriman', 'status_data', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('FotoId' => 0, 'JenisFotoId' => 1, 'SekolahId' => 2, 'PenggunaId' => 3, 'Judul' => 4, 'TglPengambilan' => 5, 'TinggiPixel' => 6, 'LebarPixel' => 7, 'Ukuran' => 8, 'Lintang' => 9, 'Bujur' => 10, 'TglPengiriman' => 11, 'StatusData' => 12, ),
        self::TYPE_CAMELNAME     => array('fotoId' => 0, 'jenisFotoId' => 1, 'sekolahId' => 2, 'penggunaId' => 3, 'judul' => 4, 'tglPengambilan' => 5, 'tinggiPixel' => 6, 'lebarPixel' => 7, 'ukuran' => 8, 'lintang' => 9, 'bujur' => 10, 'tglPengiriman' => 11, 'statusData' => 12, ),
        self::TYPE_COLNAME       => array(FotoTableMap::COL_FOTO_ID => 0, FotoTableMap::COL_JENIS_FOTO_ID => 1, FotoTableMap::COL_SEKOLAH_ID => 2, FotoTableMap::COL_PENGGUNA_ID => 3, FotoTableMap::COL_JUDUL => 4, FotoTableMap::COL_TGL_PENGAMBILAN => 5, FotoTableMap::COL_TINGGI_PIXEL => 6, FotoTableMap::COL_LEBAR_PIXEL => 7, FotoTableMap::COL_UKURAN => 8, FotoTableMap::COL_LINTANG => 9, FotoTableMap::COL_BUJUR => 10, FotoTableMap::COL_TGL_PENGIRIMAN => 11, FotoTableMap::COL_STATUS_DATA => 12, ),
        self::TYPE_FIELDNAME     => array('foto_id' => 0, 'jenis_foto_id' => 1, 'sekolah_id' => 2, 'pengguna_id' => 3, 'judul' => 4, 'tgl_pengambilan' => 5, 'tinggi_pixel' => 6, 'lebar_pixel' => 7, 'ukuran' => 8, 'lintang' => 9, 'bujur' => 10, 'tgl_pengiriman' => 11, 'status_data' => 12, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $this->setName('foto');
        $this->setPhpName('Foto');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Appdb\\Foto');
        $this->setPackage('Appdb');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('foto_id', 'FotoId', 'CHAR', true, 16, null);
        $this->addForeignKey('jenis_foto_id', 'JenisFotoId', 'SMALLINT', 'ref.jenis_foto', 'jenis_foto_id', true, 2, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'CHAR', 'sekolah', 'sekolah_id', true, 16, null);
        $this->addForeignKey('pengguna_id', 'PenggunaId', 'CHAR', 'pengguna', 'pengguna_id', true, 16, null);
        $this->addColumn('judul', 'Judul', 'VARCHAR', false, 250, null);
        $this->addColumn('tgl_pengambilan', 'TglPengambilan', 'TIMESTAMP', false, 16, null);
        $this->addColumn('tinggi_pixel', 'TinggiPixel', 'INTEGER', false, 4, null);
        $this->addColumn('lebar_pixel', 'LebarPixel', 'INTEGER', false, 4, null);
        $this->addColumn('ukuran', 'Ukuran', 'INTEGER', false, 4, null);
        $this->addColumn('lintang', 'Lintang', 'NUMERIC', false, 13, null);
        $this->addColumn('bujur', 'Bujur', 'NUMERIC', false, 13, null);
        $this->addColumn('tgl_pengiriman', 'TglPengiriman', 'TIMESTAMP', false, 16, null);
        $this->addColumn('status_data', 'StatusData', 'SMALLINT', false, 2, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('JenisFoto', '\\Appdb\\JenisFoto', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':jenis_foto_id',
    1 => ':jenis_foto_id',
  ),
), null, null, null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FotoId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FotoId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FotoId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FotoId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FotoId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('FotoId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('FotoId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? FotoTableMap::CLASS_DEFAULT : FotoTableMap::OM_CLASS;
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
     * @return array           (Foto object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FotoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FotoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FotoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FotoTableMap::OM_CLASS;
            /** @var Foto $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FotoTableMap::addInstanceToPool($obj, $key);
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
            $key = FotoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FotoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Foto $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FotoTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(FotoTableMap::COL_FOTO_ID);
            $criteria->addSelectColumn(FotoTableMap::COL_JENIS_FOTO_ID);
            $criteria->addSelectColumn(FotoTableMap::COL_SEKOLAH_ID);
            $criteria->addSelectColumn(FotoTableMap::COL_PENGGUNA_ID);
            $criteria->addSelectColumn(FotoTableMap::COL_JUDUL);
            $criteria->addSelectColumn(FotoTableMap::COL_TGL_PENGAMBILAN);
            $criteria->addSelectColumn(FotoTableMap::COL_TINGGI_PIXEL);
            $criteria->addSelectColumn(FotoTableMap::COL_LEBAR_PIXEL);
            $criteria->addSelectColumn(FotoTableMap::COL_UKURAN);
            $criteria->addSelectColumn(FotoTableMap::COL_LINTANG);
            $criteria->addSelectColumn(FotoTableMap::COL_BUJUR);
            $criteria->addSelectColumn(FotoTableMap::COL_TGL_PENGIRIMAN);
            $criteria->addSelectColumn(FotoTableMap::COL_STATUS_DATA);
        } else {
            $criteria->addSelectColumn($alias . '.foto_id');
            $criteria->addSelectColumn($alias . '.jenis_foto_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.pengguna_id');
            $criteria->addSelectColumn($alias . '.judul');
            $criteria->addSelectColumn($alias . '.tgl_pengambilan');
            $criteria->addSelectColumn($alias . '.tinggi_pixel');
            $criteria->addSelectColumn($alias . '.lebar_pixel');
            $criteria->addSelectColumn($alias . '.ukuran');
            $criteria->addSelectColumn($alias . '.lintang');
            $criteria->addSelectColumn($alias . '.bujur');
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
        return Propel::getServiceContainer()->getDatabaseMap(FotoTableMap::DATABASE_NAME)->getTable(FotoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FotoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FotoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FotoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Foto or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Foto object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(FotoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Appdb\Foto) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FotoTableMap::DATABASE_NAME);
            $criteria->add(FotoTableMap::COL_FOTO_ID, (array) $values, Criteria::IN);
        }

        $query = FotoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FotoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FotoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the foto table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FotoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Foto or Criteria object.
     *
     * @param mixed               $criteria Criteria or Foto object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FotoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Foto object
        }


        // Set the correct dbName
        $query = FotoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FotoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FotoTableMap::buildTableMap();
