<?php

namespace App\Models;

use App\Events\DukuhUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Dukuh extends Model
{
    use HasFactory;

    protected $table = 'dukuh';

    protected $fillable = [
        'KECAMATAN',
        'DESA',
        'DNOP',
        'PL',
        'ERDKK',
        'NIK_1',
        'ALMT_1',
        'PMLK',
        'NIK_2',
        'ALMT_2',
        'PGRP',
        'NIK_3',
        'ALMT_3',
        'PNYW',
        'NIK_4',
        'ALMT_4',
        'KL_TN',
        'BLOK',
        'JBTN',
        'JML_PTK',
        'SB_PPK',
        'ALSTN',
        'SMBR_AIR',
        'N_DI',
        'KOM_MT1',
        'KOM_MT2',
        'KOM_MT3',
        'WT_MT1',
        'WT_MT2',
        'WT_MT3',
        'PR_MT1',
        'PR_MT2',
        'PR_MT3',
        'LUAS',
        'geometry'
    ];

    protected $casts = [
        'geometry' => 'array',
        'PR_MT1' => 'float',
        'PR_MT2' => 'float',
        'PR_MT3' => 'float',
        'LUAS' => 'float',
        'JML_PTK' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($dukuh) {
            $changes = $dukuh->getChanges();

            foreach ($changes as $field => $newValue) {
                if (in_array($field, $dukuh->fillable)) {
                    DukuhLog::create([
                        'dukuh_id' => $dukuh->id,
                        'user_id' => Auth::id(),
                        'changed_field' => $field,
                        'old_value' => $dukuh->getOriginal($field),
                        'new_value' => $newValue,
                    ]);
                }
            }

            event(new DukuhUpdated($dukuh, 'Dukuh'));
        });
    }
}