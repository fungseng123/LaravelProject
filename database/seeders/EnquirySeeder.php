<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enquiry;

class EnquirySeeder extends Seeder
{
    public function run()
    {
        $enquiries = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'question' => 'Do you offer international shipping for your phones?',
                'admin_reply' => 'Yes, we offer worldwide shipping. Shipping costs vary by location.',
                'viewed_by_admin' => true,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(4),
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice@example.com',
                'question' => 'What is the warranty period for iPhone 15 Pro?',
                'admin_reply' => null,
                'viewed_by_admin' => false,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'name' => 'Mike Wilson',
                'email' => 'mike@example.com',
                'question' => 'Do you accept trade-ins for old phones?',
                'admin_reply' => null,
                'viewed_by_admin' => false,
                'created_at' => now()->subDay(),
                'updated_at' => now()->subDay(),
            ],
        ];

        foreach ($enquiries as $enquiry) {
            Enquiry::create($enquiry);
        }
    }
}