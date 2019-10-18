<?php

// api/src/Entity/Sekolah.php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Annotation\GeneratedValue;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * Sekolah.
 *
 * @ORM\Entity(repositoryClass="App\Repository\SekolahRepository")
 * @ORM\Table(name="sekolah")
 * @ApiResource(
 *     normalizationContext={"groups"={"get", "sekolah"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"post"}}
 * )
 * @ApiFilter(OrderFilter::class, properties={"nama", "nama_nomenklatur", "nss", "npsn", "bentuk_pendidikan_id", "alamat_jalan", "rt", "rw", "nama_dusun", "desa_kelurahan", "kode_wilayah", "kode_pos", "lintang", "bujur", "nomor_telepon", "nomor_fax", "email", "website", "kebutuhan_khusus_id", "status_sekolah", "sk_pendirian_sekolah", "status_kepemilikan_id", "yayasan_id", "sk_izin_operasional", "no_rekening", "nama_bank", "cabang_kcp_unit", "rekening_atas_nama", "mbs", "luas_tanah_milik", "luas_tanah_bukan_milik", "kode_registrasi", "npwp", "nm_wp", "flag", "soft_delete", "updater_id"}, arguments={"orderParameterName"="order"})
 * @ApiFilter(SearchFilter::class, properties={"nama":"partial", "nama_nomenklatur":"partial", "nss":"partial", "npsn":"partial", "bentuk_pendidikan_id":"exact", "alamat_jalan":"partial", "rt":"exact", "rw":"exact", "nama_dusun":"partial", "desa_kelurahan":"partial", "kode_wilayah":"partial", "kode_pos":"partial", "lintang":"exact", "bujur":"exact", "nomor_telepon":"partial", "nomor_fax":"partial", "email":"partial", "website":"partial", "kebutuhan_khusus_id":"exact", "status_sekolah":"exact", "sk_pendirian_sekolah":"partial", "status_kepemilikan_id":"exact", "yayasan_id":"partial", "sk_izin_operasional":"partial", "no_rekening":"partial", "nama_bank":"partial", "cabang_kcp_unit":"partial", "rekening_atas_nama":"partial", "mbs":"exact", "luas_tanah_milik":"exact", "luas_tanah_bukan_milik":"exact", "kode_registrasi":"exact", "npwp":"partial", "nm_wp":"partial", "flag":"partial", "soft_delete":"exact", "updater_id":"partial"})
 */
class Sekolah
{

