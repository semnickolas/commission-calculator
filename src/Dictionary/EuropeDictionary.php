<?php

namespace App\Dictionary;

class EuropeDictionary
{
    private const string AT = 'AT';
    private const string BE = 'BE';
    private const string BG = 'BG';
    private const string CY = 'CY';
    private const string CZ = 'CZ';
    private const string DE = 'DE';
    private const string DK = 'DK';
    private const string EE = 'EE';
    private const string ES = 'ES';
    private const string FI = 'FI';
    private const string FR = 'FR';
    private const string GR = 'GR';
    private const string HR = 'HR';
    private const string HU = 'HU';
    private const string IE = 'IE';
    private const string IT = 'IT';
    private const string LT = 'LT';
    private const string LU = 'LU';
    private const string LV = 'LV';
    private const string MT = 'MT';
    private const string NL = 'NL';
    private const string PO = 'PO';
    private const string PT = 'PT';
    private const string RO = 'RO';
    private const string SE = 'SE';
    private const string SI = 'SI';
    private const string SK = 'SK';

    private const array MAP = [
        self::AT => null,
        self::BE => null,
        self::BG => null,
        self::CY => null,
        self::CZ => null,
        self::DE => null,
        self::DK => null,
        self::EE => null,
        self::ES => null,
        self::FI => null,
        self::FR => null,
        self::GR => null,
        self::HR => null,
        self::HU => null,
        self::IE => null,
        self::IT => null,
        self::LT => null,
        self::LU => null,
        self::LV => null,
        self::MT => null,
        self::NL => null,
        self::PO => null,
        self::PT => null,
        self::RO => null,
        self::SE => null,
        self::SI => null,
        self::SK => null,
    ];

    public static function isCountryEurope(string $countryCode): bool
    {
        return array_key_exists($countryCode, self::MAP);
    }
}