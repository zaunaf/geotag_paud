<?php

namespace Appdb\Base;

use \Exception;
use \PDO;
use Appdb\Sekolah as ChildSekolah;
use Appdb\SekolahQuery as ChildSekolahQuery;
use Appdb\Map\SekolahTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'sekolah' table.
 *
 *
 *
 * @method     ChildSekolahQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method     ChildSekolahQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method     ChildSekolahQuery orderByNamaNomenklatur($order = Criteria::ASC) Order by the nama_nomenklatur column
 * @method     ChildSekolahQuery orderByNss($order = Criteria::ASC) Order by the nss column
 * @method     ChildSekolahQuery orderByNpsn($order = Criteria::ASC) Order by the npsn column
 * @method     ChildSekolahQuery orderByBentukPendidikanId($order = Criteria::ASC) Order by the bentuk_pendidikan_id column
 * @method     ChildSekolahQuery orderByAlamatJalan($order = Criteria::ASC) Order by the alamat_jalan column
 * @method     ChildSekolahQuery orderByRt($order = Criteria::ASC) Order by the rt column
 * @method     ChildSekolahQuery orderByRw($order = Criteria::ASC) Order by the rw column
 * @method     ChildSekolahQuery orderByNamaDusun($order = Criteria::ASC) Order by the nama_dusun column
 * @method     ChildSekolahQuery orderByDesaKelurahan($order = Criteria::ASC) Order by the desa_kelurahan column
 * @method     ChildSekolahQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method     ChildSekolahQuery orderByKodePos($order = Criteria::ASC) Order by the kode_pos column
 * @method     ChildSekolahQuery orderByLintang($order = Criteria::ASC) Order by the lintang column
 * @method     ChildSekolahQuery orderByBujur($order = Criteria::ASC) Order by the bujur column
 * @method     ChildSekolahQuery orderByNomorTelepon($order = Criteria::ASC) Order by the nomor_telepon column
 * @method     ChildSekolahQuery orderByNomorFax($order = Criteria::ASC) Order by the nomor_fax column
 * @method     ChildSekolahQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ChildSekolahQuery orderByWebsite($order = Criteria::ASC) Order by the website column
 * @method     ChildSekolahQuery orderByKebutuhanKhususId($order = Criteria::ASC) Order by the kebutuhan_khusus_id column
 * @method     ChildSekolahQuery orderByStatusSekolah($order = Criteria::ASC) Order by the status_sekolah column
 * @method     ChildSekolahQuery orderBySkPendirianSekolah($order = Criteria::ASC) Order by the sk_pendirian_sekolah column
 * @method     ChildSekolahQuery orderByTanggalSkPendirian($order = Criteria::ASC) Order by the tanggal_sk_pendirian column
 * @method     ChildSekolahQuery orderByStatusKepemilikanId($order = Criteria::ASC) Order by the status_kepemilikan_id column
 * @method     ChildSekolahQuery orderByYayasanId($order = Criteria::ASC) Order by the yayasan_id column
 * @method     ChildSekolahQuery orderBySkIzinOperasional($order = Criteria::ASC) Order by the sk_izin_operasional column
 * @method     ChildSekolahQuery orderByTanggalSkIzinOperasional($order = Criteria::ASC) Order by the tanggal_sk_izin_operasional column
 * @method     ChildSekolahQuery orderByNoRekening($order = Criteria::ASC) Order by the no_rekening column
 * @method     ChildSekolahQuery orderByNamaBank($order = Criteria::ASC) Order by the nama_bank column
 * @method     ChildSekolahQuery orderByCabangKcpUnit($order = Criteria::ASC) Order by the cabang_kcp_unit column
 * @method     ChildSekolahQuery orderByRekeningAtasNama($order = Criteria::ASC) Order by the rekening_atas_nama column
 * @method     ChildSekolahQuery orderByMbs($order = Criteria::ASC) Order by the mbs column
 * @method     ChildSekolahQuery orderByLuasTanahMilik($order = Criteria::ASC) Order by the luas_tanah_milik column
 * @method     ChildSekolahQuery orderByLuasTanahBukanMilik($order = Criteria::ASC) Order by the luas_tanah_bukan_milik column
 * @method     ChildSekolahQuery orderByKodeRegistrasi($order = Criteria::ASC) Order by the kode_registrasi column
 * @method     ChildSekolahQuery orderByNpwp($order = Criteria::ASC) Order by the npwp column
 * @method     ChildSekolahQuery orderByNmWp($order = Criteria::ASC) Order by the nm_wp column
 * @method     ChildSekolahQuery orderByFlag($order = Criteria::ASC) Order by the flag column
 * @method     ChildSekolahQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method     ChildSekolahQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method     ChildSekolahQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method     ChildSekolahQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method     ChildSekolahQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method     ChildSekolahQuery groupBySekolahId() Group by the sekolah_id column
 * @method     ChildSekolahQuery groupByNama() Group by the nama column
 * @method     ChildSekolahQuery groupByNamaNomenklatur() Group by the nama_nomenklatur column
 * @method     ChildSekolahQuery groupByNss() Group by the nss column
 * @method     ChildSekolahQuery groupByNpsn() Group by the npsn column
 * @method     ChildSekolahQuery groupByBentukPendidikanId() Group by the bentuk_pendidikan_id column
 * @method     ChildSekolahQuery groupByAlamatJalan() Group by the alamat_jalan column
 * @method     ChildSekolahQuery groupByRt() Group by the rt column
 * @method     ChildSekolahQuery groupByRw() Group by the rw column
 * @method     ChildSekolahQuery groupByNamaDusun() Group by the nama_dusun column
 * @method     ChildSekolahQuery groupByDesaKelurahan() Group by the desa_kelurahan column
 * @method     ChildSekolahQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method     ChildSekolahQuery groupByKodePos() Group by the kode_pos column
 * @method     ChildSekolahQuery groupByLintang() Group by the lintang column
 * @method     ChildSekolahQuery groupByBujur() Group by the bujur column
 * @method     ChildSekolahQuery groupByNomorTelepon() Group by the nomor_telepon column
 * @method     ChildSekolahQuery groupByNomorFax() Group by the nomor_fax column
 * @method     ChildSekolahQuery groupByEmail() Group by the email column
 * @method     ChildSekolahQuery groupByWebsite() Group by the website column
 * @method     ChildSekolahQuery groupByKebutuhanKhususId() Group by the kebutuhan_khusus_id column
 * @method     ChildSekolahQuery groupByStatusSekolah() Group by the status_sekolah column
 * @method     ChildSekolahQuery groupBySkPendirianSekolah() Group by the sk_pendirian_sekolah column
 * @method     ChildSekolahQuery groupByTanggalSkPendirian() Group by the tanggal_sk_pendirian column
 * @method     ChildSekolahQuery groupByStatusKepemilikanId() Group by the status_kepemilikan_id column
 * @method     ChildSekolahQuery groupByYayasanId() Group by the yayasan_id column
 * @method     ChildSekolahQuery groupBySkIzinOperasional() Group by the sk_izin_operasional column
 * @method     ChildSekolahQuery groupByTanggalSkIzinOperasional() Group by the tanggal_sk_izin_operasional column
 * @method     ChildSekolahQuery groupByNoRekening() Group by the no_rekening column
 * @method     ChildSekolahQuery groupByNamaBank() Group by the nama_bank column
 * @method     ChildSekolahQuery groupByCabangKcpUnit() Group by the cabang_kcp_unit column
 * @method     ChildSekolahQuery groupByRekeningAtasNama() Group by the rekening_atas_nama column
 * @method     ChildSekolahQuery groupByMbs() Group by the mbs column
 * @method     ChildSekolahQuery groupByLuasTanahMilik() Group by the luas_tanah_milik column
 * @method     ChildSekolahQuery groupByLuasTanahBukanMilik() Group by the luas_tanah_bukan_milik column
 * @method     ChildSekolahQuery groupByKodeRegistrasi() Group by the kode_registrasi column
 * @method     ChildSekolahQuery groupByNpwp() Group by the npwp column
 * @method     ChildSekolahQuery groupByNmWp() Group by the nm_wp column
 * @method     ChildSekolahQuery groupByFlag() Group by the flag column
 * @method     ChildSekolahQuery groupByCreateDate() Group by the create_date column
 * @method     ChildSekolahQuery groupByLastUpdate() Group by the last_update column
 * @method     ChildSekolahQuery groupBySoftDelete() Group by the soft_delete column
 * @method     ChildSekolahQuery groupByLastSync() Group by the last_sync column
 * @method     ChildSekolahQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method     ChildSekolahQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSekolahQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSekolahQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSekolahQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSekolahQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSekolahQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSekolahQuery leftJoinFoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Foto relation
 * @method     ChildSekolahQuery rightJoinFoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Foto relation
 * @method     ChildSekolahQuery innerJoinFoto($relationAlias = null) Adds a INNER JOIN clause to the query using the Foto relation
 *
 * @method     ChildSekolahQuery joinWithFoto($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Foto relation
 *
 * @method     ChildSekolahQuery leftJoinWithFoto() Adds a LEFT JOIN clause and with to the query using the Foto relation
 * @method     ChildSekolahQuery rightJoinWithFoto() Adds a RIGHT JOIN clause and with to the query using the Foto relation
 * @method     ChildSekolahQuery innerJoinWithFoto() Adds a INNER JOIN clause and with to the query using the Foto relation
 *
 * @method     ChildSekolahQuery leftJoinGeotag($relationAlias = null) Adds a LEFT JOIN clause to the query using the Geotag relation
 * @method     ChildSekolahQuery rightJoinGeotag($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Geotag relation
 * @method     ChildSekolahQuery innerJoinGeotag($relationAlias = null) Adds a INNER JOIN clause to the query using the Geotag relation
 *
 * @method     ChildSekolahQuery joinWithGeotag($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Geotag relation
 *
 * @method     ChildSekolahQuery leftJoinWithGeotag() Adds a LEFT JOIN clause and with to the query using the Geotag relation
 * @method     ChildSekolahQuery rightJoinWithGeotag() Adds a RIGHT JOIN clause and with to the query using the Geotag relation
 * @method     ChildSekolahQuery innerJoinWithGeotag() Adds a INNER JOIN clause and with to the query using the Geotag relation
 *
 * @method     ChildSekolahQuery leftJoinPengguna($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pengguna relation
 * @method     ChildSekolahQuery rightJoinPengguna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pengguna relation
 * @method     ChildSekolahQuery innerJoinPengguna($relationAlias = null) Adds a INNER JOIN clause to the query using the Pengguna relation
 *
 * @method     ChildSekolahQuery joinWithPengguna($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Pengguna relation
 *
 * @method     ChildSekolahQuery leftJoinWithPengguna() Adds a LEFT JOIN clause and with to the query using the Pengguna relation
 * @method     ChildSekolahQuery rightJoinWithPengguna() Adds a RIGHT JOIN clause and with to the query using the Pengguna relation
 * @method     ChildSekolahQuery innerJoinWithPengguna() Adds a INNER JOIN clause and with to the query using the Pengguna relation
 *
 * @method     \Appdb\FotoQuery|\Appdb\GeotagQuery|\Appdb\PenggunaQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSekolah findOne(ConnectionInterface $con = null) Return the first ChildSekolah matching the query
 * @method     ChildSekolah findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSekolah matching the query, or a new ChildSekolah object populated from the query conditions when no match is found
 *
 * @method     ChildSekolah findOneBySekolahId(string $sekolah_id) Return the first ChildSekolah filtered by the sekolah_id column
 * @method     ChildSekolah findOneByNama(string $nama) Return the first ChildSekolah filtered by the nama column
 * @method     ChildSekolah findOneByNamaNomenklatur(string $nama_nomenklatur) Return the first ChildSekolah filtered by the nama_nomenklatur column
 * @method     ChildSekolah findOneByNss(string $nss) Return the first ChildSekolah filtered by the nss column
 * @method     ChildSekolah findOneByNpsn(string $npsn) Return the first ChildSekolah filtered by the npsn column
 * @method     ChildSekolah findOneByBentukPendidikanId(int $bentuk_pendidikan_id) Return the first ChildSekolah filtered by the bentuk_pendidikan_id column
 * @method     ChildSekolah findOneByAlamatJalan(string $alamat_jalan) Return the first ChildSekolah filtered by the alamat_jalan column
 * @method     ChildSekolah findOneByRt(string $rt) Return the first ChildSekolah filtered by the rt column
 * @method     ChildSekolah findOneByRw(string $rw) Return the first ChildSekolah filtered by the rw column
 * @method     ChildSekolah findOneByNamaDusun(string $nama_dusun) Return the first ChildSekolah filtered by the nama_dusun column
 * @method     ChildSekolah findOneByDesaKelurahan(string $desa_kelurahan) Return the first ChildSekolah filtered by the desa_kelurahan column
 * @method     ChildSekolah findOneByKodeWilayah(string $kode_wilayah) Return the first ChildSekolah filtered by the kode_wilayah column
 * @method     ChildSekolah findOneByKodePos(string $kode_pos) Return the first ChildSekolah filtered by the kode_pos column
 * @method     ChildSekolah findOneByLintang(string $lintang) Return the first ChildSekolah filtered by the lintang column
 * @method     ChildSekolah findOneByBujur(string $bujur) Return the first ChildSekolah filtered by the bujur column
 * @method     ChildSekolah findOneByNomorTelepon(string $nomor_telepon) Return the first ChildSekolah filtered by the nomor_telepon column
 * @method     ChildSekolah findOneByNomorFax(string $nomor_fax) Return the first ChildSekolah filtered by the nomor_fax column
 * @method     ChildSekolah findOneByEmail(string $email) Return the first ChildSekolah filtered by the email column
 * @method     ChildSekolah findOneByWebsite(string $website) Return the first ChildSekolah filtered by the website column
 * @method     ChildSekolah findOneByKebutuhanKhususId(int $kebutuhan_khusus_id) Return the first ChildSekolah filtered by the kebutuhan_khusus_id column
 * @method     ChildSekolah findOneByStatusSekolah(string $status_sekolah) Return the first ChildSekolah filtered by the status_sekolah column
 * @method     ChildSekolah findOneBySkPendirianSekolah(string $sk_pendirian_sekolah) Return the first ChildSekolah filtered by the sk_pendirian_sekolah column
 * @method     ChildSekolah findOneByTanggalSkPendirian(string $tanggal_sk_pendirian) Return the first ChildSekolah filtered by the tanggal_sk_pendirian column
 * @method     ChildSekolah findOneByStatusKepemilikanId(string $status_kepemilikan_id) Return the first ChildSekolah filtered by the status_kepemilikan_id column
 * @method     ChildSekolah findOneByYayasanId(string $yayasan_id) Return the first ChildSekolah filtered by the yayasan_id column
 * @method     ChildSekolah findOneBySkIzinOperasional(string $sk_izin_operasional) Return the first ChildSekolah filtered by the sk_izin_operasional column
 * @method     ChildSekolah findOneByTanggalSkIzinOperasional(string $tanggal_sk_izin_operasional) Return the first ChildSekolah filtered by the tanggal_sk_izin_operasional column
 * @method     ChildSekolah findOneByNoRekening(string $no_rekening) Return the first ChildSekolah filtered by the no_rekening column
 * @method     ChildSekolah findOneByNamaBank(string $nama_bank) Return the first ChildSekolah filtered by the nama_bank column
 * @method     ChildSekolah findOneByCabangKcpUnit(string $cabang_kcp_unit) Return the first ChildSekolah filtered by the cabang_kcp_unit column
 * @method     ChildSekolah findOneByRekeningAtasNama(string $rekening_atas_nama) Return the first ChildSekolah filtered by the rekening_atas_nama column
 * @method     ChildSekolah findOneByMbs(string $mbs) Return the first ChildSekolah filtered by the mbs column
 * @method     ChildSekolah findOneByLuasTanahMilik(string $luas_tanah_milik) Return the first ChildSekolah filtered by the luas_tanah_milik column
 * @method     ChildSekolah findOneByLuasTanahBukanMilik(string $luas_tanah_bukan_milik) Return the first ChildSekolah filtered by the luas_tanah_bukan_milik column
 * @method     ChildSekolah findOneByKodeRegistrasi(string $kode_registrasi) Return the first ChildSekolah filtered by the kode_registrasi column
 * @method     ChildSekolah findOneByNpwp(string $npwp) Return the first ChildSekolah filtered by the npwp column
 * @method     ChildSekolah findOneByNmWp(string $nm_wp) Return the first ChildSekolah filtered by the nm_wp column
 * @method     ChildSekolah findOneByFlag(string $flag) Return the first ChildSekolah filtered by the flag column
 * @method     ChildSekolah findOneByCreateDate(string $create_date) Return the first ChildSekolah filtered by the create_date column
 * @method     ChildSekolah findOneByLastUpdate(string $last_update) Return the first ChildSekolah filtered by the last_update column
 * @method     ChildSekolah findOneBySoftDelete(string $soft_delete) Return the first ChildSekolah filtered by the soft_delete column
 * @method     ChildSekolah findOneByLastSync(string $last_sync) Return the first ChildSekolah filtered by the last_sync column
 * @method     ChildSekolah findOneByUpdaterId(string $updater_id) Return the first ChildSekolah filtered by the updater_id column *

 * @method     ChildSekolah requirePk($key, ConnectionInterface $con = null) Return the ChildSekolah by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOne(ConnectionInterface $con = null) Return the first ChildSekolah matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSekolah requireOneBySekolahId(string $sekolah_id) Return the first ChildSekolah filtered by the sekolah_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByNama(string $nama) Return the first ChildSekolah filtered by the nama column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByNamaNomenklatur(string $nama_nomenklatur) Return the first ChildSekolah filtered by the nama_nomenklatur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByNss(string $nss) Return the first ChildSekolah filtered by the nss column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByNpsn(string $npsn) Return the first ChildSekolah filtered by the npsn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByBentukPendidikanId(int $bentuk_pendidikan_id) Return the first ChildSekolah filtered by the bentuk_pendidikan_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByAlamatJalan(string $alamat_jalan) Return the first ChildSekolah filtered by the alamat_jalan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByRt(string $rt) Return the first ChildSekolah filtered by the rt column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByRw(string $rw) Return the first ChildSekolah filtered by the rw column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByNamaDusun(string $nama_dusun) Return the first ChildSekolah filtered by the nama_dusun column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByDesaKelurahan(string $desa_kelurahan) Return the first ChildSekolah filtered by the desa_kelurahan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByKodeWilayah(string $kode_wilayah) Return the first ChildSekolah filtered by the kode_wilayah column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByKodePos(string $kode_pos) Return the first ChildSekolah filtered by the kode_pos column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByLintang(string $lintang) Return the first ChildSekolah filtered by the lintang column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByBujur(string $bujur) Return the first ChildSekolah filtered by the bujur column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByNomorTelepon(string $nomor_telepon) Return the first ChildSekolah filtered by the nomor_telepon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByNomorFax(string $nomor_fax) Return the first ChildSekolah filtered by the nomor_fax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByEmail(string $email) Return the first ChildSekolah filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByWebsite(string $website) Return the first ChildSekolah filtered by the website column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByKebutuhanKhususId(int $kebutuhan_khusus_id) Return the first ChildSekolah filtered by the kebutuhan_khusus_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByStatusSekolah(string $status_sekolah) Return the first ChildSekolah filtered by the status_sekolah column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneBySkPendirianSekolah(string $sk_pendirian_sekolah) Return the first ChildSekolah filtered by the sk_pendirian_sekolah column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByTanggalSkPendirian(string $tanggal_sk_pendirian) Return the first ChildSekolah filtered by the tanggal_sk_pendirian column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByStatusKepemilikanId(string $status_kepemilikan_id) Return the first ChildSekolah filtered by the status_kepemilikan_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByYayasanId(string $yayasan_id) Return the first ChildSekolah filtered by the yayasan_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneBySkIzinOperasional(string $sk_izin_operasional) Return the first ChildSekolah filtered by the sk_izin_operasional column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByTanggalSkIzinOperasional(string $tanggal_sk_izin_operasional) Return the first ChildSekolah filtered by the tanggal_sk_izin_operasional column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByNoRekening(string $no_rekening) Return the first ChildSekolah filtered by the no_rekening column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByNamaBank(string $nama_bank) Return the first ChildSekolah filtered by the nama_bank column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByCabangKcpUnit(string $cabang_kcp_unit) Return the first ChildSekolah filtered by the cabang_kcp_unit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByRekeningAtasNama(string $rekening_atas_nama) Return the first ChildSekolah filtered by the rekening_atas_nama column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByMbs(string $mbs) Return the first ChildSekolah filtered by the mbs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByLuasTanahMilik(string $luas_tanah_milik) Return the first ChildSekolah filtered by the luas_tanah_milik column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByLuasTanahBukanMilik(string $luas_tanah_bukan_milik) Return the first ChildSekolah filtered by the luas_tanah_bukan_milik column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByKodeRegistrasi(string $kode_registrasi) Return the first ChildSekolah filtered by the kode_registrasi column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByNpwp(string $npwp) Return the first ChildSekolah filtered by the npwp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByNmWp(string $nm_wp) Return the first ChildSekolah filtered by the nm_wp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByFlag(string $flag) Return the first ChildSekolah filtered by the flag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByCreateDate(string $create_date) Return the first ChildSekolah filtered by the create_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByLastUpdate(string $last_update) Return the first ChildSekolah filtered by the last_update column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneBySoftDelete(string $soft_delete) Return the first ChildSekolah filtered by the soft_delete column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByLastSync(string $last_sync) Return the first ChildSekolah filtered by the last_sync column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSekolah requireOneByUpdaterId(string $updater_id) Return the first ChildSekolah filtered by the updater_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSekolah[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSekolah objects based on current ModelCriteria
 * @method     ChildSekolah[]|ObjectCollection findBySekolahId(string $sekolah_id) Return ChildSekolah objects filtered by the sekolah_id column
 * @method     ChildSekolah[]|ObjectCollection findByNama(string $nama) Return ChildSekolah objects filtered by the nama column
 * @method     ChildSekolah[]|ObjectCollection findByNamaNomenklatur(string $nama_nomenklatur) Return ChildSekolah objects filtered by the nama_nomenklatur column
 * @method     ChildSekolah[]|ObjectCollection findByNss(string $nss) Return ChildSekolah objects filtered by the nss column
 * @method     ChildSekolah[]|ObjectCollection findByNpsn(string $npsn) Return ChildSekolah objects filtered by the npsn column
 * @method     ChildSekolah[]|ObjectCollection findByBentukPendidikanId(int $bentuk_pendidikan_id) Return ChildSekolah objects filtered by the bentuk_pendidikan_id column
 * @method     ChildSekolah[]|ObjectCollection findByAlamatJalan(string $alamat_jalan) Return ChildSekolah objects filtered by the alamat_jalan column
 * @method     ChildSekolah[]|ObjectCollection findByRt(string $rt) Return ChildSekolah objects filtered by the rt column
 * @method     ChildSekolah[]|ObjectCollection findByRw(string $rw) Return ChildSekolah objects filtered by the rw column
 * @method     ChildSekolah[]|ObjectCollection findByNamaDusun(string $nama_dusun) Return ChildSekolah objects filtered by the nama_dusun column
 * @method     ChildSekolah[]|ObjectCollection findByDesaKelurahan(string $desa_kelurahan) Return ChildSekolah objects filtered by the desa_kelurahan column
 * @method     ChildSekolah[]|ObjectCollection findByKodeWilayah(string $kode_wilayah) Return ChildSekolah objects filtered by the kode_wilayah column
 * @method     ChildSekolah[]|ObjectCollection findByKodePos(string $kode_pos) Return ChildSekolah objects filtered by the kode_pos column
 * @method     ChildSekolah[]|ObjectCollection findByLintang(string $lintang) Return ChildSekolah objects filtered by the lintang column
 * @method     ChildSekolah[]|ObjectCollection findByBujur(string $bujur) Return ChildSekolah objects filtered by the bujur column
 * @method     ChildSekolah[]|ObjectCollection findByNomorTelepon(string $nomor_telepon) Return ChildSekolah objects filtered by the nomor_telepon column
 * @method     ChildSekolah[]|ObjectCollection findByNomorFax(string $nomor_fax) Return ChildSekolah objects filtered by the nomor_fax column
 * @method     ChildSekolah[]|ObjectCollection findByEmail(string $email) Return ChildSekolah objects filtered by the email column
 * @method     ChildSekolah[]|ObjectCollection findByWebsite(string $website) Return ChildSekolah objects filtered by the website column
 * @method     ChildSekolah[]|ObjectCollection findByKebutuhanKhususId(int $kebutuhan_khusus_id) Return ChildSekolah objects filtered by the kebutuhan_khusus_id column
 * @method     ChildSekolah[]|ObjectCollection findByStatusSekolah(string $status_sekolah) Return ChildSekolah objects filtered by the status_sekolah column
 * @method     ChildSekolah[]|ObjectCollection findBySkPendirianSekolah(string $sk_pendirian_sekolah) Return ChildSekolah objects filtered by the sk_pendirian_sekolah column
 * @method     ChildSekolah[]|ObjectCollection findByTanggalSkPendirian(string $tanggal_sk_pendirian) Return ChildSekolah objects filtered by the tanggal_sk_pendirian column
 * @method     ChildSekolah[]|ObjectCollection findByStatusKepemilikanId(string $status_kepemilikan_id) Return ChildSekolah objects filtered by the status_kepemilikan_id column
 * @method     ChildSekolah[]|ObjectCollection findByYayasanId(string $yayasan_id) Return ChildSekolah objects filtered by the yayasan_id column
 * @method     ChildSekolah[]|ObjectCollection findBySkIzinOperasional(string $sk_izin_operasional) Return ChildSekolah objects filtered by the sk_izin_operasional column
 * @method     ChildSekolah[]|ObjectCollection findByTanggalSkIzinOperasional(string $tanggal_sk_izin_operasional) Return ChildSekolah objects filtered by the tanggal_sk_izin_operasional column
 * @method     ChildSekolah[]|ObjectCollection findByNoRekening(string $no_rekening) Return ChildSekolah objects filtered by the no_rekening column
 * @method     ChildSekolah[]|ObjectCollection findByNamaBank(string $nama_bank) Return ChildSekolah objects filtered by the nama_bank column
 * @method     ChildSekolah[]|ObjectCollection findByCabangKcpUnit(string $cabang_kcp_unit) Return ChildSekolah objects filtered by the cabang_kcp_unit column
 * @method     ChildSekolah[]|ObjectCollection findByRekeningAtasNama(string $rekening_atas_nama) Return ChildSekolah objects filtered by the rekening_atas_nama column
 * @method     ChildSekolah[]|ObjectCollection findByMbs(string $mbs) Return ChildSekolah objects filtered by the mbs column
 * @method     ChildSekolah[]|ObjectCollection findByLuasTanahMilik(string $luas_tanah_milik) Return ChildSekolah objects filtered by the luas_tanah_milik column
 * @method     ChildSekolah[]|ObjectCollection findByLuasTanahBukanMilik(string $luas_tanah_bukan_milik) Return ChildSekolah objects filtered by the luas_tanah_bukan_milik column
 * @method     ChildSekolah[]|ObjectCollection findByKodeRegistrasi(string $kode_registrasi) Return ChildSekolah objects filtered by the kode_registrasi column
 * @method     ChildSekolah[]|ObjectCollection findByNpwp(string $npwp) Return ChildSekolah objects filtered by the npwp column
 * @method     ChildSekolah[]|ObjectCollection findByNmWp(string $nm_wp) Return ChildSekolah objects filtered by the nm_wp column
 * @method     ChildSekolah[]|ObjectCollection findByFlag(string $flag) Return ChildSekolah objects filtered by the flag column
 * @method     ChildSekolah[]|ObjectCollection findByCreateDate(string $create_date) Return ChildSekolah objects filtered by the create_date column
 * @method     ChildSekolah[]|ObjectCollection findByLastUpdate(string $last_update) Return ChildSekolah objects filtered by the last_update column
 * @method     ChildSekolah[]|ObjectCollection findBySoftDelete(string $soft_delete) Return ChildSekolah objects filtered by the soft_delete column
 * @method     ChildSekolah[]|ObjectCollection findByLastSync(string $last_sync) Return ChildSekolah objects filtered by the last_sync column
 * @method     ChildSekolah[]|ObjectCollection findByUpdaterId(string $updater_id) Return ChildSekolah objects filtered by the updater_id column
 * @method     ChildSekolah[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SekolahQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Appdb\Base\SekolahQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'appdb', $modelName = '\\Appdb\\Sekolah', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSekolahQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSekolahQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSekolahQuery) {
            return $criteria;
        }
        $query = new ChildSekolahQuery();
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
     * @return ChildSekolah|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SekolahTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SekolahTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSekolah A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sekolah_id, nama, nama_nomenklatur, nss, npsn, bentuk_pendidikan_id, alamat_jalan, rt, rw, nama_dusun, desa_kelurahan, kode_wilayah, kode_pos, lintang, bujur, nomor_telepon, nomor_fax, email, website, kebutuhan_khusus_id, status_sekolah, sk_pendirian_sekolah, tanggal_sk_pendirian, status_kepemilikan_id, yayasan_id, sk_izin_operasional, tanggal_sk_izin_operasional, no_rekening, nama_bank, cabang_kcp_unit, rekening_atas_nama, mbs, luas_tanah_milik, luas_tanah_bukan_milik, kode_registrasi, npwp, nm_wp, flag, create_date, last_update, soft_delete, last_sync, updater_id FROM sekolah WHERE sekolah_id = :p0';
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
            /** @var ChildSekolah $obj */
            $obj = new ChildSekolah();
            $obj->hydrate($row);
            SekolahTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSekolah|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SekolahTableMap::COL_SEKOLAH_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SekolahTableMap::COL_SEKOLAH_ID, $keys, Criteria::IN);
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
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterBySekolahId($sekolahId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the nama column
     *
     * Example usage:
     * <code>
     * $query->filterByNama('fooValue');   // WHERE nama = 'fooValue'
     * $query->filterByNama('%fooValue%', Criteria::LIKE); // WHERE nama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nama The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the nama_nomenklatur column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaNomenklatur('fooValue');   // WHERE nama_nomenklatur = 'fooValue'
     * $query->filterByNamaNomenklatur('%fooValue%', Criteria::LIKE); // WHERE nama_nomenklatur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaNomenklatur The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByNamaNomenklatur($namaNomenklatur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaNomenklatur)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_NAMA_NOMENKLATUR, $namaNomenklatur, $comparison);
    }

    /**
     * Filter the query on the nss column
     *
     * Example usage:
     * <code>
     * $query->filterByNss('fooValue');   // WHERE nss = 'fooValue'
     * $query->filterByNss('%fooValue%', Criteria::LIKE); // WHERE nss LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nss The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByNss($nss = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nss)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_NSS, $nss, $comparison);
    }

    /**
     * Filter the query on the npsn column
     *
     * Example usage:
     * <code>
     * $query->filterByNpsn('fooValue');   // WHERE npsn = 'fooValue'
     * $query->filterByNpsn('%fooValue%', Criteria::LIKE); // WHERE npsn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $npsn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByNpsn($npsn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($npsn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_NPSN, $npsn, $comparison);
    }

    /**
     * Filter the query on the bentuk_pendidikan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBentukPendidikanId(1234); // WHERE bentuk_pendidikan_id = 1234
     * $query->filterByBentukPendidikanId(array(12, 34)); // WHERE bentuk_pendidikan_id IN (12, 34)
     * $query->filterByBentukPendidikanId(array('min' => 12)); // WHERE bentuk_pendidikan_id > 12
     * </code>
     *
     * @param     mixed $bentukPendidikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByBentukPendidikanId($bentukPendidikanId = null, $comparison = null)
    {
        if (is_array($bentukPendidikanId)) {
            $useMinMax = false;
            if (isset($bentukPendidikanId['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_BENTUK_PENDIDIKAN_ID, $bentukPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bentukPendidikanId['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_BENTUK_PENDIDIKAN_ID, $bentukPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_BENTUK_PENDIDIKAN_ID, $bentukPendidikanId, $comparison);
    }

    /**
     * Filter the query on the alamat_jalan column
     *
     * Example usage:
     * <code>
     * $query->filterByAlamatJalan('fooValue');   // WHERE alamat_jalan = 'fooValue'
     * $query->filterByAlamatJalan('%fooValue%', Criteria::LIKE); // WHERE alamat_jalan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alamatJalan The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByAlamatJalan($alamatJalan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alamatJalan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_ALAMAT_JALAN, $alamatJalan, $comparison);
    }

    /**
     * Filter the query on the rt column
     *
     * Example usage:
     * <code>
     * $query->filterByRt(1234); // WHERE rt = 1234
     * $query->filterByRt(array(12, 34)); // WHERE rt IN (12, 34)
     * $query->filterByRt(array('min' => 12)); // WHERE rt > 12
     * </code>
     *
     * @param     mixed $rt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByRt($rt = null, $comparison = null)
    {
        if (is_array($rt)) {
            $useMinMax = false;
            if (isset($rt['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_RT, $rt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rt['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_RT, $rt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_RT, $rt, $comparison);
    }

    /**
     * Filter the query on the rw column
     *
     * Example usage:
     * <code>
     * $query->filterByRw(1234); // WHERE rw = 1234
     * $query->filterByRw(array(12, 34)); // WHERE rw IN (12, 34)
     * $query->filterByRw(array('min' => 12)); // WHERE rw > 12
     * </code>
     *
     * @param     mixed $rw The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByRw($rw = null, $comparison = null)
    {
        if (is_array($rw)) {
            $useMinMax = false;
            if (isset($rw['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_RW, $rw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rw['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_RW, $rw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_RW, $rw, $comparison);
    }

    /**
     * Filter the query on the nama_dusun column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaDusun('fooValue');   // WHERE nama_dusun = 'fooValue'
     * $query->filterByNamaDusun('%fooValue%', Criteria::LIKE); // WHERE nama_dusun LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaDusun The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByNamaDusun($namaDusun = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaDusun)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_NAMA_DUSUN, $namaDusun, $comparison);
    }

    /**
     * Filter the query on the desa_kelurahan column
     *
     * Example usage:
     * <code>
     * $query->filterByDesaKelurahan('fooValue');   // WHERE desa_kelurahan = 'fooValue'
     * $query->filterByDesaKelurahan('%fooValue%', Criteria::LIKE); // WHERE desa_kelurahan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desaKelurahan The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByDesaKelurahan($desaKelurahan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desaKelurahan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_DESA_KELURAHAN, $desaKelurahan, $comparison);
    }

    /**
     * Filter the query on the kode_wilayah column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeWilayah('fooValue');   // WHERE kode_wilayah = 'fooValue'
     * $query->filterByKodeWilayah('%fooValue%', Criteria::LIKE); // WHERE kode_wilayah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeWilayah The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByKodeWilayah($kodeWilayah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeWilayah)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_KODE_WILAYAH, $kodeWilayah, $comparison);
    }

    /**
     * Filter the query on the kode_pos column
     *
     * Example usage:
     * <code>
     * $query->filterByKodePos('fooValue');   // WHERE kode_pos = 'fooValue'
     * $query->filterByKodePos('%fooValue%', Criteria::LIKE); // WHERE kode_pos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodePos The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByKodePos($kodePos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodePos)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_KODE_POS, $kodePos, $comparison);
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
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByLintang($lintang = null, $comparison = null)
    {
        if (is_array($lintang)) {
            $useMinMax = false;
            if (isset($lintang['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_LINTANG, $lintang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lintang['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_LINTANG, $lintang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_LINTANG, $lintang, $comparison);
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
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByBujur($bujur = null, $comparison = null)
    {
        if (is_array($bujur)) {
            $useMinMax = false;
            if (isset($bujur['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_BUJUR, $bujur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bujur['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_BUJUR, $bujur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_BUJUR, $bujur, $comparison);
    }

    /**
     * Filter the query on the nomor_telepon column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorTelepon('fooValue');   // WHERE nomor_telepon = 'fooValue'
     * $query->filterByNomorTelepon('%fooValue%', Criteria::LIKE); // WHERE nomor_telepon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorTelepon The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByNomorTelepon($nomorTelepon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorTelepon)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_NOMOR_TELEPON, $nomorTelepon, $comparison);
    }

    /**
     * Filter the query on the nomor_fax column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorFax('fooValue');   // WHERE nomor_fax = 'fooValue'
     * $query->filterByNomorFax('%fooValue%', Criteria::LIKE); // WHERE nomor_fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorFax The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByNomorFax($nomorFax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorFax)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_NOMOR_FAX, $nomorFax, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the website column
     *
     * Example usage:
     * <code>
     * $query->filterByWebsite('fooValue');   // WHERE website = 'fooValue'
     * $query->filterByWebsite('%fooValue%', Criteria::LIKE); // WHERE website LIKE '%fooValue%'
     * </code>
     *
     * @param     string $website The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByWebsite($website = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($website)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_WEBSITE, $website, $comparison);
    }

    /**
     * Filter the query on the kebutuhan_khusus_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKebutuhanKhususId(1234); // WHERE kebutuhan_khusus_id = 1234
     * $query->filterByKebutuhanKhususId(array(12, 34)); // WHERE kebutuhan_khusus_id IN (12, 34)
     * $query->filterByKebutuhanKhususId(array('min' => 12)); // WHERE kebutuhan_khusus_id > 12
     * </code>
     *
     * @param     mixed $kebutuhanKhususId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByKebutuhanKhususId($kebutuhanKhususId = null, $comparison = null)
    {
        if (is_array($kebutuhanKhususId)) {
            $useMinMax = false;
            if (isset($kebutuhanKhususId['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kebutuhanKhususId['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId, $comparison);
    }

    /**
     * Filter the query on the status_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusSekolah(1234); // WHERE status_sekolah = 1234
     * $query->filterByStatusSekolah(array(12, 34)); // WHERE status_sekolah IN (12, 34)
     * $query->filterByStatusSekolah(array('min' => 12)); // WHERE status_sekolah > 12
     * </code>
     *
     * @param     mixed $statusSekolah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByStatusSekolah($statusSekolah = null, $comparison = null)
    {
        if (is_array($statusSekolah)) {
            $useMinMax = false;
            if (isset($statusSekolah['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_STATUS_SEKOLAH, $statusSekolah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusSekolah['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_STATUS_SEKOLAH, $statusSekolah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_STATUS_SEKOLAH, $statusSekolah, $comparison);
    }

    /**
     * Filter the query on the sk_pendirian_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterBySkPendirianSekolah('fooValue');   // WHERE sk_pendirian_sekolah = 'fooValue'
     * $query->filterBySkPendirianSekolah('%fooValue%', Criteria::LIKE); // WHERE sk_pendirian_sekolah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skPendirianSekolah The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterBySkPendirianSekolah($skPendirianSekolah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skPendirianSekolah)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_SK_PENDIRIAN_SEKOLAH, $skPendirianSekolah, $comparison);
    }

    /**
     * Filter the query on the tanggal_sk_pendirian column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalSkPendirian('2011-03-14'); // WHERE tanggal_sk_pendirian = '2011-03-14'
     * $query->filterByTanggalSkPendirian('now'); // WHERE tanggal_sk_pendirian = '2011-03-14'
     * $query->filterByTanggalSkPendirian(array('max' => 'yesterday')); // WHERE tanggal_sk_pendirian > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalSkPendirian The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByTanggalSkPendirian($tanggalSkPendirian = null, $comparison = null)
    {
        if (is_array($tanggalSkPendirian)) {
            $useMinMax = false;
            if (isset($tanggalSkPendirian['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_TANGGAL_SK_PENDIRIAN, $tanggalSkPendirian['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSkPendirian['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_TANGGAL_SK_PENDIRIAN, $tanggalSkPendirian['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_TANGGAL_SK_PENDIRIAN, $tanggalSkPendirian, $comparison);
    }

    /**
     * Filter the query on the status_kepemilikan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusKepemilikanId(1234); // WHERE status_kepemilikan_id = 1234
     * $query->filterByStatusKepemilikanId(array(12, 34)); // WHERE status_kepemilikan_id IN (12, 34)
     * $query->filterByStatusKepemilikanId(array('min' => 12)); // WHERE status_kepemilikan_id > 12
     * </code>
     *
     * @param     mixed $statusKepemilikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByStatusKepemilikanId($statusKepemilikanId = null, $comparison = null)
    {
        if (is_array($statusKepemilikanId)) {
            $useMinMax = false;
            if (isset($statusKepemilikanId['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_STATUS_KEPEMILIKAN_ID, $statusKepemilikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusKepemilikanId['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_STATUS_KEPEMILIKAN_ID, $statusKepemilikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_STATUS_KEPEMILIKAN_ID, $statusKepemilikanId, $comparison);
    }

    /**
     * Filter the query on the yayasan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByYayasanId('fooValue');   // WHERE yayasan_id = 'fooValue'
     * $query->filterByYayasanId('%fooValue%', Criteria::LIKE); // WHERE yayasan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $yayasanId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByYayasanId($yayasanId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($yayasanId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_YAYASAN_ID, $yayasanId, $comparison);
    }

    /**
     * Filter the query on the sk_izin_operasional column
     *
     * Example usage:
     * <code>
     * $query->filterBySkIzinOperasional('fooValue');   // WHERE sk_izin_operasional = 'fooValue'
     * $query->filterBySkIzinOperasional('%fooValue%', Criteria::LIKE); // WHERE sk_izin_operasional LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skIzinOperasional The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterBySkIzinOperasional($skIzinOperasional = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skIzinOperasional)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_SK_IZIN_OPERASIONAL, $skIzinOperasional, $comparison);
    }

    /**
     * Filter the query on the tanggal_sk_izin_operasional column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalSkIzinOperasional('2011-03-14'); // WHERE tanggal_sk_izin_operasional = '2011-03-14'
     * $query->filterByTanggalSkIzinOperasional('now'); // WHERE tanggal_sk_izin_operasional = '2011-03-14'
     * $query->filterByTanggalSkIzinOperasional(array('max' => 'yesterday')); // WHERE tanggal_sk_izin_operasional > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalSkIzinOperasional The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByTanggalSkIzinOperasional($tanggalSkIzinOperasional = null, $comparison = null)
    {
        if (is_array($tanggalSkIzinOperasional)) {
            $useMinMax = false;
            if (isset($tanggalSkIzinOperasional['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_TANGGAL_SK_IZIN_OPERASIONAL, $tanggalSkIzinOperasional['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSkIzinOperasional['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_TANGGAL_SK_IZIN_OPERASIONAL, $tanggalSkIzinOperasional['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_TANGGAL_SK_IZIN_OPERASIONAL, $tanggalSkIzinOperasional, $comparison);
    }

    /**
     * Filter the query on the no_rekening column
     *
     * Example usage:
     * <code>
     * $query->filterByNoRekening('fooValue');   // WHERE no_rekening = 'fooValue'
     * $query->filterByNoRekening('%fooValue%', Criteria::LIKE); // WHERE no_rekening LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noRekening The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByNoRekening($noRekening = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noRekening)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_NO_REKENING, $noRekening, $comparison);
    }

    /**
     * Filter the query on the nama_bank column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaBank('fooValue');   // WHERE nama_bank = 'fooValue'
     * $query->filterByNamaBank('%fooValue%', Criteria::LIKE); // WHERE nama_bank LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaBank The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByNamaBank($namaBank = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaBank)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_NAMA_BANK, $namaBank, $comparison);
    }

    /**
     * Filter the query on the cabang_kcp_unit column
     *
     * Example usage:
     * <code>
     * $query->filterByCabangKcpUnit('fooValue');   // WHERE cabang_kcp_unit = 'fooValue'
     * $query->filterByCabangKcpUnit('%fooValue%', Criteria::LIKE); // WHERE cabang_kcp_unit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cabangKcpUnit The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByCabangKcpUnit($cabangKcpUnit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cabangKcpUnit)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_CABANG_KCP_UNIT, $cabangKcpUnit, $comparison);
    }

    /**
     * Filter the query on the rekening_atas_nama column
     *
     * Example usage:
     * <code>
     * $query->filterByRekeningAtasNama('fooValue');   // WHERE rekening_atas_nama = 'fooValue'
     * $query->filterByRekeningAtasNama('%fooValue%', Criteria::LIKE); // WHERE rekening_atas_nama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rekeningAtasNama The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByRekeningAtasNama($rekeningAtasNama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rekeningAtasNama)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_REKENING_ATAS_NAMA, $rekeningAtasNama, $comparison);
    }

    /**
     * Filter the query on the mbs column
     *
     * Example usage:
     * <code>
     * $query->filterByMbs(1234); // WHERE mbs = 1234
     * $query->filterByMbs(array(12, 34)); // WHERE mbs IN (12, 34)
     * $query->filterByMbs(array('min' => 12)); // WHERE mbs > 12
     * </code>
     *
     * @param     mixed $mbs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByMbs($mbs = null, $comparison = null)
    {
        if (is_array($mbs)) {
            $useMinMax = false;
            if (isset($mbs['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_MBS, $mbs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mbs['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_MBS, $mbs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_MBS, $mbs, $comparison);
    }

    /**
     * Filter the query on the luas_tanah_milik column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasTanahMilik(1234); // WHERE luas_tanah_milik = 1234
     * $query->filterByLuasTanahMilik(array(12, 34)); // WHERE luas_tanah_milik IN (12, 34)
     * $query->filterByLuasTanahMilik(array('min' => 12)); // WHERE luas_tanah_milik > 12
     * </code>
     *
     * @param     mixed $luasTanahMilik The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByLuasTanahMilik($luasTanahMilik = null, $comparison = null)
    {
        if (is_array($luasTanahMilik)) {
            $useMinMax = false;
            if (isset($luasTanahMilik['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_LUAS_TANAH_MILIK, $luasTanahMilik['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasTanahMilik['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_LUAS_TANAH_MILIK, $luasTanahMilik['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_LUAS_TANAH_MILIK, $luasTanahMilik, $comparison);
    }

    /**
     * Filter the query on the luas_tanah_bukan_milik column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasTanahBukanMilik(1234); // WHERE luas_tanah_bukan_milik = 1234
     * $query->filterByLuasTanahBukanMilik(array(12, 34)); // WHERE luas_tanah_bukan_milik IN (12, 34)
     * $query->filterByLuasTanahBukanMilik(array('min' => 12)); // WHERE luas_tanah_bukan_milik > 12
     * </code>
     *
     * @param     mixed $luasTanahBukanMilik The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByLuasTanahBukanMilik($luasTanahBukanMilik = null, $comparison = null)
    {
        if (is_array($luasTanahBukanMilik)) {
            $useMinMax = false;
            if (isset($luasTanahBukanMilik['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_LUAS_TANAH_BUKAN_MILIK, $luasTanahBukanMilik['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasTanahBukanMilik['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_LUAS_TANAH_BUKAN_MILIK, $luasTanahBukanMilik['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_LUAS_TANAH_BUKAN_MILIK, $luasTanahBukanMilik, $comparison);
    }

    /**
     * Filter the query on the kode_registrasi column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeRegistrasi(1234); // WHERE kode_registrasi = 1234
     * $query->filterByKodeRegistrasi(array(12, 34)); // WHERE kode_registrasi IN (12, 34)
     * $query->filterByKodeRegistrasi(array('min' => 12)); // WHERE kode_registrasi > 12
     * </code>
     *
     * @param     mixed $kodeRegistrasi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByKodeRegistrasi($kodeRegistrasi = null, $comparison = null)
    {
        if (is_array($kodeRegistrasi)) {
            $useMinMax = false;
            if (isset($kodeRegistrasi['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_KODE_REGISTRASI, $kodeRegistrasi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeRegistrasi['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_KODE_REGISTRASI, $kodeRegistrasi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_KODE_REGISTRASI, $kodeRegistrasi, $comparison);
    }

    /**
     * Filter the query on the npwp column
     *
     * Example usage:
     * <code>
     * $query->filterByNpwp('fooValue');   // WHERE npwp = 'fooValue'
     * $query->filterByNpwp('%fooValue%', Criteria::LIKE); // WHERE npwp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $npwp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByNpwp($npwp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($npwp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_NPWP, $npwp, $comparison);
    }

    /**
     * Filter the query on the nm_wp column
     *
     * Example usage:
     * <code>
     * $query->filterByNmWp('fooValue');   // WHERE nm_wp = 'fooValue'
     * $query->filterByNmWp('%fooValue%', Criteria::LIKE); // WHERE nm_wp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmWp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByNmWp($nmWp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmWp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_NM_WP, $nmWp, $comparison);
    }

    /**
     * Filter the query on the flag column
     *
     * Example usage:
     * <code>
     * $query->filterByFlag('fooValue');   // WHERE flag = 'fooValue'
     * $query->filterByFlag('%fooValue%', Criteria::LIKE); // WHERE flag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $flag The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByFlag($flag = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($flag)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_FLAG, $flag, $comparison);
    }

    /**
     * Filter the query on the create_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateDate('2011-03-14'); // WHERE create_date = '2011-03-14'
     * $query->filterByCreateDate('now'); // WHERE create_date = '2011-03-14'
     * $query->filterByCreateDate(array('max' => 'yesterday')); // WHERE create_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $createDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_CREATE_DATE, $createDate, $comparison);
    }

    /**
     * Filter the query on the last_update column
     *
     * Example usage:
     * <code>
     * $query->filterByLastUpdate('2011-03-14'); // WHERE last_update = '2011-03-14'
     * $query->filterByLastUpdate('now'); // WHERE last_update = '2011-03-14'
     * $query->filterByLastUpdate(array('max' => 'yesterday')); // WHERE last_update > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastUpdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query on the soft_delete column
     *
     * Example usage:
     * <code>
     * $query->filterBySoftDelete(1234); // WHERE soft_delete = 1234
     * $query->filterBySoftDelete(array(12, 34)); // WHERE soft_delete IN (12, 34)
     * $query->filterBySoftDelete(array('min' => 12)); // WHERE soft_delete > 12
     * </code>
     *
     * @param     mixed $softDelete The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_SOFT_DELETE, $softDelete, $comparison);
    }

    /**
     * Filter the query on the last_sync column
     *
     * Example usage:
     * <code>
     * $query->filterByLastSync('2011-03-14'); // WHERE last_sync = '2011-03-14'
     * $query->filterByLastSync('now'); // WHERE last_sync = '2011-03-14'
     * $query->filterByLastSync(array('max' => 'yesterday')); // WHERE last_sync > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastSync The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(SekolahTableMap::COL_LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(SekolahTableMap::COL_LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query on the updater_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdaterId('fooValue');   // WHERE updater_id = 'fooValue'
     * $query->filterByUpdaterId('%fooValue%', Criteria::LIKE); // WHERE updater_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $updaterId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByUpdaterId($updaterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($updaterId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahTableMap::COL_UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related \Appdb\Foto object
     *
     * @param \Appdb\Foto|ObjectCollection $foto the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByFoto($foto, $comparison = null)
    {
        if ($foto instanceof \Appdb\Foto) {
            return $this
                ->addUsingAlias(SekolahTableMap::COL_SEKOLAH_ID, $foto->getSekolahId(), $comparison);
        } elseif ($foto instanceof ObjectCollection) {
            return $this
                ->useFotoQuery()
                ->filterByPrimaryKeys($foto->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByFoto() only accepts arguments of type \Appdb\Foto or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Foto relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function joinFoto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Foto');

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
            $this->addJoinObject($join, 'Foto');
        }

        return $this;
    }

    /**
     * Use the Foto relation Foto object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Appdb\FotoQuery A secondary query class using the current class as primary query
     */
    public function useFotoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFoto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Foto', '\Appdb\FotoQuery');
    }

    /**
     * Filter the query by a related \Appdb\Geotag object
     *
     * @param \Appdb\Geotag|ObjectCollection $geotag the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByGeotag($geotag, $comparison = null)
    {
        if ($geotag instanceof \Appdb\Geotag) {
            return $this
                ->addUsingAlias(SekolahTableMap::COL_SEKOLAH_ID, $geotag->getSekolahId(), $comparison);
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
     * @return $this|ChildSekolahQuery The current query, for fluid interface
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
     * Filter the query by a related \Appdb\Pengguna object
     *
     * @param \Appdb\Pengguna|ObjectCollection $pengguna the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSekolahQuery The current query, for fluid interface
     */
    public function filterByPengguna($pengguna, $comparison = null)
    {
        if ($pengguna instanceof \Appdb\Pengguna) {
            return $this
                ->addUsingAlias(SekolahTableMap::COL_SEKOLAH_ID, $pengguna->getSekolahId(), $comparison);
        } elseif ($pengguna instanceof ObjectCollection) {
            return $this
                ->usePenggunaQuery()
                ->filterByPrimaryKeys($pengguna->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function joinPengguna($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function usePenggunaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPengguna($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pengguna', '\Appdb\PenggunaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSekolah $sekolah Object to remove from the list of results
     *
     * @return $this|ChildSekolahQuery The current query, for fluid interface
     */
    public function prune($sekolah = null)
    {
        if ($sekolah) {
            $this->addUsingAlias(SekolahTableMap::COL_SEKOLAH_ID, $sekolah->getSekolahId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the sekolah table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SekolahTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SekolahTableMap::clearInstancePool();
            SekolahTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SekolahTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SekolahTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SekolahTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SekolahTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SekolahQuery
