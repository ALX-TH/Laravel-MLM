<?php

use Illuminate\Database\Seeder;
use App\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $time = \Carbon\Carbon::now();
            Page::truncate();
            Page::insert([
                [
                    'id'                =>  1,
                    'name'              =>  'Terms and Conditions',
                    'name_h1'           =>  'Terms and Conditions',
                    'meta_title'        =>  'Terms & Conditions',
                    'meta_description'  =>  'Terms and Conditions',
                    'meta_keywords'     =>  'terms, conditions',
                    'content'           =>  'page content',
                    'status'            =>  1,
                    'slug'              =>  'terms-and-conditions',
                    'created_at'        =>  $time,
                    'updated_at'        =>  $time
                ],[
                    'id'                =>  2,
                    'name'              =>  'Privacy Policy',
                    'name_h1'           =>  'Privacy Policy',
                    'meta_title'        =>  'Privacy Policy',
                    'meta_description'  =>  'Privacy Policy',
                    'meta_keywords'     =>  'privacy, policy',
                    'content'           =>  'page content',
                    'status'            =>  1,
                    'slug'              =>  'privacy-policy',
                    'created_at'        =>  $time,
                    'updated_at'        =>  $time
                ],[
                    'id'                =>  3,
                    'name'              =>  'Know Your Customer (KYC) Policy',
                    'name_h1'           =>  'Know Your Customer (KYC) Policy',
                    'meta_title'        =>  'Know Your Customer (KYC) Policy',
                    'meta_description'  =>  'Know Your Customer (KYC) Policy',
                    'meta_keywords'     =>  'customer, policy, kyc',
                    'content'           =>  'page content',
                    'status'            =>  1,
                    'slug'              =>  'know-your-customer-kyc-policy',
                    'created_at'        =>  $time,
                    'updated_at'        =>  $time
                ],[
                    'id'                =>  4,
                    'name'              =>  'Anti Money Laundering Policy',
                    'name_h1'           =>  'Anti Money Laundering Policy',
                    'meta_title'        =>  'Anti Money Laundering Policy',
                    'meta_description'  =>  'Anti Money Laundering Policy',
                    'meta_keywords'     =>  'kewords, anti, money, laundering',
                    'content'           =>  'page content',
                    'status'            =>  1,
                    'slug'              =>  'anti-money-laundering-policy',
                    'created_at'        =>  $time,
                    'updated_at'        =>  $time
                ],[
                    'id'                =>  5,
                    'name'              =>  'About us',
                    'name_h1'           =>  'About us',
                    'meta_title'        =>  'About us',
                    'meta_description'  =>  'About us',
                    'meta_keywords'     =>  'About us',
                    'content'           =>  'page content',
                    'status'            =>  1,
                    'slug'              =>  'about-us',
                    'created_at'        =>  $time,
                    'updated_at'        =>  $time
                ]
            ]);
        } catch (Exception $ex) {
            $this->command->error("SQL Error: " . $ex->getMessage() . "\n");
        }
    }
}
