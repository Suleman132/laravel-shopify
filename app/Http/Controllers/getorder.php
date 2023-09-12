<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class getorder extends Controller
{

    public function getShopifyOrders()
    {
        $shopifyStore = 'https://test17633.myshopify.com';
        $apiVersion = '2023-07'; // Replace with the desired API version
        $accessToken = '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';

        $client = new Client();

        // Build the API endpoint URL
        $url = "https://test17633.myshopify.com/admin/api/$apiVersion/orders.json?status=any";

        // Set the headers for the request
        $headers = [
            'X-Shopify-Access-Token' => $accessToken,
        ];

        try {
            // Send the GET request
            $response = $client->get($url, [
                'headers' => $headers,
            ]);

            // Get the response body as JSON
            $data = json_decode($response->getBody(), true);

//           dd($data);

        } catch (Exception $e) {
            // Handle exceptions and errors
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return view('orders.all_orders',['data' => $data['orders']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function getRefunds()
    {
        // Replace 'YOUR_ACCESS_TOKEN' with your actual Shopify API access token
        $accessToken = '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';
        $url = "https://test17633.myshopify.com/admin/api/2023-07/orders/5470482268449/refunds.json";


        $response = Http::withHeaders([
            'X-Shopify-Access-Token' => $accessToken,
        ])->get($url);



        // You can access the response content like this:
        $refundData = $response->json();
        dd($refundData);
      return response()->json($refundData);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
