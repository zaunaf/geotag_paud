<?php

namespace Appdb\Base;

use \Exception;
use \PDO;
use Appdb\Geotag as ChildGeotag;
use Appdb\GeotagQuery as ChildGeotagQuery;
use Appdb\Map\GeotagTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'geotag' table.
 *
 *
 *
 * @method     ChildGeotagQuery orderByGeotagId($order = Criteria::ASC) Order by the geotag_id column
 * @method     ChildGeotagQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method     ChildGeotagQuery orderByStatusGeotagId($order = Criteria::ASC) Order by the status_geotag_id column
 * @method     ChildGeotagQuery orderByPenggunaId($order = Criteria::ASC) Order by the pengguna_id column
 * @method     ChildGeotagQuery orderByTglPengambilan($order = Criteria::ASC) Order by the tgl_pengambilan column
 * @method     ChildGeotagQuery orderByLintang($order = Criteria::ASC) Order by the lintang column
 * @method     ChildGeotagQuery orderByBujur($order = Criteria::ASC) Order by the bujur column
 * @method     ChildGeotagQuery orderByPetugasLink($order = Criteria::ASC) Order by the petugas_link column
 * @method     ChildGeotagQuery orderBySekolahLink($order = Criteria::ASC) Order by the sekolah_link column
 * @method     ChildGeotagQuery orderByTglPengiriman($order = Criteria::ASC) Order by the tgl_pengiriman column
 * @method     ChildGeotagQuery orderByStatusData($order = Criteria::ASC) Order by the status_data column
 *
 * @method     ChildGeotagQuery groupByGeotagId() Group by the geotag_id column
 * @method     ChildGeotagQuery groupBySekolahId() Group by the sekolah_id column
 * @method     ChildGeotagQuery groupByStatusGeotagId() Group by the status_geotag_id column
 * @method     ChildGeotagQuery groupByPenggunaId() Group by the pengguna_id column
 * @method     ChildGeotagQuery groupByTglPengambilan() Group by the tgl_pengambilan column
 * @method     ChildGeotagQuery groupByLintang() Group by the lintang column
 * @method     ChildGeotagQuery groupByBujur() Group by the bujur column
 * @method     ChildGeotagQuery groupByPetugasLink() Group by the petugas_link column
 * @method     ChildGeotagQuery groupBySekolahLink() Group by the sekolah_link column
 * @method     ChildGeotagQuery groupByTglPengiriman() Group by the tgl_pengiriman column
 * @method     ChildGeotagQuery groupByStatusData() Group by the status_data column
 *
 * @method     ChildGeotagQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildGeotagQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildGeotagQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildGeotagQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildGeotagQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildGeotagQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildGeotagQuery leftJoinPengguna($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pengguna relation
 * @method     ChildGeotagQuery rightJoinPengguna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pengguna relation
 * @method     ChildGeotagQuery innerJoinPengguna($relationAlias = null) Adds a INNER JOIN clause to the query using the Pengguna relation
 *
 * @method     ChildGeotagQuery joinWithPengguna($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pengguna relation
 *
 * @method     ChildGeotagQuery leftJoinWithPengguna() Adds a LEFT JOIN clause and with to the query using the Pengguna relation
 * @method     ChildGeotagQuery rightJoinWithPengguna() Adds a RIGHT JOIN clause and with to the query using the Pengguna relation
 * @method     ChildGeotagQuery innerJoinWithPengguna() Adds a INNER JOIN clause and with to the query using the Pengguna relation
 *
 * @method     ChildGeotagQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method     ChildGeotagQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method     ChildGeotagQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method     ChildGeotagQuery joinWithSekolah($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Sekolah relation
 *
 * @method     ChildGeotagQuery leftJoinWithSekolah() Adds a LEFT JOIN clause and with to the query using the Sekolah relation
 * @method     ChildGeotagQuery rightJoinWithSekolah() Adds a RIGHT JOIN clause and with to the query using the Sekolah relation
 * @method     ChildGeotagQuery innerJoinWithSekolah() Adds a INNER JOIN clause and with to the query using the Sekolah relation
 *
 * @method     ChildGeotagQuery leftJoinStatusGeotag($relationAlias = null) Adds a LEFT JOIN clause to the query using the StatusGeotag relation
 * @method     ChildGeotagQuery rightJoinStatusGeotag($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StatusGeotag relation
 * @method     ChildGeotagQuery innerJoinStatusGeotag($relationAlias = null) Adds a INNER JOIN clause to the query using the StatusGeotag relation
 *
 * @method     ChildGeotagQuery joinWithStatusGeotag($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the StatusGeotag relation
 *
 * @method     ChildGeotagQuery leftJoinWithStatusGeotag() Adds a LEFT JOIN clause and with to the query using the StatusGeotag relation
 * @method     ChildGeotagQuery rightJoinWithStatusGeotag() Adds a RIGHT JOIN clause and with to the query using the StatusGeotag relation
 * @method     ChildGeotagQuery innerJoinWithStatusGeotag() Adds a INNER JOIN clause and with to the query using the StatusGeotag relation
 *
 * @method     \Appdb\PenggunaQuery|\Appdb\SekolahQuery|\Appdb\StatusGeotagQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildGeotag findOne(ConnectionInterface $con = null) Return the first ChildGeotag matching the query
 * @method     ChildGeotag findOneOrCreate(ConnectionInterface $con = null) Return the first ChildGeotag matching the query, or a new ChildGeotag object populated from the query conditions when no match is found
 *
 * @method     ChildGeotag findOneByGeotagId(string $geotag_id) Return the first ChildGeotag filtered by the geotag_id column
 * @method     ChildGeotag findOneBySekolahId(string $sekolah_id) Return the first ChildGeotag filtered by the sekolah_id column
 * @method     ChildGeotag findOneByStatusGeotagId(int $status_geotag_id) Return the first ChildGeotag filtered by the status_geotag_id column
 * @method     ChildGeotag findOneByPenggunaId(string $pengguna_id) Return the first ChildGeotag filtered by the pengguna_id column
 * @method     ChildGeotag findOneByTglPengambilan(string $tgl_pengambilan) Return the first ChildGeotag filtered by the tgl_pengambilan column
 * @method     ChildGeotag findOneByLintang(string $lintang) Return the first ChildGeotag filtered by the lintang column
 * @method     ChildGeotag findOneByBujur(string $bujur) Return the first ChildGeotag filtered by the bujur column
 * @method     ChildGeotag findOneByPetugasLink(string $petugas_link) Return the first ChildGeotag filtered by the petugas_link column
 * @method     ChildGeotag findOneBySekolahLink(string $sekolah_link) Return the first ChildGeotag filtered by the sekolah_link column
 * @method     ChildGeotag findOneByTglPengiriman(string $tgl_pengiriman) Return the first ChildGeotag filtered by the tgl_pengiriman column
 * @method     ChildGeotag findOneByStatusData(int $status_data) Return the first ChildGeotag filtered by the status_data column *

 * @method     ChildGeotag requirePk($key, ConnectionInterface $con = null) Return the ChildGeotag by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeotag requireOne(ConnectionInterface $con = null) Return the first ChildGeotag matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGeotag requireOneByGeotagId(string $geotag_id) Return the first ChildGeotag filtered by the geotag_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeotag requireOneBySekolahId(string $sekolah_id) Return the first ChildGeotag filtered by the sekolah_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeotag requireOneByStatusGeotagId(int $status_geotag_id) Return the first ChildGeotag filtered by the status_geotag_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeotag requireOneByPenggunaId(string $pengguna_id) Return the first ChildGeotag filtered by the pengguna_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeotag requireOneByTglPengambilan(string $tgl_pengambilan) Return the first ChildGeotag filtered by the tgl_pengambilan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeotag requireOneByLintang(string $lintang) Return the first ChildGeotag filtered by the lintang column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeotag requireOneByBujur(string $bujur) Return the first ChildGeotag filtered by the bujur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeotag requireOneByPetugasLink(string $petugas_link) Return the first ChildGeotag filtered by the petugas_link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeotag requireOneBySekolahLink(string $sekolah_link) Return the first ChildGeotag filtered by the sekolah_link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeotag requireOneByTglPengiriman(string $tgl_pengiriman) Return the first ChildGeotag filtered by the tgl_pengiriman column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildGeotag requireOneByStatusData(int $status_data) Return the first ChildGeotag filtered by the status_data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildGeotag[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildGeotag objects based on current ModelCriteria
 * @method     ChildGeotag[]|ObjectCollection findByGeotagId(string $geotag_id) Return ChildGeotag objects filtered by the geotag_id column
 * @method     ChildGeotag[]|ObjectCollection findBySekolahId(string $sekolah_id) Return ChildGeotag objects filtered by the sekolah_id column
 * @method     ChildGeotag[]|ObjectCollection findByStatusGeotagId(int $status_geotag_id) Return ChildGeotag objects filtered by the status_geotag_id column
 * @method     ChildGeotag[]|ObjectCollection findByPenggunaId(string $pengguna_id) Return ChildGeotag objects filtered by the pengguna_id column
 * @method     ChildGeotag[]|ObjectCollection findByTglPengambilan(string $tgl_pengambilan) Return ChildGeotag objects filtered by the tgl_pengambilan column
 * @method     ChildGeotag[]|ObjectCollection findByLintang(string $lintang) Return ChildGeotag objects filtered by the lintang column
 * @method     ChildGeotag[]|ObjectCollection findByBujur(string $bujur) Return ChildGeotag objects filtered by the bujur column
 * @method     ChildGeotag[]|ObjectCollection findByPetugasLink(string $petugas_link) Return ChildGeotag objects filtered by the petugas_link column
 * @method     ChildGeotag[]|ObjectCollection findBySekolahLink(string $sekolah_link) Return ChildGeotag objects filtered by the sekolah_link column
 * @method     ChildGeotag[]|ObjectCollection findByTglPengiriman(string $tgl_pengiriman) Return ChildGeotag objects filtered by the tgl_pengiriman column
 * @method     ChildGeotag[]|ObjectCollection findByStatusData(int $status_data) Return ChildGeotag objects filtered by the status_data column
 * @method     ChildGeotag[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class GeotagQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Appdb\Base\GeotagQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'appdb', $modelName = '\\Appdb\\Geotag', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildGeotagQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildGeotagQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildGeotagQuery) {
            return $criteria;
        }
        $query = new ChildGeotagQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildGeotag|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(GeotagTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = GeotagTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGeotag A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT geotag_id, sekolah_id, status_geotag_id, pengguna_id, tgl_pengambilan, lintang, bujur, petugas_link, sekolah_link, tgl_pengiriman, status_data FROM geotag WHERE geotag_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildGeotag $obj */
            $obj = new ChildGeotag();
            $obj->hydrate($row);
            GeotagTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildGeotag|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GeotagTableMap::COL_GEOTAG_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GeotagTableMap::COL_GEOTAG_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the geotag_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGeotagId('fooValue');   // WHERE geotag_id = 'fooValue'
     * $query->filterByGeotagId('%fooValue%', Criteria::LIKE); // WHERE geotag_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $geotagId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function filterByGeotagId($geotagId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($geotagId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeotagTableMap::COL_GEOTAG_ID, $geotagId, $comparison);
    }

    /**
     * Filter the query on the sekolah_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySekolahId('fooValue');   // WHERE sekolah_id = 'fooValue'
     * $query->filterBySekolahId('%fooValue%', Criteria::LIKE); // WHERE sekolah_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sekolahId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function filterBySekolahId($sekolahId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeotagTableMap::COL_SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the status_geotag_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusGeotagId(1234); // WHERE status_geotag_id = 1234
     * $query->filterByStatusGeotagId(array(12, 34)); // WHERE status_geotag_id IN (12, 34)
     * $query->filterByStatusGeotagId(array('min' => 12)); // WHERE status_geotag_id > 12
     * </code>
     *
     * @see       filterByStatusGeotag()
     *
     * @param     mixed $statusGeotagId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function filterByStatusGeotagId($statusGeotagId = null, $comparison = null)
    {
        if (is_array($statusGeotagId)) {
            $useMinMax = false;
            if (isset($statusGeotagId['min'])) {
                $this->addUsingAlias(GeotagTableMap::COL_STATUS_GEOTAG_ID, $statusGeotagId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusGeotagId['max'])) {
                $this->addUsingAlias(GeotagTableMap::COL_STATUS_GEOTAG_ID, $statusGeotagId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeotagTableMap::COL_STATUS_GEOTAG_ID, $statusGeotagId, $comparison);
    }

    /**
     * Filter the query on the pengguna_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPenggunaId('fooValue');   // WHERE pengguna_id = 'fooValue'
     * $query->filterByPenggunaId('%fooValue%', Criteria::LIKE); // WHERE pengguna_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $penggunaId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function filterByPenggunaId($penggunaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($penggunaId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeotagTableMap::COL_PENGGUNA_ID, $penggunaId, $comparison);
    }

    /**
     * Filter the query on the tgl_pengambilan column
     *
     * Example usage:
     * <code>
     * $query->filterByTglPengambilan('2011-03-14'); // WHERE tgl_pengambilan = '2011-03-14'
     * $query->filterByTglPengambilan('now'); // WHERE tgl_pengambilan = '2011-03-14'
     * $query->filterByTglPengambilan(array('max' => 'yesterday')); // WHERE tgl_pengambilan > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglPengambilan The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function filterByTglPengambilan($tglPengambilan = null, $comparison = null)
    {
        if (is_array($tglPengambilan)) {
            $useMinMax = false;
            if (isset($tglPengambilan['min'])) {
                $this->addUsingAlias(GeotagTableMap::COL_TGL_PENGAMBILAN, $tglPengambilan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglPengambilan['max'])) {
                $this->addUsingAlias(GeotagTableMap::COL_TGL_PENGAMBILAN, $tglPengambilan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeotagTableMap::COL_TGL_PENGAMBILAN, $tglPengambilan, $comparison);
    }

    /**
     * Filter the query on the lintang column
     *
     * Example usage:
     * <code>
     * $query->filterByLintang(1234); // WHERE lintang = 1234
     * $query->filterByLintang(array(12, 34)); // WHERE lintang IN (12, 34)
     * $query->filterByLintang(array('min' => 12)); // WHERE lintang > 12
     * </code>
     *
     * @param     mixed $lintang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function filterByLintang($lintang = null, $comparison = null)
    {
        if (is_array($lintang)) {
            $useMinMax = false;
            if (isset($lintang['min'])) {
                $this->addUsingAlias(GeotagTableMap::COL_LINTANG, $lintang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lintang['max'])) {
                $this->addUsingAlias(GeotagTableMap::COL_LINTANG, $lintang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeotagTableMap::COL_LINTANG, $lintang, $comparison);
    }

    /**
     * Filter the query on the bujur column
     *
     * Example usage:
     * <code>
     * $query->filterByBujur(1234); // WHERE bujur = 1234
     * $query->filterByBujur(array(12, 34)); // WHERE bujur IN (12, 34)
     * $query->filterByBujur(array('min' => 12)); // WHERE bujur > 12
     * </code>
     *
     * @param     mixed $bujur The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function filterByBujur($bujur = null, $comparison = null)
    {
        if (is_array($bujur)) {
            $useMinMax = false;
            if (isset($bujur['min'])) {
                $this->addUsingAlias(GeotagTableMap::COL_BUJUR, $bujur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bujur['max'])) {
                $this->addUsingAlias(GeotagTableMap::COL_BUJUR, $bujur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeotagTableMap::COL_BUJUR, $bujur, $comparison);
    }

    /**
     * Filter the query on the petugas_link column
     *
     * Example usage:
     * <code>
     * $query->filterByPetugasLink('fooValue');   // WHERE petugas_link = 'fooValue'
     * $query->filterByPetugasLink('%fooValue%', Criteria::LIKE); // WHERE petugas_link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $petugasLink The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function filterByPetugasLink($petugasLink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($petugasLink)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeotagTableMap::COL_PETUGAS_LINK, $petugasLink, $comparison);
    }

    /**
     * Filter the query on the sekolah_link column
     *
     * Example usage:
     * <code>
     * $query->filterBySekolahLink('fooValue');   // WHERE sekolah_link = 'fooValue'
     * $query->filterBySekolahLink('%fooValue%', Criteria::LIKE); // WHERE sekolah_link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sekolahLink The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function filterBySekolahLink($sekolahLink = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahLink)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeotagTableMap::COL_SEKOLAH_LINK, $sekolahLink, $comparison);
    }

    /**
     * Filter the query on the tgl_pengiriman column
     *
     * Example usage:
     * <code>
     * $query->filterByTglPengiriman('2011-03-14'); // WHERE tgl_pengiriman = '2011-03-14'
     * $query->filterByTglPengiriman('now'); // WHERE tgl_pengiriman = '2011-03-14'
     * $query->filterByTglPengiriman(array('max' => 'yesterday')); // WHERE tgl_pengiriman > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglPengiriman The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function filterByTglPengiriman($tglPengiriman = null, $comparison = null)
    {
        if (is_array($tglPengiriman)) {
            $useMinMax = false;
            if (isset($tglPengiriman['min'])) {
                $this->addUsingAlias(GeotagTableMap::COL_TGL_PENGIRIMAN, $tglPengiriman['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglPengiriman['max'])) {
                $this->addUsingAlias(GeotagTableMap::COL_TGL_PENGIRIMAN, $tglPengiriman['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeotagTableMap::COL_TGL_PENGIRIMAN, $tglPengiriman, $comparison);
    }

    /**
     * Filter the query on the status_data column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusData(1234); // WHERE status_data = 1234
     * $query->filterByStatusData(array(12, 34)); // WHERE status_data IN (12, 34)
     * $query->filterByStatusData(array('min' => 12)); // WHERE status_data > 12
     * </code>
     *
     * @param     mixed $statusData The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function filterByStatusData($statusData = null, $comparison = null)
    {
        if (is_array($statusData)) {
            $useMinMax = false;
            if (isset($statusData['min'])) {
                $this->addUsingAlias(GeotagTableMap::COL_STATUS_DATA, $statusData['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusData['max'])) {
                $this->addUsingAlias(GeotagTableMap::COL_STATUS_DATA, $statusData['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GeotagTableMap::COL_STATUS_DATA, $statusData, $comparison);
    }

    /**
     * Filter the query by a related \Appdb\Pengguna object
     *
     * @param \Appdb\Pengguna|ObjectCollection $pengguna The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGeotagQuery The current query, for fluid interface
     */
    public function filterByPengguna($pengguna, $comparison = null)
    {
        if ($pengguna instanceof \Appdb\Pengguna) {
            return $this
                ->addUsingAlias(GeotagTableMap::COL_PENGGUNA_ID, $pengguna->getPenggunaId(), $comparison);
        } elseif ($pengguna instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GeotagTableMap::COL_PENGGUNA_ID, $pengguna->toKeyValue('PrimaryKey', 'PenggunaId'), $comparison);
        } else {
            throw new PropelException('filterByPengguna() only accepts arguments of type \Appdb\Pengguna or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pengguna relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function joinPengguna($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pengguna');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Pengguna');
        }

        return $this;
    }

    /**
     * Use the Pengguna relation Pengguna object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Appdb\PenggunaQuery A secondary query class using the current class as primary query
     */
    public function usePenggunaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPengguna($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pengguna', '\Appdb\PenggunaQuery');
    }

    /**
     * Filter the query by a related \Appdb\Sekolah object
     *
     * @param \Appdb\Sekolah|ObjectCollection $sekolah The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGeotagQuery The current query, for fluid interface
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof \Appdb\Sekolah) {
            return $this
                ->addUsingAlias(GeotagTableMap::COL_SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GeotagTableMap::COL_SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
        } else {
            throw new PropelException('filterBySekolah() only accepts arguments of type \Appdb\Sekolah or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function joinSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sekolah');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Sekolah');
        }

        return $this;
    }

    /**
     * Use the Sekolah relation Sekolah object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Appdb\SekolahQuery A secondary query class using the current class as primary query
     */
    public function useSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sekolah', '\Appdb\SekolahQuery');
    }

    /**
     * Filter the query by a related \Appdb\StatusGeotag object
     *
     * @param \Appdb\StatusGeotag|ObjectCollection $statusGeotag The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildGeotagQuery The current query, for fluid interface
     */
    public function filterByStatusGeotag($statusGeotag, $comparison = null)
    {
        if ($statusGeotag instanceof \Appdb\StatusGeotag) {
            return $this
                ->addUsingAlias(GeotagTableMap::COL_STATUS_GEOTAG_ID, $statusGeotag->getStatusGeotagId(), $comparison);
        } elseif ($statusGeotag instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GeotagTableMap::COL_STATUS_GEOTAG_ID, $statusGeotag->toKeyValue('PrimaryKey', 'StatusGeotagId'), $comparison);
        } else {
            throw new PropelException('filterByStatusGeotag() only accepts arguments of type \Appdb\StatusGeotag or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StatusGeotag relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function joinStatusGeotag($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StatusGeotag');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'StatusGeotag');
        }

        return $this;
    }

    /**
     * Use the StatusGeotag relation StatusGeotag object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Appdb\StatusGeotagQuery A secondary query class using the current class as primary query
     */
    public function useStatusGeotagQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatusGeotag($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StatusGeotag', '\Appdb\StatusGeotagQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildGeotag $geotag Object to remove from the list of results
     *
     * @return $this|ChildGeotagQuery The current query, for fluid interface
     */
    public function prune($geotag = null)
    {
        if ($geotag) {
            $this->addUsingAlias(GeotagTableMap::COL_GEOTAG_ID, $geotag->getGeotagId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the geotag table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GeotagTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GeotagTableMap::clearInstancePool();
            GeotagTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(GeotagTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(GeotagTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            GeotagTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            GeotagTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // GeotagQuery
