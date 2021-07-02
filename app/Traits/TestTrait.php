<?php
namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Models\{TestKepribadian, Soal};

trait TestTrait
{

   /**
    * Untuk Test Baru (jika pengguna sebelumnya belum menyelesaikan sesitest, pakai id lama)
    * @return array
   */
   public function createSoal()
   {
      return [
         'id' => TestKepribadian::updateOrCreate([
         'user_id' => Auth::id(),
         'finished_at' => null
      ])->id,
      'pernyataan' => Soal::inRandomOrder()->with(['jawabA', 'jawabB'])->get()
      ];
   }
}