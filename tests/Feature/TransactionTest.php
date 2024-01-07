<?php

namespace Tests\Feature;

use Database\Seeders\TestingDatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;


    public function setUp(): void
    {
        parent::setUp();

        $this->seed(TestingDatabaseSeeder::class);
    }

    public function testAllData(): void
    {
        $response = $this->json('get', 'api/v1/users');
        $response->assertExactJson($this->allData());
    }

    public function testXData(): void
    {
        $response = $this->json('get', 'api/v1/users', ['provider' => 'DataProviderX']);
        $response->assertExactJson($this->allXData());
    }

    public function testXDataWithUsdCurrency(): void
    {
        $response = $this->json('get', 'api/v1/users', ['provider' => 'DataProviderX', 'currency' => 'USD']);
        $response->assertExactJson($this->allXDataCurrencyUSD());
    }

    public function testXDataWithUsdCurrencyRefundStatus(): void
    {
        $response = $this->json('get', 'api/v1/users', ['provider' => 'DataProviderX', 'currency' => 'USD', 'status' => 'refunded']);
        $response->assertExactJson($this->allXDataCurrencyUSDRefundedStatus());
    }

    public function testYData(): void
    {
        $response = $this->json('get', 'api/v1/users', ['provider' => 'DataProviderY']);
        $response->assertExactJson($this->allYData());
    }

    function allData(): array
    {
        return [
            [
                "id" => 1,
                "parentAmount" => "10.000",
                "Currency" => "USD",
                "parentEmail" => "hirthe.waino@example.net",
                "statusCode" => 1,
                "registerationDate" => "1996-10-04 00:00:00",
                "parentIdentification" => "3INyspa0wFo5ym3WM8Mkynts30CNigPcAFeNzbxYukXIoY0tBr",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 2,
                "parentAmount" => "100.000",
                "Currency" => "AED",
                "parentEmail" => "grayson65@example.net",
                "statusCode" => 1,
                "registerationDate" => "2005-05-15 00:00:00",
                "parentIdentification" => "wdmbuzhwYRsGhl37cjVpaziBQ1BJja0czqJN1IUoMo9iBYEt1t",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 3,
                "parentAmount" => "50.000",
                "Currency" => "EGP",
                "parentEmail" => "marcel.rolfson@example.org",
                "statusCode" => 1,
                "registerationDate" => "1978-03-16 00:00:00",
                "parentIdentification" => "nnjdGRTHzt7GCusrKPN4kXOAgLvLVGCxZHgypqXxbZLnnBQk1W",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 4,
                "parentAmount" => "50.000",
                "Currency" => "JOD",
                "parentEmail" => "feil.marion@example.net",
                "statusCode" => 1,
                "registerationDate" => "1987-05-12 00:00:00",
                "parentIdentification" => "DCKkGr3983il5fk1hT7B0f9VBnnngSZonvfSficYz1qrvXEztQ",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 5,
                "parentAmount" => "50.000",
                "Currency" => "SAR",
                "parentEmail" => "betsy58@example.net",
                "statusCode" => 1,
                "registerationDate" => "2023-10-20 00:00:00",
                "parentIdentification" => "oGkLucKGnbRFVtGFCM66ZU4QdHapq5XvkfCplww8zkWTrlj2az",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 6,
                "parentAmount" => "10.000",
                "Currency" => "USD",
                "parentEmail" => "nvandervort@example.com",
                "statusCode" => 2,
                "registerationDate" => "2000-09-19 00:00:00",
                "parentIdentification" => "Cf41zyZ4z2SJHz20WBjPF9aZSALIJjKcSqlzhiuSIpdiaXbAYD",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 7,
                "parentAmount" => "100.000",
                "Currency" => "AED",
                "parentEmail" => "isabel.skiles@example.org",
                "statusCode" => 2,
                "registerationDate" => "1993-02-01 00:00:00",
                "parentIdentification" => "BR4dsn58UR7qeCatQsS3TW9BxQfyybp3laDm4obkDM6Tyb2moa",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 8,
                "parentAmount" => "50.000",
                "Currency" => "EGP",
                "parentEmail" => "leannon.karley@example.net",
                "statusCode" => 2,
                "registerationDate" => "1991-06-02 00:00:00",
                "parentIdentification" => "Fht7vd2RR8fuShfj8WxcY7Ci9ZYwVqTp6lheBCJTQknS34w4H5",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 9,
                "parentAmount" => "50.000",
                "Currency" => "JOD",
                "parentEmail" => "general05@example.com",
                "statusCode" => 2,
                "registerationDate" => "1989-02-11 00:00:00",
                "parentIdentification" => "3CFdLhXcslWaX6gwdoKPKnzHwT9DB5qWPOY6bDfamM4heuopb1",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 10,
                "parentAmount" => "50.000",
                "Currency" => "SAR",
                "parentEmail" => "jacobi.raymond@example.net",
                "statusCode" => 2,
                "registerationDate" => "1994-12-24 00:00:00",
                "parentIdentification" => "UtsLnkU4850NeyP56KxAgKtqyqZNVuh8KDUWG90LRgr3IZYYy8",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 11,
                "parentAmount" => "10.000",
                "Currency" => "USD",
                "parentEmail" => "zboncak.drew@example.org",
                "statusCode" => 3,
                "registerationDate" => "2023-08-29 00:00:00",
                "parentIdentification" => "H7o164YThf6GSgDmrGDzIT6QJKNoY4hcTJvuNAKgLoZxW4eDHQ",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 12,
                "parentAmount" => "100.000",
                "Currency" => "AED",
                "parentEmail" => "pjones@example.net",
                "statusCode" => 3,
                "registerationDate" => "2015-11-03 00:00:00",
                "parentIdentification" => "Voi9lJdQqMev492RSUYhcqdYZDgl38fMyQyBMCXPloGzo718Lf",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 13,
                "parentAmount" => "50.000",
                "Currency" => "EGP",
                "parentEmail" => "callie03@example.com",
                "statusCode" => 3,
                "registerationDate" => "1988-11-04 00:00:00",
                "parentIdentification" => "jG2J1qoQfaMhfc7puhEo6buC7rWGrJbtZEadRC2emPDcVcBx5P",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 14,
                "parentAmount" => "50.000",
                "Currency" => "JOD",
                "parentEmail" => "rrohan@example.net",
                "statusCode" => 3,
                "registerationDate" => "1991-08-23 00:00:00",
                "parentIdentification" => "gaAGRKnHHRQwwWeUYZr5GPfLQBUSpZLWBSxUJtaYeOmX8JyxBM",
                "created_at" => "2024-01-07T12:20:08.000000Z",
                "updated_at" => "2024-01-07T12:20:08.000000Z"
            ],
            [
                "id" => 15,
                "parentAmount" => "50.000",
                "Currency" => "SAR",
                "parentEmail" => "rkassulke@example.net",
                "statusCode" => 3,
                "registerationDate" => "2006-04-12 00:00:00",
                "parentIdentification" => "YpO0YxMVtKNw0ut729oF2UAjMQ8YgNLmWLNNcud9GPp8WBXz70",
                "created_at" => "2024-01-07T12:20:08.000000Z",
                "updated_at" => "2024-01-07T12:20:08.000000Z"
            ],
            [
                "id" => 1,
                "balance" => "50.000",
                "currency" => "JOD",
                "email" => "Y.rrohan@example.net",
                "status" => 300,
                "created_at" => "2024-01-07T12:42:39.000000Z",
                "updated_at" => "2024-01-07T12:42:39.000000Z"
            ],
            [
                "id" => 2,
                "balance" => "50.000",
                "currency" => "SAR",
                "email" => "Y.rkassulke@example.net",
                "status" => 300,
                "created_at" => "2024-01-07T12:42:39.000000Z",
                "updated_at" => "2024-01-07T12:42:39.000000Z"
            ],
            [
                "id" => 3,
                "balance" => "10.000",
                "currency" => "USD",
                "email" => "Y.hirthe.waino@example.net",
                "status" => 100,
                "created_at" => "2024-01-07T12:42:39.000000Z",
                "updated_at" => "2024-01-07T12:42:39.000000Z"
            ],
            [
                "id" => 4,
                "balance" => "100.000",
                "currency" => "AED",
                "email" => "Y.grayson65@example.net",
                "status" => 100,
                "created_at" => "2024-01-07T12:42:39.000000Z",
                "updated_at" => "2024-01-07T12:42:39.000000Z"
            ],
            [
                "id" => 5,
                "balance" => "50.000",
                "currency" => "EGP",
                "email" => "Y.marcel.rolfson@example.org",
                "status" => 100,
                "created_at" => "2024-01-07T12:42:39.000000Z",
                "updated_at" => "2024-01-07T12:42:39.000000Z"
            ],
            [
                "id" => 6,
                "balance" => "50.000",
                "currency" => "JOD",
                "email" => "Y.feil.marion@example.net",
                "status" => 100,
                "created_at" => "2024-01-07T12:42:39.000000Z",
                "updated_at" => "2024-01-07T12:42:39.000000Z"
            ],
            [
                "id" => 7,
                "balance" => "50.000",
                "currency" => "SAR",
                "email" => "Y.betsy58@example.net",
                "status" => 100,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 8,
                "balance" => "10.000",
                "currency" => "USD",
                "email" => "Y.nvandervort@example.com",
                "status" => 200,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 9,
                "balance" => "100.000",
                "currency" => "AED",
                "email" => "Y.isabel.skiles@example.org",
                "status" => 200,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 10,
                "balance" => "50.000",
                "currency" => "EGP",
                "email" => "Y.leannon.karley@example.net",
                "status" => 200,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 11,
                "balance" => "50.000",
                "currency" => "JOD",
                "email" => "Y.general05@example.com",
                "status" => 200,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 12,
                "balance" => "50.000",
                "currency" => "SAR",
                "email" => "Y.jacobi.raymond@example.net",
                "status" => 200,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 13,
                "balance" => "10.000",
                "currency" => "USD",
                "email" => "Y.zboncak.drew@example.org",
                "status" => 300,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 14,
                "balance" => "100.000",
                "currency" => "AED",
                "email" => "Y.pjones@example.net",
                "status" => 300,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 15,
                "balance" => "50.000",
                "currency" => "EGP",
                "email" => "Y.callie03@example.com",
                "status" => 300,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ]
        ];
    }

    function allYData(): array
    {
        return [
            [
                "id" => 1,
                "balance" => "50.000",
                "currency" => "JOD",
                "email" => "Y.rrohan@example.net",
                "status" => 300,
                "created_at" => "2024-01-07T12:42:39.000000Z",
                "updated_at" => "2024-01-07T12:42:39.000000Z"
            ],
            [
                "id" => 2,
                "balance" => "50.000",
                "currency" => "SAR",
                "email" => "Y.rkassulke@example.net",
                "status" => 300,
                "created_at" => "2024-01-07T12:42:39.000000Z",
                "updated_at" => "2024-01-07T12:42:39.000000Z"
            ],
            [
                "id" => 3,
                "balance" => "10.000",
                "currency" => "USD",
                "email" => "Y.hirthe.waino@example.net",
                "status" => 100,
                "created_at" => "2024-01-07T12:42:39.000000Z",
                "updated_at" => "2024-01-07T12:42:39.000000Z"
            ],
            [
                "id" => 4,
                "balance" => "100.000",
                "currency" => "AED",
                "email" => "Y.grayson65@example.net",
                "status" => 100,
                "created_at" => "2024-01-07T12:42:39.000000Z",
                "updated_at" => "2024-01-07T12:42:39.000000Z"
            ],
            [
                "id" => 5,
                "balance" => "50.000",
                "currency" => "EGP",
                "email" => "Y.marcel.rolfson@example.org",
                "status" => 100,
                "created_at" => "2024-01-07T12:42:39.000000Z",
                "updated_at" => "2024-01-07T12:42:39.000000Z"
            ],
            [
                "id" => 6,
                "balance" => "50.000",
                "currency" => "JOD",
                "email" => "Y.feil.marion@example.net",
                "status" => 100,
                "created_at" => "2024-01-07T12:42:39.000000Z",
                "updated_at" => "2024-01-07T12:42:39.000000Z"
            ],
            [
                "id" => 7,
                "balance" => "50.000",
                "currency" => "SAR",
                "email" => "Y.betsy58@example.net",
                "status" => 100,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 8,
                "balance" => "10.000",
                "currency" => "USD",
                "email" => "Y.nvandervort@example.com",
                "status" => 200,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 9,
                "balance" => "100.000",
                "currency" => "AED",
                "email" => "Y.isabel.skiles@example.org",
                "status" => 200,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 10,
                "balance" => "50.000",
                "currency" => "EGP",
                "email" => "Y.leannon.karley@example.net",
                "status" => 200,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 11,
                "balance" => "50.000",
                "currency" => "JOD",
                "email" => "Y.general05@example.com",
                "status" => 200,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 12,
                "balance" => "50.000",
                "currency" => "SAR",
                "email" => "Y.jacobi.raymond@example.net",
                "status" => 200,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 13,
                "balance" => "10.000",
                "currency" => "USD",
                "email" => "Y.zboncak.drew@example.org",
                "status" => 300,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 14,
                "balance" => "100.000",
                "currency" => "AED",
                "email" => "Y.pjones@example.net",
                "status" => 300,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ],
            [
                "id" => 15,
                "balance" => "50.000",
                "currency" => "EGP",
                "email" => "Y.callie03@example.com",
                "status" => 300,
                "created_at" => "2024-01-07T12:42:40.000000Z",
                "updated_at" => "2024-01-07T12:42:40.000000Z"
            ]
        ];
    }

    function allXData(): array
    {
        return [
            [
                "id" => 1,
                "parentAmount" => "10.000",
                "Currency" => "USD",
                "parentEmail" => "hirthe.waino@example.net",
                "statusCode" => 1,
                "registerationDate" => "1996-10-04 00:00:00",
                "parentIdentification" => "3INyspa0wFo5ym3WM8Mkynts30CNigPcAFeNzbxYukXIoY0tBr",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 2,
                "parentAmount" => "100.000",
                "Currency" => "AED",
                "parentEmail" => "grayson65@example.net",
                "statusCode" => 1,
                "registerationDate" => "2005-05-15 00:00:00",
                "parentIdentification" => "wdmbuzhwYRsGhl37cjVpaziBQ1BJja0czqJN1IUoMo9iBYEt1t",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 3,
                "parentAmount" => "50.000",
                "Currency" => "EGP",
                "parentEmail" => "marcel.rolfson@example.org",
                "statusCode" => 1,
                "registerationDate" => "1978-03-16 00:00:00",
                "parentIdentification" => "nnjdGRTHzt7GCusrKPN4kXOAgLvLVGCxZHgypqXxbZLnnBQk1W",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 4,
                "parentAmount" => "50.000",
                "Currency" => "JOD",
                "parentEmail" => "feil.marion@example.net",
                "statusCode" => 1,
                "registerationDate" => "1987-05-12 00:00:00",
                "parentIdentification" => "DCKkGr3983il5fk1hT7B0f9VBnnngSZonvfSficYz1qrvXEztQ",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 5,
                "parentAmount" => "50.000",
                "Currency" => "SAR",
                "parentEmail" => "betsy58@example.net",
                "statusCode" => 1,
                "registerationDate" => "2023-10-20 00:00:00",
                "parentIdentification" => "oGkLucKGnbRFVtGFCM66ZU4QdHapq5XvkfCplww8zkWTrlj2az",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 6,
                "parentAmount" => "10.000",
                "Currency" => "USD",
                "parentEmail" => "nvandervort@example.com",
                "statusCode" => 2,
                "registerationDate" => "2000-09-19 00:00:00",
                "parentIdentification" => "Cf41zyZ4z2SJHz20WBjPF9aZSALIJjKcSqlzhiuSIpdiaXbAYD",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 7,
                "parentAmount" => "100.000",
                "Currency" => "AED",
                "parentEmail" => "isabel.skiles@example.org",
                "statusCode" => 2,
                "registerationDate" => "1993-02-01 00:00:00",
                "parentIdentification" => "BR4dsn58UR7qeCatQsS3TW9BxQfyybp3laDm4obkDM6Tyb2moa",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 8,
                "parentAmount" => "50.000",
                "Currency" => "EGP",
                "parentEmail" => "leannon.karley@example.net",
                "statusCode" => 2,
                "registerationDate" => "1991-06-02 00:00:00",
                "parentIdentification" => "Fht7vd2RR8fuShfj8WxcY7Ci9ZYwVqTp6lheBCJTQknS34w4H5",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 9,
                "parentAmount" => "50.000",
                "Currency" => "JOD",
                "parentEmail" => "general05@example.com",
                "statusCode" => 2,
                "registerationDate" => "1989-02-11 00:00:00",
                "parentIdentification" => "3CFdLhXcslWaX6gwdoKPKnzHwT9DB5qWPOY6bDfamM4heuopb1",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 10,
                "parentAmount" => "50.000",
                "Currency" => "SAR",
                "parentEmail" => "jacobi.raymond@example.net",
                "statusCode" => 2,
                "registerationDate" => "1994-12-24 00:00:00",
                "parentIdentification" => "UtsLnkU4850NeyP56KxAgKtqyqZNVuh8KDUWG90LRgr3IZYYy8",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 11,
                "parentAmount" => "10.000",
                "Currency" => "USD",
                "parentEmail" => "zboncak.drew@example.org",
                "statusCode" => 3,
                "registerationDate" => "2023-08-29 00:00:00",
                "parentIdentification" => "H7o164YThf6GSgDmrGDzIT6QJKNoY4hcTJvuNAKgLoZxW4eDHQ",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 12,
                "parentAmount" => "100.000",
                "Currency" => "AED",
                "parentEmail" => "pjones@example.net",
                "statusCode" => 3,
                "registerationDate" => "2015-11-03 00:00:00",
                "parentIdentification" => "Voi9lJdQqMev492RSUYhcqdYZDgl38fMyQyBMCXPloGzo718Lf",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 13,
                "parentAmount" => "50.000",
                "Currency" => "EGP",
                "parentEmail" => "callie03@example.com",
                "statusCode" => 3,
                "registerationDate" => "1988-11-04 00:00:00",
                "parentIdentification" => "jG2J1qoQfaMhfc7puhEo6buC7rWGrJbtZEadRC2emPDcVcBx5P",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 14,
                "parentAmount" => "50.000",
                "Currency" => "JOD",
                "parentEmail" => "rrohan@example.net",
                "statusCode" => 3,
                "registerationDate" => "1991-08-23 00:00:00",
                "parentIdentification" => "gaAGRKnHHRQwwWeUYZr5GPfLQBUSpZLWBSxUJtaYeOmX8JyxBM",
                "created_at" => "2024-01-07T12:20:08.000000Z",
                "updated_at" => "2024-01-07T12:20:08.000000Z"
            ],
            [
                "id" => 15,
                "parentAmount" => "50.000",
                "Currency" => "SAR",
                "parentEmail" => "rkassulke@example.net",
                "statusCode" => 3,
                "registerationDate" => "2006-04-12 00:00:00",
                "parentIdentification" => "YpO0YxMVtKNw0ut729oF2UAjMQ8YgNLmWLNNcud9GPp8WBXz70",
                "created_at" => "2024-01-07T12:20:08.000000Z",
                "updated_at" => "2024-01-07T12:20:08.000000Z"
            ]
        ];
    }

    function allXDataCurrencyUSD(): array
    {
        return [
            [
                "id" => 1,
                "parentAmount" => "10.000",
                "Currency" => "USD",
                "parentEmail" => "hirthe.waino@example.net",
                "statusCode" => 1,
                "registerationDate" => "1996-10-04 00:00:00",
                "parentIdentification" => "3INyspa0wFo5ym3WM8Mkynts30CNigPcAFeNzbxYukXIoY0tBr",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 6,
                "parentAmount" => "10.000",
                "Currency" => "USD",
                "parentEmail" => "nvandervort@example.com",
                "statusCode" => 2,
                "registerationDate" => "2000-09-19 00:00:00",
                "parentIdentification" => "Cf41zyZ4z2SJHz20WBjPF9aZSALIJjKcSqlzhiuSIpdiaXbAYD",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ],
            [
                "id" => 11,
                "parentAmount" => "10.000",
                "Currency" => "USD",
                "parentEmail" => "zboncak.drew@example.org",
                "statusCode" => 3,
                "registerationDate" => "2023-08-29 00:00:00",
                "parentIdentification" => "H7o164YThf6GSgDmrGDzIT6QJKNoY4hcTJvuNAKgLoZxW4eDHQ",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ]
        ];
    }

    function allXDataCurrencyUSDRefundedStatus(): array
    {
        return [
            [
                "id" => 11,
                "parentAmount" => "10.000",
                "Currency" => "USD",
                "parentEmail" => "zboncak.drew@example.org",
                "statusCode" => 3,
                "registerationDate" => "2023-08-29 00:00:00",
                "parentIdentification" => "H7o164YThf6GSgDmrGDzIT6QJKNoY4hcTJvuNAKgLoZxW4eDHQ",
                "created_at" => "2024-01-07T12:20:07.000000Z",
                "updated_at" => "2024-01-07T12:20:07.000000Z"
            ]
        ];
    }
}