    /**
     * @var uuid
     *
     * @ApiProperty(identifier=true)
     * @ORM\Id
     * @ORM\Column(name="sekolah_id", type="guid")
     * @Assert\NotNull
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $sekolah_id;

    /**
     * @var string
     *
     * @ORM\Column(name="nama", type="string", length=100)
     * @Assert\NotNull
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $nama;

    /**
     * @var string
     *
     * @ORM\Column(name="nama_nomenklatur", type="string", length=100,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $nama_nomenklatur;

    /**
     * @var string
     *
     * @ORM\Column(name="nss", type="string", length=12,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $nss;

    /**
     * @var string
     *
     * @ORM\Column(name="npsn", type="string", length=8,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $npsn;

    /**
     * @var int
     *
     * @ORM\Column(name="bentuk_pendidikan_id", type="smallint")
     * @Assert\NotNull
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $bentuk_pendidikan_id;

    /**
     * @var string
     *
     * @ORM\Column(name="alamat_jalan", type="string", length=80)
     * @Assert\NotNull
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $alamat_jalan;

    /**
     * @var string
     *
     * @ORM\Column(name="rt", type="string",  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $rt;

    /**
     * @var string
     *
     * @ORM\Column(name="rw", type="string",  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $rw;

    /**
     * @var string
     *
     * @ORM\Column(name="nama_dusun", type="string", length=60,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $nama_dusun;

    /**
     * @var string
     *
     * @ORM\Column(name="desa_kelurahan", type="string", length=60)
     * @Assert\NotNull
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $desa_kelurahan;

    /**
     * @var string
     *
     * @ORM\Column(name="kode_wilayah", type="string", length=8)
     * @Assert\NotNull
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $kode_wilayah;

    /**
     * @var string
     *
     * @ORM\Column(name="kode_pos", type="string", length=5,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $kode_pos;

    /**
     * @var string
     *
     * @ORM\Column(name="lintang", type="string",  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $lintang;

    /**
     * @var string
     *
     * @ORM\Column(name="bujur", type="string",  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $bujur;

    /**
     * @var string
     *
     * @ORM\Column(name="nomor_telepon", type="string", length=20,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $nomor_telepon;

    /**
     * @var string
     *
     * @ORM\Column(name="nomor_fax", type="string", length=20,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $nomor_fax;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $email;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=100,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $website;

    /**
     * @var int
     *
     * @ORM\Column(name="kebutuhan_khusus_id", type="integer")
     * @Assert\NotNull
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $kebutuhan_khusus_id;

    /**
     * @var string
     *
     * @ORM\Column(name="status_sekolah", type="string")
     * @Assert\NotNull
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $status_sekolah;

    /**
     * @var string
     *
     * @ORM\Column(name="sk_pendirian_sekolah", type="string", length=80,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $sk_pendirian_sekolah;

    /**
     * @var string
     *
     * @ORM\Column(name="tanggal_sk_pendirian", type="datetime",  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $tanggal_sk_pendirian;

    /**
     * @var string
     *
     * @ORM\Column(name="status_kepemilikan_id", type="string")
     * @Assert\NotNull
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $status_kepemilikan_id;

    /**
     * @var string
     *
     * @ORM\Column(name="yayasan_id", type="string", length=36,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $yayasan_id;

    /**
     * @var string
     *
     * @ORM\Column(name="sk_izin_operasional", type="string", length=80,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $sk_izin_operasional;

    /**
     * @var string
     *
     * @ORM\Column(name="tanggal_sk_izin_operasional", type="datetime",  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $tanggal_sk_izin_operasional;

    /**
     * @var string
     *
     * @ORM\Column(name="no_rekening", type="string", length=20,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $no_rekening;

    /**
     * @var string
     *
     * @ORM\Column(name="nama_bank", type="string", length=20,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $nama_bank;

    /**
     * @var string
     *
     * @ORM\Column(name="cabang_kcp_unit", type="string", length=60,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $cabang_kcp_unit;

    /**
     * @var string
     *
     * @ORM\Column(name="rekening_atas_nama", type="string", length=50,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $rekening_atas_nama;

    /**
     * @var string
     *
     * @ORM\Column(name="mbs", type="string")
     * @Assert\NotNull
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $mbs;

    /**
     * @var string
     *
     * @ORM\Column(name="luas_tanah_milik", type="string")
     * @Assert\NotNull
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $luas_tanah_milik;

    /**
     * @var string
     *
     * @ORM\Column(name="luas_tanah_bukan_milik", type="string")
     * @Assert\NotNull
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $luas_tanah_bukan_milik;

    /**
     * @var string
     *
     * @ORM\Column(name="kode_registrasi", type="bigint",  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $kode_registrasi;

    /**
     * @var string
     *
     * @ORM\Column(name="npwp", type="string", length=15,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $npwp;

    /**
     * @var string
     *
     * @ORM\Column(name="nm_wp", type="string", length=100,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $nm_wp;

    /**
     * @var string
     *
     * @ORM\Column(name="flag", type="string", length=3,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $flag;

    /**
     * @var string
     *
     * @ORM\Column(name="create_date", type="datetime",  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $create_date;

    /**
     * @var string
     *
     * @ORM\Column(name="last_update", type="datetime",  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $last_update;

    /**
     * @var string
     *
     * @ORM\Column(name="soft_delete", type="string",  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $soft_delete;

    /**
     * @var string
     *
     * @ORM\Column(name="last_sync", type="datetime",  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $last_sync;

    /**
     * @var string
     *
     * @ORM\Column(name="updater_id", type="string", length=36,  nullable=true)
     * @Groups({"get", "post", "sekolah", "foto", "geotag", "pengguna"})
     */
    public $updater_id;

    /**
     * @var Foto[] Available fotos for this sekolah.
     *
     * @ORM\OneToMany(targetEntity="Foto", mappedBy="sekolah")
     * @Groups({"sekolah"})
     */
    public $fotos;

    /**
     * @var Geotag[] Available geotags for this sekolah.
     *
     * @ORM\OneToMany(targetEntity="Geotag", mappedBy="sekolah")
     * @Groups({"sekolah"})
     */
    public $geotags;

    /**
     * @var Pengguna[] Available penggunas for this sekolah.
     *
     * @ORM\OneToMany(targetEntity="Pengguna", mappedBy="sekolah")
     * @Groups({"sekolah"})
     */
    public $penggunas;

