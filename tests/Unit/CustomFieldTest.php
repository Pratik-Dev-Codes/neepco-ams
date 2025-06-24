<?php
namespace Tests\Unit;

use App\Models\CustomField;
use Tests\TestCase;

/*
 * Test strings for db column names  gathered from
 * http://www.omniglot.com/language/phrases/hovercraft.htm
 */
class CustomFieldTest extends TestCase
{
    public function testFormat()
    {
        $customfield = CustomField::factory()->make(['format' => 'IP']);
        $this->assertEquals($customfield->getAttributes()['format'], CustomField::PREDEFINED_FORMATS['IP']); //this seems undocumented...
        $this->assertEquals($customfield->format, 'IP');
    }

    public function testDbNameAscii()
    {
        $customfield = new CustomField();
        $customfield->name = 'My hovercraft is full of eels';
        $customfield->id = 1337;
        $this->assertEquals($customfield->convertUnicodeDbSlug(), '_neepco_amsmy_hovercraft_is_full_of_eels_1337');
    }

    // Western Europe
    public function testDbNameLatin()
    {
        $customfield = new CustomField();
        $customfield->name = 'My hovercraft is full of eels';
        $customfield->id = 1337;
        $this->assertEquals($customfield->convertUnicodeDbSlug(), '_neepco_amsmy_hovercraft_is_full_of_eels_1337');
    }

    // Asian
    public function testDbNameChinese()
    {
        $customfield = new CustomField();
        $customfield->name = '我的氣墊船裝滿了鱔魚';
        $customfield->id = 1337;
        if (function_exists('transliterator_transliterate')) {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), '_neepco_amswo_de_qi_dian_chuan_zhuang_man_le_shan_yu_1337');
        } else {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), '_neepco_amsaecsae0ase1eaeaeoees_1337');
        }
    }

    public function testDbNameJapanese()
    {
        $customfield = new CustomField();
        $customfield->name = '私のホバークラフトは鰻でいっぱいです';
        $customfield->id = 1337;
        if (function_exists('transliterator_transliterate')) {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), '_neepco_amssinohohakurafutoha_manteihhaitesu_1337');
        } else {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), '_neepco_amscaafafafaafcafafae0aaaaaaa_1337');
        }
    }

    public function testDbNameKorean()
    {
        $customfield = new CustomField();
        $customfield->name = '내 호버크라프트는 장어로 가득 차 있어요';
        $customfield->id = 1337;
        if (function_exists('transliterator_transliterate')) {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), '_neepco_amsnae_hobeokeulapeuteuneun_jang_eolo_gadeug_1337');
        } else {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), '_neepco_amse_ie2ieiises_izieoe_e0e_i0_iziis_1337');
        }
    }

    // Nordic languages
    public function testDbNameNonLatinEuro()
    {
        $customfield = new CustomField();
        $customfield->name = 'Mój poduszkowiec jest pełen węgorzy';
        $customfield->id = 1337;
        if (function_exists('transliterator_transliterate')) {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), '_neepco_amsmoj_poduszkowiec_jest_pelen_wegorzy_1337');
        } else {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), '_neepco_amsma3j_poduszkowiec_jest_peaen_waegorzy_1337');
        }
    }

    //
    public function testDbNameTurkish()
    {
        $customfield = new CustomField();
        $customfield->name = 'Hoverkraftım yılan balığı dolu';
        $customfield->id = 1337;
        if (function_exists('transliterator_transliterate')) {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), '_neepco_amshoverkraftim_yilan_baligi_dolu_1337');
        } else {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), '_neepco_amshoverkraftaem_yaelan_balaeaeyae_dolu_1337');
        }
    }

    public function testDbNameArabic()
    {
        $customfield = new CustomField();
        $customfield->name = 'حَوّامتي مُمْتِلئة بِأَنْقَلَيْسون';
        $customfield->id = 1337;
        if (function_exists('transliterator_transliterate')) {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), '_neepco_amshwamty_mmtlyt_banqlyswn_1337');
        } else {
            $this->assertEquals($customfield->convertUnicodeDbSlug(), '_neepco_amsouzuuouoaus_uuuuoauuooc_ououzuuuuzuuzusuo_1337');
        }
    }
}
