<?php
declare(strict_types = 1);

class CountryCovidDataRow
{
    private string $Datums;

    public function getDatums()
    {
        return $this->Datums;
    }

    private string $Valsts;

    public function getValsts()
    {
        return $this->Valsts;
    }

    private string $CetrpadsmitDienuKumulativaIncidence;

    public function getCetrpadsmitDienuKumulativaIncidence()
    {
        return $this->CetrpadsmitDienuKumulativaIncidence;
    }

    private string $Izcelosana;

    public function getIzcelosana()
    {
        return $this->Izcelosana;
    }

    private string $Pasizolacija;

    public function getPasizolacija()
    {
        return $this->Pasizolacija;
    }

    private string $PersIrVakcParslSert_PasizolacijaLatvija;

    public function getPersIrVakcParslSert_PasizolacijaLatvija()
    {
        return $this->PersIrVakcParslSert_PasizolacijaLatvija;
    }

    private string $PersIrVakcParslSert_TestsPirmsIebrauksanasLV;

    public function getPersIrVakcParslSert_TestsPirmsIebrauksanasLV()
    {
        return $this->PersIrVakcParslSert_TestsPirmsIebrauksanasLV;
    }

    private string $PersIrVakcParslSert_TestsPecIebrauksanasLV;

    public function getPersIrVakcParslSert_TestsPecIebrauksanasLV()
    {
        return $this->PersIrVakcParslSert_TestsPecIebrauksanasLV;
    }

    private string $CitasPersonas_PasizolacijaLatvija;

    public function getCitasPersonas_PasizolacijaLatvija()
    {
        return $this->CitasPersonas_PasizolacijaLatvija;
    }

    private string $CitasPersonas_TestsPirmsIebrauksanasLV;

    public function getCitasPersonas_TestsPirmsIebrauksanasLV()
    {
        return $this->CitasPersonas_TestsPirmsIebrauksanasLV;
    }

    private string $CitasPersonas_TestsPecIebrauksanasLV;

    public function getCitasPersonas_TestsPecIebrauksanasLV()
    {
        return $this->CitasPersonas_TestsPecIebrauksanasLV;
    }

    public function __construct(string $datums, string $valsts, string $cetrpadsmitDienuKumulativaIncidence,
                                string $izcelosana, string $pasizolacija, string $persIrVakcParslSert_PasizolacijaLatvija,
                                string $persIrVakcParslSert_TestsPirmsIebrauksanasLV,
                                string $persIrVakcParslSert_TestsPecIebrauksanasLV, string $citasPersonas_PasizolacijaLatvija,
                                string $citasPersonas_TestsPirmsIebrauksanasLV, string $citasPersonas_TestsPecIebrauksanasLV)
    {
        $this->Datums = $datums;
        $this->Valsts = $valsts;
        $this->CetrpadsmitDienuKumulativaIncidence = $cetrpadsmitDienuKumulativaIncidence;
        $this->Izcelosana = $izcelosana;
        $this->Pasizolacija = $pasizolacija;
        $this->PersIrVakcParslSert_PasizolacijaLatvija = $persIrVakcParslSert_PasizolacijaLatvija;
        $this->PersIrVakcParslSert_TestsPirmsIebrauksanasLV = $persIrVakcParslSert_TestsPirmsIebrauksanasLV;
        $this->PersIrVakcParslSert_TestsPecIebrauksanasLV = $persIrVakcParslSert_TestsPecIebrauksanasLV;
        $this->CitasPersonas_PasizolacijaLatvija = $citasPersonas_PasizolacijaLatvija;
        $this->CitasPersonas_TestsPirmsIebrauksanasLV = $citasPersonas_TestsPirmsIebrauksanasLV;
        $this->CitasPersonas_TestsPecIebrauksanasLV = $citasPersonas_TestsPecIebrauksanasLV;
    }

    public static function getPropertyNames(): array
    {
        return array_keys(get_class_vars(__CLASS__));
    }
}
