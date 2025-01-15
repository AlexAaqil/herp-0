<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payments;
use App\Models\Classes;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_year = Carbon::now()->year;
        $terms = [1, 2, 3];

        $class_ids = Classes::pluck('id')->toArray();

        $paymentData = [
            'title' => 'Tuition Fees',
            'payment_method' => 'cheque',
            'year' => $current_year,
        ];

        foreach ($terms as $term) {
            // Create 2 payments per term (total 6 payments)
            foreach ($class_ids as $classId) {
                $random_amount = rand(25000, 50000);

                Payments::create([
                    'title' => $paymentData['title'] . " Term $term",
                    'reference_number' => strtoupper(Str::random(6)) . '-' . $current_year . '-' . str_pad($term, 2, '0', STR_PAD_LEFT) . str_pad($classId, 2, '0', STR_PAD_LEFT),
                    'payment_method' => $paymentData['payment_method'],
                    'amount' => $random_amount,
                    'class_id' => $classId,
                    'year' => $current_year,
                    'term' => $term,
                ]);
            }
        }

        echo "6 payment records created for the current year and 3 terms.";
    }
}
