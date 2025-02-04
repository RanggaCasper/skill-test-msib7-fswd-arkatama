<?php

namespace Database\Seeders;

use App\Models\Payment\PaymentChannel;
use App\Models\Payment\PaymentGateway;
use Illuminate\Database\Seeder;

class PaymentChannelSeeder extends Seeder
{
    public function run()
    {
        $gateway = PaymentGateway::where('name', '=', 'Midtrans')->first();
        $paymentChannels = [
            [
                'payment_gateway_id' => $gateway->id,
                'payment_type' => 'bank_transfer',
                'name' => 'BCA Virtual Account',
                'kode' => 'bca_va',
                'fee_customer_flat' => 4000,
                'fee_customer_percent' => null,
                'minimum_fee' => 0,
                'maximum_fee' => 0,
                'is_active' => '1',
            ],
            [
                'payment_gateway_id' => $gateway->id,
                'payment_type' => 'bank_transfer',
                'name' => 'BRI Virtual Account',
                'kode' => 'bri_va',
                'fee_customer_flat' => 4000,
                'fee_customer_percent' => null,
                'minimum_fee' => 0,
                'maximum_fee' => 0,
                'is_active' => '1',
            ],
            [
                'payment_gateway_id' => $gateway->id,
                'payment_type' => 'bank_transfer',
                'name' => 'BNI Virtual Account',
                'kode' => 'bni_va',
                'fee_customer_flat' => 4000,
                'fee_customer_percent' => null,
                'minimum_fee' => 0,
                'maximum_fee' => 0,
                'is_active' => '1',
            ],
            [
                'payment_gateway_id' => $gateway->id,
                'payment_type' => 'bank_transfer',
                'name' => 'Mandiri Bill Payment',
                'kode' => 'echannel',
                'fee_customer_flat' => 4000,
                'fee_customer_percent' => null,
                'minimum_fee' => 0,
                'maximum_fee' => 0,
                'is_active' => '1',
            ],
            [
                'payment_gateway_id' => $gateway->id,
                'payment_type' => 'bank_transfer',
                'name' => 'Permata Virtual Account',
                'kode' => 'permata_va',
                'fee_customer_flat' => 4000,
                'fee_customer_percent' => null,
                'minimum_fee' => 0,
                'maximum_fee' => 0,
                'is_active' => '1',
            ],
            //            [
            //                  'payment_gateway_id' => $gateway->id,
            //                'payment_type' => 'bank_transfer',
            //                'name' => 'ATM Bersama',
            //                'kode' => null,
            //                'fee_customer_flat' => 4000,
            //                'fee_customer_percent' => null,
            //                'minimum_fee' => 0,
            //                'maximum_fee' => 0,
            //                'is_active' => '1',
            //            ],
            //            [
            //                  'payment_gateway_id' => $gateway->id,
            //                'payment_type' => 'bank_transfer',
            //                'name' => 'Alto',
            //                'kode' => null,
            //                'fee_customer_flat' => 4000,
            //                'fee_customer_percent' => null,
            //                'minimum_fee' => 0,
            //                'maximum_fee' => 0,
            //                'is_active' => '1',
            //            ],
            //            [
            //                  'payment_gateway_id' => $gateway->id,
            //                'payment_type' => 'bank_transfer',
            //                'name' => 'Prima',
            //                'kode' => null,
            //                'fee_customer_flat' => 4000,
            //                'fee_customer_percent' => null,
            //                'minimum_fee' => 0,
            //                'maximum_fee' => 0,
            //                'is_active' => '1',
            //            ],
            [
                'payment_gateway_id' => $gateway->id,
                'payment_type' => 'bank_transfer',
                'name' => 'CIMB Virtual Account',
                'kode' => 'cimb_va',
                'fee_customer_flat' => 4000,
                'fee_customer_percent' => null,
                'minimum_fee' => 0,
                'maximum_fee' => 0,
                'is_active' => '1',
            ],
            // [
            //     'payment_gateway_id' => $gateway->id,
            //     'payment_type' => 'e_wallet',
            //     'name' => 'GoPay',
            //     'kode' => 'gopay',
            //     'fee_customer_flat' => null,
            //     'fee_customer_percent' => 2,
            //     'minimum_fee' => 0,
            //     'maximum_fee' => 0,
            //     'is_active' => '1',
            // ],
            [
                'payment_gateway_id' => $gateway->id,
                'payment_type' => 'e_wallet',
                'name' => 'QRIS',
                'kode' => 'other_qris',
                'fee_customer_flat' => null,
                'fee_customer_percent' => 0.7,
                'minimum_fee' => 0,
                'maximum_fee' => 0,
                'is_active' => '1',
            ],
            [
                'payment_gateway_id' => $gateway->id,
                'payment_type' => 'e_wallet',
                'name' => 'ShopeePay',
                'kode' => 'shopeepay',
                'fee_customer_flat' => null,
                'fee_customer_percent' => 2,
                'minimum_fee' => 0,
                'maximum_fee' => 0,
                'is_active' => '1',
            ],
            [
                'payment_gateway_id' => $gateway->id,
                'payment_type' => 'otc',
                'name' => 'Indomaret',
                'kode' => 'indomaret',
                'fee_customer_flat' => 5000,
                'fee_customer_percent' => null,
                'minimum_fee' => 0,
                'maximum_fee' => 0,
                'is_active' => '1',
            ],
            [
                'payment_gateway_id' => $gateway->id,
                'payment_type' => 'otc',
                'name' => 'Alfamart',
                'kode' => 'alfamart',
                'fee_customer_flat' => 5000,
                'fee_customer_percent' => null,
                'minimum_fee' => 0,
                'maximum_fee' => 0,
                'is_active' => '1',
            ],
            //            [
            //                'payment_gateway_id' => $gateway->id,
            //                'payment_type' => 'otc',
            //                'name' => 'Alfamidi',
            //                'kode' => null,
            //                'fee_customer_flat' => 5000,
            //                'fee_customer_percent' => null,
            //                'minimum_fee' => 0,
            //                'maximum_fee' => 0,
            //                'is_active' => '1',
            //            ],
            //            [
            //                'payment_gateway_id' => $gateway->id,
            //                'payment_type' => 'otc',
            //                'name' => 'Dan+Dan',
            //                'kode' => null,
            //                'fee_customer_flat' => 5000,
            //                'fee_customer_percent' => null,
            //                'minimum_fee' => 0,
            //                'maximum_fee' => 0,
            //                'is_active' => '1',
            //            ],
        ];

        foreach ($paymentChannels as $paymentChannel) {
            PaymentChannel::create($paymentChannel);
        }
    }
}
