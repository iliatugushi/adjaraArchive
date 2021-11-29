<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Archive;
use App\Models\Creator;
use App\Models\Fond;
use App\Models\Anaweri;
use App\Models\Sakme;
use App\Models\File;

class ArchiveSeeder extends Seeder
{

    public function run()
    {
        for ($i = 1; $i < 3; $i++) {
            $archive = new Archive;
            $archive->identifier = 'AR' . $i;
            $archive->authorised_form_of_name = 'არქივი ' . $i;
            $archive->parallel_form_of_name = 'Archive Paralel ' . $i;

            $archive->save();

            for ($j = 1; $j < 3; $j++) {
                $creator = new Creator;
                $creator->type_id = 1;
                $creator->identifier = $archive->identifier . '_' . 'CR ' . $j;
                $creator->authorised_form_of_name = $archive->authorised_form_of_name . '_შემქმნელი_' . $j;
                $creator->parallel_form_of_name = 'Creator Parallel ' . $j;
                $creator->save();

                for ($k = 1; $k < 3; $k++) {
                    $fond = new Fond;
                    $fond->creator_id = $creator->id;
                    $fond->archive_id = $archive->id;
                    $fond->reference_code =  $creator->identifier . '_FND' . $k;
                    $fond->title = 'ფონდი_ ' . $k;
                    $fond->level_of_description = 'FOND';
                    $fond->save();

                    for ($a = 1; $a < 3; $a++) {
                        $anaweri = new Anaweri;
                        $anaweri->fond_id = $fond->id;
                        $anaweri->reference_code =  $fond->reference_code . '_AN' . $a;
                        $anaweri->title = 'ანაწერი_ ' . $a;
                        $anaweri->level_of_description = 'ANAWERI';
                        $anaweri->save();

                        for ($s = 1; $s < 3; $s++) {
                            $sakme = new Sakme;
                            $sakme->anaweri_id = $anaweri->id;
                            $sakme->reference_code =  $anaweri->reference_code . '_SK' . $s;
                            $sakme->title = 'საქმე_' . $s;
                            $sakme->level_of_description = 'Sakme';
                            $sakme->save();

                            for ($f = 1; $f < 3; $f++) {
                                $file = new File;
                                $file->sakme_id = $sakme->id;
                                $file->reference_code =  $sakme->reference_code . '_FL' . $f;
                                $file->title = 'ფაილი_' . $f;
                                $file->level_of_description = 'FILE';
                                $file->save();
                            }
                        }
                    }
                }
            }
        }
    }
}
