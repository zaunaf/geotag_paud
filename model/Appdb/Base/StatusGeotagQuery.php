<?php

namespace Appdb\Base;

use \Exception;
use \PDO;
use Appdb\StatusGeotag as ChildStatusGeotag;
use Appdb\StatusGeotagQuery as ChildStatusGeotagQuery;
use Appdb\Map\StatusGeotagTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ref.status_geotag' table.
 *
 *
 *
 * @method     ChildStatusGeotagQuery orderByStatusGeotagId($order = Criteria::ASC) Order by the status_geotag_id column
 * @method     ChildStatusGeotagQuery orderByNamaStatusGeotag($order = Criteria::ASC) Order by the nama_status_geotag column
 *
 * @method     ChildStatusGeotagQuery groupByStatusGeotagId() Group by the status_geotag_id column
 * @method     ChildStatusGeotagQuery groupByNamaStatusGeotag() Group by the nama_status_geotag column
 *
 * @method     ChildStatusGeotagQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildStatusGeotagQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildStatusGeotagQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildStatusGeotagQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildStatusGeotagQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildStatusGeotagQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildStatusGeotagQuery leftJoinGeotag($relationAlias = null) Adds a LEFT JOIN clause to the query using the Geotag relation
 * @method     ChildStatusGeotagQuery rightJoinGeotag($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Geotag relation
 * @method     ChildStatusGeotagQuery innerJoinGeotag($relationAlias = null) Adds a INNER JOIN clause to the query using the Geotag relation
 *
 * @method     ChildStatusGeotagQuery joinWithGeotag($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Geotag relation
 *
 * @method     ChildStatusGeotagQuery leftJoinWithGeotag() Adds a LEFT JOIN clause and with to the query using the Geotag relation
 * @method     ChildStatusGeotagQuery rightJoinWithGeotag() Adds a RIGHT JOIN clause and with to the query using the Geotag relation
 * @method     ChildStatusGeotagQuery innerJoinWithGeotag() Adds a INNER JOIN clause and with to the query using the Geotag relation
 *
 * @method     \Appdb\GeotagQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildStatusGeotag findOne(ConnectionInterface $con = null) Return the first ChildStatusGeotag matching the query
 * @method     ChildStatusGeotag findOneOrCreate(ConnectionInterface $con = null) Return the first ChildStatusGeotag matching the query, or a new ChildStatusGeotag object populated from the query conditions when no match is found
 *
 * @method     ChildStatusGeotag findOneByStatusGeotagId(int $status_geotag_id) Return the first ChildStatusGeotag filtered by the status_geotag_id column
 * @method     ChildStatusGeotag findOneByNamaStatusGeotag(string $nama_status_geotag) Return the first ChildStatusGeotag filtered by the nama_status_geotag column *

 * @method     ChildStatusGeotag requirePk($key, ConnectionInterface $con = null) Return the ChildStatusGeotag by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStatusGeotag requireOne(ConnectionInterface $con = null) Return the first ChildStatusGeotag matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStatusGeotag requireOneByStatusGeotagId(int $status_geotag_id) Return the first ChildStatusGeotag filtered by the status_geotag_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStatusGeotag requireOneByNamaStatusGeotag(string $nama_status_geotag) Return the first ChildStatusGeotag filtered by the nama_status_geotag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStatusGeotag[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildStatusGeotag objects based on current ModelCriteria
 * @method     ChildStatusGeotag[]|ObjectCollection findByStatusGeotagId(int $status_geotag_id) Return ChildStatusGeotag objects filtered by the status_geotag_id column
 * @method     ChildStatusGeotag[]|ObjectCollection findByNamaStatusGeotag(string $nama_status_geotag) Return ChildStatusGeotag objects filtered by the nama_status_geotag column
 * @method     ChildStatusGeotag[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class StatusGeotagQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Appdb\Base\StatusGeotagQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'appdb', $modelName = '\\Appdb\\StatusGeotag', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildStatusGeotagQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildStatusGeotagQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildStatusGeotagQuery) {
            return $criteria;
        }
        $query = new ChildStatusGeotagQuery();
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
     * @return ChildStatusGeotag|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(StatusGeotagTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = StatusGeotagTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildStatusGeotag A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT status_geotag_id, nama_status_geotag FROM ref.status_geotag WHERE status_geotag_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildStatusGeotag $obj */
            $obj = new ChildStatusGeotag();
            $obj->hydrate($row);
            StatusGeotagTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildStatusGeotag|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildStatusGeotagQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StatusGeotagTableMap::COL_STATUS_GEOTAG_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildStatusGeotagQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StatusGeotagTableMap::COL_STATUS_GEOTAG_ID, $keys, Criteria::IN);
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
     * @param     mixed $statusGeotagId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStatusGeotagQuery The current query, for fluid interface
     */
    public function filterByStatusGeotagId($statusGeotagId = null, $comparison = null)
    {
        if (is_array($statusGeotagId)) {
            $useMinMax = false;
            if (isset($statusGeotagId['min'])) {
                $this->addUsingAlias(StatusGeotagTableMap::COL_STATUS_GEOTAG_ID, $statusGeotagId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusGeotagId['max'])) {
                $this->addUsingAlias(StatusGeotagTableMap::COL_STATUS_GEOTAG_ID, $statusGeotagId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusGeotagTableMap::COL_STATUS_GEOTAG_ID, $statusGeotagId, $comparison);
    }

    /**
     * Filter the query on the nama_status_geotag column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaStatusGeotag('fooValue');   // WHERE nama_status_geotag = 'fooValue'
     * $query->filterByNamaStatusGeotag('%fooValue%', Criteria::LIKE); // WHERE nama_status_geotag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaStatusGeotag The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStatusGeotagQuery The current query, for fluid interface
     */
    public function filterByNamaStatusGeotag($namaStatusGeotag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaStatusGeotag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusGeotagTableMap::COL_NAMA_STATUS_GEOTAG, $namaStatusGeotag, $comparison);
    }

    /**
     * Filter the query by a related \Appdb\Geotag object
     *
     * @param \Appdb\Geotag|ObjectCollection $geotag the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildStatusGeotagQuery The current query, for fluid interface
     */
    public function filterByGeotag($geotag, $comparison = null)
    {
        if ($geotag instanceof \Appdb\Geotag) {
            return $this
                ->addUsingAlias(StatusGeotagTableMap::COL_STATUS_GEOTAG_ID, $geotag->getStatusGeotagId(), $comparison);
        } elseif ($geotag instanceof ObjectCollection) {
            return $this
                ->useGeotagQuery()
                ->filterByPrimaryKeys($geotag->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByGeotag() only accepts arguments of type \Appdb\Geotag or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Geotag relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildStatusGeotagQuery The current query, for fluid interface
     */
    public function joinGeotag($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Geotag');

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
            $this->addJoinObject($join, 'Geotag');
        }

        return $this;
    }

    /**
     * Use the Geotag relation Geotag object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Appdb\GeotagQuery A secondary query class using the current class as primary query
     */
    public function useGeotagQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGeotag($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Geotag', '\Appdb\GeotagQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildStatusGeotag $statusGeotag Object to remove from the list of results
     *
     * @return $this|ChildStatusGeotagQuery The current query, for fluid interface
     */
    public function prune($statusGeotag = null)
    {
        if ($statusGeotag) {
            $this->addUsingAlias(StatusGeotagTableMap::COL_STATUS_GEOTAG_ID, $statusGeotag->getStatusGeotagId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ref.status_geotag table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StatusGeotagTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            StatusGeotagTableMap::clearInstancePool();
            StatusGeotagTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(StatusGeotagTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(StatusGeotagTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            StatusGeotagTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            StatusGeotagTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // StatusGeotagQuery