    public function __construct() {
        $this->fotos = new ArrayCollection();
        $this->geotags = new ArrayCollection();
        $this->penggunas = new ArrayCollection();
    }



    public function getSekolahId()
    {
        return $this->sekolah_id;
    }

    public function setSekolahId($sekolah_id)
    {
        $this->sekolah_id = $sekolah_id;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getNamaNomenklatur()
    {
        return $this->nama_nomenklatur;
    }

    public function setNamaNomenklatur($nama_nomenklatur)
    {
        $this->nama_nomenklatur = $nama_nomenklatur;
    }

    public function getNss()
    {
        return $this->nss;
    }

    public function setNss($nss)
    {
        $this->nss = $nss;
    }

    public function getNpsn()
    {
        return $this->npsn;
    }

    public function setNpsn($npsn)
    {
        $this->npsn = $npsn;
    }

    public function getBentukPendidikanId()
    {
        return $this->bentuk_pendidikan_id;
    }

    public function setBentukPendidikanId($bentuk_pendidikan_id)
    {
        $this->bentuk_pendidikan_id = $bentuk_pendidikan_id;
    }

    public function getAlamatJalan()
    {
        return $this->alamat_jalan;
    }

    public function setAlamatJalan($alamat_jalan)
    {
        $this->alamat_jalan = $alamat_jalan;
    }

    public function getRt()
    {
        return $this->rt;
    }

    public function setRt($rt)
    {
        $this->rt = $rt;
    }

    public function getRw()
    {
        return $this->rw;
    }

    public function setRw($rw)
    {
        $this->rw = $rw;
    }

    public function getNamaDusun()
    {
        return $this->nama_dusun;
    }

    public function setNamaDusun($nama_dusun)
    {
        $this->nama_dusun = $nama_dusun;
    }

    public function getDesaKelurahan()
    {
        return $this->desa_kelurahan;
    }

    public function setDesaKelurahan($desa_kelurahan)
    {
        $this->desa_kelurahan = $desa_kelurahan;
    }

    public function getKodeWilayah()
    {
        return $this->kode_wilayah;
    }

    public function setKodeWilayah($kode_wilayah)
    {
        $this->kode_wilayah = $kode_wilayah;
    }

    public function getKodePos()
    {
        return $this->kode_pos;
    }

    public function setKodePos($kode_pos)
    {
        $this->kode_pos = $kode_pos;
    }

    public function getLintang()
    {
        return $this->lintang;
    }

    public function setLintang($lintang)
    {
        $this->lintang = $lintang;
    }

    public function getBujur()
    {
        return $this->bujur;
    }

    public function setBujur($bujur)
    {
        $this->bujur = $bujur;
    }

    public function getNomorTelepon()
    {
        return $this->nomor_telepon;
    }

    public function setNomorTelepon($nomor_telepon)
    {
        $this->nomor_telepon = $nomor_telepon;
    }

    public function getNomorFax()
    {
        return $this->nomor_fax;
    }

    public function setNomorFax($nomor_fax)
    {
        $this->nomor_fax = $nomor_fax;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function setWebsite($website)
    {
        $this->website = $website;
    }

    public function getKebutuhanKhususId()
    {
        return $this->kebutuhan_khusus_id;
    }

    public function setKebutuhanKhususId($kebutuhan_khusus_id)
    {
        $this->kebutuhan_khusus_id = $kebutuhan_khusus_id;
    }

    public function getStatusSekolah()
    {
        return $this->status_sekolah;
    }

    public function setStatusSekolah($status_sekolah)
    {
        $this->status_sekolah = $status_sekolah;
    }

    public function getSkPendirianSekolah()
    {
        return $this->sk_pendirian_sekolah;
    }

    public function setSkPendirianSekolah($sk_pendirian_sekolah)
    {
        $this->sk_pendirian_sekolah = $sk_pendirian_sekolah;
    }

    public function getTanggalSkPendirian()
    {
        return $this->tanggal_sk_pendirian;
    }

    public function setTanggalSkPendirian($tanggal_sk_pendirian)
    {
        $this->tanggal_sk_pendirian = $tanggal_sk_pendirian;
    }

    public function getStatusKepemilikanId()
    {
        return $this->status_kepemilikan_id;
    }

    public function setStatusKepemilikanId($status_kepemilikan_id)
    {
        $this->status_kepemilikan_id = $status_kepemilikan_id;
    }

    public function getYayasanId()
    {
        return $this->yayasan_id;
    }

    public function setYayasanId($yayasan_id)
    {
        $this->yayasan_id = $yayasan_id;
    }

    public function getSkIzinOperasional()
    {
        return $this->sk_izin_operasional;
    }

    public function setSkIzinOperasional($sk_izin_operasional)
    {
        $this->sk_izin_operasional = $sk_izin_operasional;
    }

    public function getTanggalSkIzinOperasional()
    {
        return $this->tanggal_sk_izin_operasional;
    }

    public function setTanggalSkIzinOperasional($tanggal_sk_izin_operasional)
    {
        $this->tanggal_sk_izin_operasional = $tanggal_sk_izin_operasional;
    }

    public function getNoRekening()
    {
        return $this->no_rekening;
    }

    public function setNoRekening($no_rekening)
    {
        $this->no_rekening = $no_rekening;
    }

    public function getNamaBank()
    {
        return $this->nama_bank;
    }

    public function setNamaBank($nama_bank)
    {
        $this->nama_bank = $nama_bank;
    }

    public function getCabangKcpUnit()
    {
        return $this->cabang_kcp_unit;
    }

    public function setCabangKcpUnit($cabang_kcp_unit)
    {
        $this->cabang_kcp_unit = $cabang_kcp_unit;
    }

    public function getRekeningAtasNama()
    {
        return $this->rekening_atas_nama;
    }

    public function setRekeningAtasNama($rekening_atas_nama)
    {
        $this->rekening_atas_nama = $rekening_atas_nama;
    }

    public function getMbs()
    {
        return $this->mbs;
    }

    public function setMbs($mbs)
    {
        $this->mbs = $mbs;
    }

    public function getLuasTanahMilik()
    {
        return $this->luas_tanah_milik;
    }

    public function setLuasTanahMilik($luas_tanah_milik)
    {
        $this->luas_tanah_milik = $luas_tanah_milik;
    }

    public function getLuasTanahBukanMilik()
    {
        return $this->luas_tanah_bukan_milik;
    }

    public function setLuasTanahBukanMilik($luas_tanah_bukan_milik)
    {
        $this->luas_tanah_bukan_milik = $luas_tanah_bukan_milik;
    }

    public function getKodeRegistrasi()
    {
        return $this->kode_registrasi;
    }

    public function setKodeRegistrasi($kode_registrasi)
    {
        $this->kode_registrasi = $kode_registrasi;
    }

    public function getNpwp()
    {
        return $this->npwp;
    }

    public function setNpwp($npwp)
    {
        $this->npwp = $npwp;
    }

    public function getNmWp()
    {
        return $this->nm_wp;
    }

    public function setNmWp($nm_wp)
    {
        $this->nm_wp = $nm_wp;
    }

    public function getFlag()
    {
        return $this->flag;
    }

    public function setFlag($flag)
    {
        $this->flag = $flag;
    }

    public function getCreateDate()
    {
        return $this->create_date;
    }

    public function setCreateDate($create_date)
    {
        $this->create_date = $create_date;
    }

    public function getLastUpdate()
    {
        return $this->last_update;
    }

    public function setLastUpdate($last_update)
    {
        $this->last_update = $last_update;
    }

    public function getSoftDelete()
    {
        return $this->soft_delete;
    }

    public function setSoftDelete($soft_delete)
    {
        $this->soft_delete = $soft_delete;
    }

    public function getLastSync()
    {
        return $this->last_sync;
    }

    public function setLastSync($last_sync)
    {
        $this->last_sync = $last_sync;
    }

    public function getUpdaterId()
    {
        return $this->updater_id;
    }

    public function setUpdaterId($updater_id)
    {
        $this->updater_id = $updater_id;
    }


    public function getFotos(): Collection
    {
        return $this->fotos;
    }

    public function addFoto(Foto $foto)
    {
        $this->fotos->add($foto);
    }

    public function removeFoto(Foto $foto)
    {
        $this->fotos->removeElement($foto);
    }


    public function getGeotags(): Collection
    {
        return $this->geotags;
    }

    public function addGeotag(Geotag $geotag)
    {
        $this->geotags->add($geotag);
    }

    public function removeGeotag(Geotag $geotag)
    {
        $this->geotags->removeElement($geotag);
    }


    public function getPenggunas(): Collection
    {
        return $this->penggunas;
    }

    public function addPengguna(Pengguna $pengguna)
    {
        $this->penggunas->add($pengguna);
    }

    public function removePengguna(Pengguna $pengguna)
    {
        $this->penggunas->removeElement($pengguna);
    }

}